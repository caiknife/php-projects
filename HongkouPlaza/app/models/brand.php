<?php
class Brand extends AppModel {
    public $hasAndBelongsToMany = array(
        'Event' => array(
            'className' => 'Event',
            'joinTable' => 'brand_event',
            'foreignKey' => 'brand_id',
            'associationForeignKey'  => 'event_id',                
            'unique' => true,                
            'conditions' => 'Event.deleted = 0 AND Event.end_date >= now()',
        ),
        'Category' => array(
            'className' => 'Category',
            'joinTable' => 'brand_category',
            'foreignKey' => 'brand_id',
            'associationForeignKey'  => 'category_id',                
            'unique' => true,                
            'conditions' => 'Category.deleted = 0',
        ),
        'Unit' => array(
            'className' => 'Unit',
            'joinTable' => 'brand_unit',
            'foreignKey' => 'brand_id',
            'associationForeignKey'  => 'unit_id',                
            'unique' => true,                
            'conditions' => 'Unit.deleted = 0',
        )
    );
        
    public $validate = array(
//        'title' => array(
//            'rule' => array('_isValidTitle', 'title'),
//            'message' => '中文名称、英文名称至少填一个！',
//        ),
//        'title_en' => array(
//            'rule' => array('_isValidTitle', 'title_en'),
//            'message' => '中文名称、英文名称至少填一个！',
//        ),
//        'shop_id' => array(
//            'rule' => 'notEmpty',
//            'message' => '请输入！',
//        ),
//        'guide_id' => array(
//            'rule' => 'notEmpty',
//            'message' => '请输入！',
//        ),
        'logo_upload' => array(
            'isUpload' => array(
                'rule' => array('_isUpload', 'logo_upload'),
                'message' => '请上传图片！',
                'on' => 'create',
            ),
        	'validUpload' => array(
            	'rule' => array('_validUpload', 'logo_upload', array('jpg', 'jpeg', 'png', 'gif'), array('image/jpeg', 'image/pjpeg', 'image/png', 'image/gif')),
            	'message' => '图片格式不正确！',
            ),
        ),
        'main_photo_upload' => array(
            'isUpload' => array(
                'rule' => array('_isUpload', 'main_photo_upload'),
                'message' => '请上传图片！',
                'on' => 'create',
            ),
        	'validUpload' => array(
            	'rule' => array('_validUpload', 'main_photo_upload', array('jpg', 'jpeg', 'png', 'gif'), array('image/jpeg', 'image/pjpeg', 'image/png', 'image/gif')),
            	'message' => '图片格式不正确！',
            ),
        ),
        'photo1_upload' => array(
            'isUpload' => array(
                'rule' => array('_isUpload', 'photo1_upload'),
                'message' => '请上传图片！',
                'on' => 'create',
            ),
        	'validUpload' => array(
            	'rule' => array('_validUpload', 'photo1_upload', array('jpg', 'jpeg', 'png', 'gif'), array('image/jpeg', 'image/pjpeg', 'image/png', 'image/gif')),
            	'message' => '图片格式不正确！',
            ),
        ),
        'photo2_upload' => array(            
        	'validUpload' => array(
            	'rule' => array('_validUpload', 'photo2_upload', array('jpg', 'jpeg', 'png', 'gif'), array('image/jpeg', 'image/pjpeg', 'image/png', 'image/gif')),
            	'message' => '图片格式不正确！',
            ),
        ),
        'photo3_upload' => array(            
        	'validUpload' => array(
            	'rule' => array('_validUpload', 'photo3_upload', array('jpg', 'jpeg', 'png', 'gif'), array('image/jpeg', 'image/pjpeg', 'image/png', 'image/gif')),
            	'message' => '图片格式不正确！',
            ),
        ),
        'photo4_upload' => array(            
        	'validUpload' => array(
            	'rule' => array('_validUpload', 'photo4_upload', array('jpg', 'jpeg', 'png', 'gif'), array('image/jpeg', 'image/pjpeg', 'image/png', 'image/gif')),
            	'message' => '图片格式不正确！',
            ),
        ),
    );
    
