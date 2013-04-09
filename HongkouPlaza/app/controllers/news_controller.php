<?php
class NewsController extends AppController {
    public $uses = array(
        'News'
    );
        
    public $paginate = array(
        'News' => array(
            'limit' => 18,
            'order' => array('modified'=>'DESC'),
        ),
    );
    
    protected $_imageAttachment;
    
    /*
     * frontend goes here
     */
    public function index() {
        if ($this->RequestHandler->isAjax()) {
            $this->autoLayout = false;
        }
        $this->paginate['News'] = array('limit'=>10, 'order'=>array('created'=>'DESC'));
        $news = $this->paginate('News', array('deleted'=>0));
        $this->set('news', $news);
    }
    
    public function lists() {
        if ($this->RequestHandler->isAjax()) {
            $this->autoLayout = false;
        }
        $query = $this->params['named'];
        unset($query['page']);
        $this->paginate['News'] = array('limit'=>10, 'order'=>array('created'=>'DESC'));
        $news = $this->paginate('News', $this->News->buildFilter($query));
        $this->set('news', $news);
        $this->render('index');
    }
    
    public function detail($id) {
        $referer = $this->referer('/', true);
        if (strpos($referer, 'http')===false) {            
            $this->layout = 'popup';
            $this->tpl = 'detail';
        } else {
            $this->layout = 'frontend';
            $this->tpl = 'detail_share';
        }
        $news = $this->News->where(array('id'=>$id, 'deleted'=>0))->first();
        if (!$news) {
            $this->cakeError('error404');
            return;
        }
        $this->params['named']['cat'] = $news['News']['cat'];
        $this->set('news', $news);
        $this->render($this->tpl);
    }
    
    /*
     * backend goes here
     */
    
    public function admin_index() {
        if ($this->RequestHandler->isPost()) {
            $this->redirect(array('action'=>'search', 'admin'=>true, 'query'=>($this->_encodeUrlParams($this->data['News']))));
        }
        $news = $this->paginate('News', array('deleted'=>0));
        $this->set('news', $news);
    }
    
    public function admin_search() {
        $query = $this->_decodeUrlParams($this->params['named']['query']);
        $this->data['News'] = $query;
        $news = $this->paginate('News', $this->News->buildFilter($query));
        $this->set('news', $news);
        $this->render('admin_index');
    }
    
    public function admin_new() {
        
    }
    
    public function admin_create() {
        $this->News->set($this->data);
        if ($this->News->validates()) {
            $this->_setAttachmentComponent();
            $this->_imageAttachment->upload($this->data['News'], 'image_upload');
            $this->News->save($this->data, false);
        } else {            
            $this->render('admin_new');
            return;
        }
        $this->Session->setFlash('创建成功！');
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_edit($id) {
        $news = $this->News->where(array('id'=>$id, 'deleted'=>0))->first();
        if (!$news) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->data = $news;
    }
    
    public function admin_update() {
        $this->News->set($this->data);
        if ($this->News->validates()) {
            $this->_setAttachmentComponent();
            $this->_imageAttachment->upload($this->data['News'], 'image_upload');
            $this->News->save($this->data, false);
        } else {            
            $this->render('admin_new');
            return;
        }
        $this->Session->setFlash('创建成功！');
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->News->id = $id;
        if ($this->News->saveField('deleted', true)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    protected function _setAttachmentComponent() {
        App::import('Component', 'Attachment');
        $this->_imageAttachment = new AttachmentComponent();
        $this->_imageAttachment->initialize($this, array(
            'rm_tmp_file' => true,
            'origin' => false,
            'images_size' => array(
                'news_image' => array(130, 90, 'resizeCrop'),
            ),
        ));
    }
}