<?php
class NewsController extends AppController {
    public $uses = array(
        'News', 'NewsProject', 'Project',
    );
    
    public $paginate = array(
        'News' => array(
            'limit' => 15,
            'order' => array('News.public_date'=>'DESC', 'News.created'=>'DESC'),
        ),
    );
    
    protected $_logoAttachment;
    
    protected function _setAttachmentComponent() {
        App::import('Component', 'Attachment');
        $this->_logoAttachment = new AttachmentComponent();
        $this->_logoAttachment->initialize($this, array(
        	'rm_tmp_file' => true,
            'origin' => false,
            'images_size' => array(
                'news' => array(260, 180, 'resizeCropForWidth'),
            ),
        ));
    }
    
    // backend goes here
    public function admin_index() {
        // post
        if ($this->RequestHandler->isPost()) {
            $query = $this->data['News'];
            unset($query['type']);
            $url = array('action'=>'index', 'admin'=>true, 'query'=>$this->_encodeUrlParams($query));
            isset($this->data['Page']['page']) && is_numeric($this->data['Page']['page']) ? $url['page'] = $this->data['Page']['page'] : null;
            $this->redirect($url);
        }
                
        $query = isset($this->params['named']['query']) ? $this->_decodeUrlParams($this->params['named']['query']) : array();
        $this->data['News'] = $query;

        $this->News->recursive = -1;
        $newses = $this->paginate('News', $this->News->buildFilter(array_merge(array('is_display'=>1), $query)));
        $this->set('newses', $newses);
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->News->id = $id;
        if ($this->News->delete($id, false)) {
            $this->NewsProject->deleteAll(array('news_id'=>$id), false);
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_add() {
        $data = array();
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
        $this->admin_upload($data['id']);
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_public() {
        $data = $this->data['News'];        
        $data['is_display'] = 1;
        $this->News->save($data);
        $this->admin_upload($data['id']);
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    
    public function admin_upload($id) {
        $data = $this->data['News'];
        if (!$data['banner']['error']) {
            $this->_setAttachmentComponent();
            $this->_logoAttachment->upload($data, 'banner');
            $save = array(
                'id' => $id,
                'banner_file_path' => $data['banner_file_path'],
            );
            $this->News->save($save);
        }
    }
    
    public function admin_open($id) {
        $this->autoRender = false;
        $data = array(
            'id' => $id,
            'is_public' => 1,
        );
        if ($this->News->save($data)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_searchproject() {
        $this->autoLayout = false;
        $query = $this->params['form']['query'];
        $newsId = $this->params['form']['newsId'];
        $projects = $this->Project->where($this->Project->buildFilter(array('is_display'=>1, 'query'=>$query)))->order('Project.created DESC')->select();
        $this->set('projects', $projects);
        $this->set('newsId', $newsId);
    }
    
    public function admin_connect($newsId, $projectId) {
        $this->autoRender = false;
        $data = $this->NewsProject->where(array('news_id'=>$newsId, 'project_id'=>$projectId))->first();
        if ($data) {
            echo false;
        } else {
            $this->NewsProject->save(array('news_id'=>$newsId, 'project_id'=>$projectId));
            echo Router::url(array('action'=>'disconnect', $newsId, $projectId));
        }
    }
    
    public function admin_disconnect($newsId, $projectId) {
        $this->autoRender = false;
        if ($this->NewsProject->deleteAll(array('news_id'=>$newsId, 'project_id'=>$projectId), false)) {
            echo true;
        } else {
            echo false;
        }
    }
}