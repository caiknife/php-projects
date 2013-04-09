<?php
class BrandsController extends AppController {
    public $uses = array(
        'Brand', 'MemberBrand', 'Category', 'Unit', 'BrandCategory', 'BrandUnit'
    );
    
    public $components = array(
        'Pinyin',
    );
    
    public $paginate = array(
        'Brand' => array(
            'limit' => 40,
            'order' => array('modified'=>'DESC'),
        ),
    );
    
    protected $_logoAttachment;
    protected $_mainPhotoAttachment;
    protected $_photoAttachment;
    protected $_subscribed = array();
    
    /*
     * frontend goes here
     */
    public function index() {
        if ($this->RequestHandler->isAjax()) {
            $this->autoLayout = false;
        }
        $this->_getSubscribedBrands();
        $this->paginate['Brand'] = array('limit'=>6, 'order'=>array('pinyin'=>'ASC'));
        $this->Brand->recursive = -1;
        $brands = $this->paginate('Brand', array('deleted'=>0, 'is_display'=>1));
        $this->set('brands', $brands);
        $this->_setCategories();
    }
    
    public function subscribe($brandId) {
        $this->autoRender = false;
        if (!$brandId || !$this->_profile) {
            echo false;
            return;
        }
        $memberId = $this->_profile['Member']['id'];
        if ($this->MemberBrand->save(array('id'=>null, 'member_id'=>$memberId, 'brand_id'=>$brandId))) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function unsubscribe($brandId) {
        $this->autoRender = false;
        if (!$brandId || !$this->_profile) {
            echo false;
            return;
        }
        $memberId = $this->_profile['Member']['id'];
        $data = $this->MemberBrand->where(array('brand_id'=>$brandId, 'member_id'=>$memberId))->first();
        if ($this->MemberBrand->delete($data['MemberBrand']['id'], false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function lists() {
        if ($this->RequestHandler->isAjax()) {
            $this->autoLayout = false;
        }
        $query = $this->params['named'];
        $query['is_display'] = 1;
        if (isset($query['cate']) && isset($query['cate'])=='0') {
            $this->redirect(array('action'=>'all'));
        }
        unset($query['page']);
        $this->paginate['Brand'] = array('limit'=>24, 'order'=>array('pinyin'=>'ASC'));
        $this->Brand->recursive = -1;
        $brands = $this->paginate('Brand', $this->Brand->buildFilter($query));
        $this->set('brands', $brands);
        $this->_setCategories();
    }
    
    public function all() {
        $this->Brand->recursive = -1;
        $categories = $this->Category->getCategoriesList();
        $this->set('categories', $categories);
        $brandsGroup = array();
        foreach ($categories as $index=>$cate) {
            $brandsGroup[$index] = $this->Brand->getBrandsWithCategory($index);
        }
        $this->set('brands_group', $brandsGroup);
    }
    
    public function detail($id) {
        $brand = $this->Brand->where(array('id'=>$id, 'deleted'=>0))->first();
        if (!$brand) {
            $this->cakeError('error404');
            return; 
        }
        $this->set('brand', $brand);
    }
    
    /*
     * backend goes here
     */
    
    public function admin_index() {
        if ($this->RequestHandler->isPost()) {
            $this->redirect(array('action'=>'search', 'admin'=>true, 'query'=>($this->_encodeUrlParams($this->data['Brand']))));
        }
        $this->Brand->recursive = -1;
        $brands = $this->paginate('Brand', array('deleted'=>0));
        $this->set('brands', $brands);
        $this->_setCategories();
    }

    public function admin_search() {
        $query = $this->_decodeUrlParams($this->params['named']['query']);
        $this->data['Brand'] = $query;
        $this->Brand->recursive = -1;
        $brands = $this->paginate('Brand', $this->Brand->buildFilter($query));
        $this->set('brands', $brands);
        $this->_setCategories();
        $this->render('admin_index');
    }
    
    public function admin_new() {
        $this->_setCategories();
        $this->_setEditableCategories();
        $this->_setCookie();
    }
    
    public function admin_create() {
        $this->Brand->set($this->data['Brand']);
        if ($this->Brand->validates()) {
            $this->_setAttachmentComponent();
            $this->_logoAttachment->upload($this->data['Brand'], 'logo_upload');
            $this->_mainPhotoAttachment->upload($this->data['Brand'], 'main_photo_upload');
            $this->_photoAttachment->upload($this->data['Brand'], 'photo1_upload');
            $this->_photoAttachment->upload($this->data['Brand'], 'photo2_upload');
            $this->_photoAttachment->upload($this->data['Brand'], 'photo3_upload');
            $this->_photoAttachment->upload($this->data['Brand'], 'photo4_upload');
            $this->Brand->save($this->data['Brand'], false);
            $this->_savecategories($this->Brand->id, true);
            $this->_saveunits($this->Brand->id, true);
        } else {            
            $this->_setCategories();
            $this->_setEditableCategories();
            $this->render('admin_new');
            return;
        }
        $this->Session->setFlash('添加成功！');
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_edit($id) {
        //$this->Brand->recursive = -1;
        $brand = $this->Brand->where(array('id'=>$id, 'deleted'=>0))->first();
        if (!$brand) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->data = $brand;
        $ids = array();
        foreach($brand['Category'] as $cates) {
            $ids[] = $cates['id'];
        }
        $unit = array();
        foreach($brand['Unit'] as $units) {
            $unit[] = $units['id'];
        }
        $this->set('brandCategories', $ids);
        $this->_setCategories();
        $this->_setEditableCategories();
        $this->_setCookie($unit);
    }
    
    public function admin_update() {
        $this->Brand->set($this->data['Brand']);
        if ($this->Brand->validates()) {
            $this->_setAttachmentComponent();
            $this->_logoAttachment->upload($this->data['Brand'], 'logo_upload');
            $this->_mainPhotoAttachment->upload($this->data['Brand'], 'main_photo_upload');
            $this->_photoAttachment->upload($this->data['Brand'], 'photo1_upload');
            $this->_photoAttachment->upload($this->data['Brand'], 'photo2_upload');
            $this->_photoAttachment->upload($this->data['Brand'], 'photo3_upload');
            $this->_photoAttachment->upload($this->data['Brand'], 'photo4_upload');
            $this->Brand->save($this->data['Brand'], false);
            $this->_savecategories($this->Brand->id, false);
            $this->_saveunits($this->Brand->id, false);
        } else {
            $this->_setCategories();
            $this->_setEditableCategories();
            $this->render('admin_edit');
            return;
        }
        $this->Session->setFlash('更新成功！');
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Brand->id = $id;
        if ($this->Brand->saveField('deleted', true)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_addcategory() {
        $this->autoRender = false;
        $data = $this->params['form']['addCategory'];
        if (empty($data)) {
            echo false;
        } else {
            $item = $this->Category->getCategoryByName($data);
            if ($item) {
                echo false;
            } else {
                $this->Category->save(array('Category'=>array('name'=>$data)));
                echo $this->Category->id;
            }
        }
        return;
    }
    
    public function admin_deletecategory($id) {
        $this->autoRender = false;
        $this->Category->id = $id;
        if ($this->Category->saveField('deleted', true)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_searchunits() {
        $this->autoLayout = false;
        $keyword = $this->params['form']['guide_id'];
        $data = $this->Unit->where(array('deleted'=>0, 'name LIKE'=>'%'.$keyword.'%'))->select();
        $this->set('units', $data);
    }
    
    public function admin_currentunits() {
        $this->autoLayout = false;
        $units = $this->params['form']['units'];
        $units = explode(',', $units);
        $results = $this->Unit->where(array('deleted'=>0, 'id'=>$units))->select();
        $this->set('units', $results);
    }
    
    protected function _savecategories($brandId, $new=true) {
        if (isset($this->params['form']['categories'])) {
            $ids = array_keys($this->params['form']['categories']);
            if (!$new) {
                $this->BrandCategory->deleteAll(array('brand_id'=>$brandId), false);
            }
            foreach ($ids as $categoryId) {
                $this->BrandCategory->id = null;
                $this->BrandCategory->save(array('BrandCategory'=>array('brand_id'=>$brandId, 'category_id'=>$categoryId)));
            }
        }
    }
    
    protected function _saveunits($brandId, $new=true) {
        if (isset($_COOKIE['units']) && !empty($_COOKIE['units'])) {
            $ids = explode(',', $_COOKIE['units']);
            if (!$new) {
                $this->BrandUnit->deleteAll(array('brand_id'=>$brandId), false);
            }
            foreach ($ids as $unitId) {
                $this->BrandUnit->id = null;
                $this->BrandUnit->save(array('BrandUnit'=>array('brand_id'=>$brandId, 'unit_id'=>$unitId)));
            }
            $this->_clearCookie();
        }
    }
    
    public function admin_pinyin() {
        $this->Brand->recursive = -1;
        $brands = $this->Brand->select();
        $result['Brand'] = array();
        foreach ($brands as $brand) {
            $pinyin = $this->Pinyin->getPY($brand['Brand']['title']);
            if (!empty($pinyin)) {
                $this->Brand->id = $brand['Brand']['id'];
                $this->Brand->saveField('pinyin', $pinyin);
            }
        }
    }
    
    protected function _setAttachmentComponent() {
        App::import('Component', 'Attachment');
        $this->_logoAttachment = new AttachmentComponent();
        $this->_logoAttachment->initialize($this, array(
        	'rm_tmp_file' => true,
            'origin' => false,
            'images_size' => array(
                'brand_logo' => array(80, 80, 'resizeCrop'),
        		'brand_logo_thumb' => array(57, 57, 'resizeCrop'),
            ),
        ));
        $this->_mainPhotoAttachment = new AttachmentComponent();
        $this->_mainPhotoAttachment->initialize($this, array(
        	'rm_tmp_file' => true,
            'origin' => false,
            'images_size' => array(
                'brand_main_photo' => array(115, 165, 'resizeCrop'),
            ),
        ));
        $this->_photoAttachment = new AttachmentComponent();
        $this->_photoAttachment->initialize($this, array(
        	'rm_tmp_file' => true,
            'origin' => false,
        	'images_size' => array(
                'brand_photo' => array(630, 320, 'resizeCrop'),
        		'brand_photo_thumb' => array(50, 50, 'resizeCrop'),
            ),
        ));
    }
    
    protected function _setCategories() {
        $categories = $this->Category->getCategoriesList();
        $this->set('categories', $categories);
    }
    
    protected function _setEditableCategories() {
        $editableCategories = $this->Category->getEditableCategoriesList();
        $this->set('editableCategories', $editableCategories);
    }
    
    protected function _setCookie($data = array()) {
        if (empty($data)) {
            setcookie('units', '', 0, '/');
        } else {
            setcookie('units', implode(',', $data), 0, '/');
        }
    }
    
    protected function _clearCookie() {
        setcookie('units', null, -1, '/');
    }
    
}