    public function beforeSave() {
        $uploadFields = array('logo', 'main_photo', 'photo1',  'photo2',  'photo3',  'photo4');
        foreach ($uploadFields as $field) {
            if (isset($this->data[$this->name][$field.'_upload_file_path']) && $this->data[$this->name][$field.'_upload_file_path']) {
                $this->data[$this->name][$field] = $this->data[$this->name][$field.'_upload_file_path'];
            }
            if (isset($this->data[$this->name][$field.'_delete']) && $this->data[$this->name][$field.'_delete']) {
                $this->data[$this->name][$field] = '';
            }
        }
        if (isset($this->data[$this->name]['title']) && $this->data[$this->name]['title']) {
            App::import('Component', 'Pinyin');
            $pinyin = new PinyinComponent();
            $this->data[$this->name]['pinyin'] = $pinyin->getPY($this->data[$this->name]['title']);
        }
        return true;
    }
    
    public function feature($ids) {
        $save = array();
        foreach($ids as $id) {
            $this->id = $id;
            $this->saveField('featured', 1);
        }
    }
    
    public function buildFilter($arr) {
        $query = parent::buildFilter($arr);
        if (isset($arr['title']) && $arr['title']) {
            $query[]['OR'] = array(
                'title LIKE' => '%'.$arr['title'].'%',
                'title_en LIKE' => '%'.$arr['title'].'%',
            );
        }
        if (isset($arr['alpha']) && $arr['alpha']) {
            $query[]['OR'] = array(
                'title LIKE' => $arr['alpha'].'%',
                'title_en LIKE' => $arr['alpha'].'%',
                'pinyin LIKE' => $arr['alpha'].'%',
            );
        }
// change categories
//        if (isset($arr['cate']) && $arr['cate']) {
//            $query[]['OR'] = array(
//                'cat_main' => $arr['cate'],
//                'cat_sub' => $arr['cate'],
//            );
//        }        
        if (isset($arr['floor']) && $arr['floor']) {
            $query['floor'] = $arr['floor'];
        }
        if (isset($arr['is_display']) && $arr['is_display']) {
            $query['is_display'] = $arr['is_display'];
        }
        if (isset($arr['featured']) && $arr['featured']) {
            $query['featured'] = $arr['featured'];
        }
        if (isset($arr['cate']) && $arr['cate']) {
            App::import('Model', 'BrandCategory');
            $brandCategory = new BrandCategory();
            $brandIdsForCategory = $brandCategory->getBrandIdsWithCategoryId($arr['cate']);
            $query['id'] = $brandIdsForCategory;    
        }
        if (isset($arr['guide_id']) && $arr['guide_id']) {
//            $query['guide_id LIKE'] = '%'.$arr['guide_id'].'%';
            App::import('Model', 'BrandUnit');
            $brandUnit = new BrandUnit();
            $brandIdsForUnit = $brandUnit->getBrandIdsWithUnitName($arr['guide_id']);
            $query['id'] = $brandIdsForUnit;
            if (isset($arr['cate']) && $arr['cate']) {
                $query['id'] = array_intersect($brandIdsForUnit, $brandIdsForCategory);
            }
        }
        return $query;
    }
    
    public function getFeaturedBrands($cat=null, $limit=8) {
        $query = array('featured'=>1);
        if ($cat) {
            $query['cate'] = $cat;
        }
        $query['is_display'] = 1;
        $data = $this->where($this->buildFilter($query))->order('pinyin ASC')->select();
        if (!$data) {
            return array();
        }
        $brands = array();
        for ($i=0; $i<ceil(sizeof($data)/$limit); $i++) {
            $brands[] = array_slice($data, $i*$limit, $limit);
        }
        return $brands;
    }
    
    public function searchByKeyword($keyword) {
        $query['OR'] = array(
            'title LIKE' => '%'.$keyword.'%',
            'title_en LIKE' => '%'.$keyword.'%',
            'pinyin LIKE' => '%'.$keyword.'%',
            'keyword LIKE' => '%'.$keyword.'%',
        );
        return $this->where($query)->limit(5)->select();
    }
    
    protected function _isValidTitle($data, $field) {
        if (empty($data['title']) && empty($data['title_en'])) {
            return false;
        }
        return true;
    }
    
    public function validates($options = array()) {
        $errors = parent::validates($options);
        if (empty($this->data[$this->name]['title']) && empty($this->data[$this->name]['title_en'])) {
            $errors = false;
            $this->validationErrors['title'] = $this->validationErrors['title_en'] = '中文名称、英文名称至少填一个！';    
        }
        return $errors; 
    }
    
    public function getBrandsWithCategory($categoryId) {
        return $this->order('pinyin ASC')->where($this->buildFilter(array('cate'=>$categoryId, 'is_display'=>1)))->select();
    }
}