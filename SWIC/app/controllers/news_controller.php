<?php
class NewsController extends AppController {
    public $uses = array('News', 'NewsType');
    
    public $paginate = array(
        'News' => array(
            'limit' => 15,
            'order' => array('News.modified'=>'DESC'),
        ),
    );
    
    protected $_logoAttachment;
    protected $_bigAttachment;
    // frontend goes here
    
    // cn frontend goes here
    public function cn_index() {
        
        $hotNewes = $this->News->where(array('deleted'=>0, 'is_display'=>1, 'is_feature'=>1))->order('News.sort DESC')->limit(5)->select();        
        $this->set('hotNewes', $hotNewes);
        
        $results = array();
        $newsType = $this->NewsType->getList();
        foreach ($newsType as $key=>$type) {
           $results[$key] = $this->News->where(array('deleted'=>0, 'is_display'=>1, 'type_id'=>$key))->limit(9)->order('News.created DESC')->select();
        }
        $this->set('results', $results);
        $logoType = $this->NewsType->getLogoList();
        $this->set('logoType', $logoType);
    }
    
    public function cn_lists() {
        $type = isset($this->params['named']['type']) ? $this->params['named']['type'] : 1;
        $this->Set('type', $type);
        
        $this->paginate['News'] = array(
        	'limit' => 10,
            'order' => array('News.created'=>'DESC'),
        );
        
        $newes = $this->paginate('News', $this->News->buildFilter(array('is_display'=>1, 'type_id'=>$type)));
        $this->set('newes', $newes);
    }
    
    public function cn_detail($id) {
        $news = $this->News->where(array('id'=>$id))->first();
        if (!$news) {
            $this->cakeError('error404');
            return;
        }        
        $this->set('type', $news['News']['type_id']);
        $this->set('news', $news);
        
        $relatedNews = $this->News->where(array('id <>'=>$id, 'type_id'=>$news['News']['type_id'], 'is_display'=>1, 'deleted'=>0))->limit(4)->order('article_date DESC, id DESC')->select();
        $this->set('relatedNews', $relatedNews);
    }
    
    // backend goes here
    
    public function admin_index() {
        if ($this->RequestHandler->isPost()) {
            $url = array('action'=>'index', 'admin'=>true, 'type'=>$this->data['News']['type']);
            isset($this->data['Page']['page']) && is_numeric($this->data['Page']['page']) ? $url['page'] = $this->data['Page']['page'] : null;
            $this->redirect($url);
        }
        
        $type = isset($this->params['named']['type']) ? $this->params['named']['type'] : 1;
        $this->set('type', $type);
        
        $newses = $this->paginate('News', $this->News->buildFilter(array('is_display'=>1, 'type_id'=>$type)));
        $this->set('newses', $newses);
    }
    
    public function admin_add() {
        $type = isset($this->params['named']['type']) ? $this->params['named']['type'] : 1;
        $data['type_id'] = $type;
        $this->News->save($data);
        $id = $this->News->id;
        $this->redirect(array('action'=>'edit', 'admin'=>true, $id));
    }
    
    public function admin_edit($id) {
        $news = $this->News->where(array('id'=>$id))->first();
        if (!$news) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->data = $news;
        $this->set('news', $news);
    }
    
    public function admin_update() {
        $data = $this->data['News'];
        $data['is_display'] = 1;
        $this->News->save($data);
        $this->redirect(array('action'=>'index', 'admin'=>true, 'type'=>$data['type_id']));
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
    
    public function admin_upload($type='logo') {
        $this->autoRender = false;
        $this->_setAttachmentComponent();
        $data = $this->params['form'];
        if ($type=='logo') {
            $this->_logoAttachment->upload($data, 'news_logo');
        } elseif ($type=='big') {
            $this->_bigAttachment->upload($data, 'news_big');
        }
        $this->News->save($data);
        echo json_encode(array('msg'=>$data));
    }
    
    protected function _setAttachmentComponent() {
        App::import('Component', 'Attachment');
        $this->_logoAttachment = new AttachmentComponent();
        $this->_logoAttachment->initialize($this, array(
        	'rm_tmp_file' => true,
            'origin' => false,
            'images_size' => array(
                'news_logo' => array(70, 70, 'resizeCrop'),
            ),
        ));
        $this->_bigAttachment = new AttachmentComponent();
        $this->_bigAttachment->initialize($this, array(
        	'rm_tmp_file' => true,
            'origin' => false,
            'images_size' => array(
                'news_big' => array(640, 360, 'resizeCrop'),
            ),
        ));
    }
    
    public function admin_feature($id) {
        $this->autoRender = false;
        $this->News->id = $id;
        if ($this->News->saveField('is_feature', true)) {
            $this->autoLayout = false;
            $this->autoRender = true;
            $this->set('id', $id);
        } else {
            echo false;
        }
    }
    
    public function admin_unfeature($id) {
        $this->autoRender = false;
        $this->News->id = $id;
        if ($this->News->saveField('is_feature', false)) {
            $this->autoLayout = false;
            $this->autoRender = true;
            $this->set('id', $id);
        } else {
            echo false;
        }
    }
    
    public function admin_featured() {
        $newses = $this->News->where($this->News->buildFilter(array('is_display'=>1, 'is_feature'=>1)))->order('sort ASC')->select();
        $this->set('newses', $newses);
    }
    
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->News->id = $val;
            $this->News->saveField('sort', $key);
        }
    }
    
}