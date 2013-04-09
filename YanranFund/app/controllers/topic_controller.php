<?php
class TopicController extends AppController {
    public $uses = array(
        'Topic',
    );
    
    public $paginate = array(
        'Topic' => array(
            'limit' => 15,
            'order' => array('Topic.topic_date'=>'DESC', 'Topic.created'=>'DESC'),
        ),
    );
    
    protected $_logoAttachment;
    
    protected function _setAttachmentComponent() {
        App::import('Component', 'Attachment');
        $this->_logoAttachment = new AttachmentComponent();
        $this->_logoAttachment->initialize($this, array(
        	'files_dir'   => 'files',
        	'rm_tmp_file' => true,
            'origin' => false,
        ));
    }
    
    // backend goes here
    public function admin_index() {
        // post
        if ($this->RequestHandler->isPost()) {
            $query = $this->data['Topic'];
            unset($query['type']);
            $url = array('action'=>'index', 'admin'=>true, 'query'=>$this->_encodeUrlParams($query));
            isset($this->data['Page']['page']) && is_numeric($this->data['Page']['page']) ? $url['page'] = $this->data['Page']['page'] : null;
            $this->redirect($url);
        }
                
        $query = isset($this->params['named']['query']) ? $this->_decodeUrlParams($this->params['named']['query']) : array();
        $this->data['Topic'] = $query;
                
        $topics = $this->paginate('Topic', $this->Topic->buildFilter(array_merge(array('is_display'=>1), $query)));
        $this->set('topics', $topics);
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Topic->id = $id;
        if ($this->Topic->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_add() {
        $data = array();
        $this->Topic->save($data);
        $id = $this->Topic->id;
        $this->redirect(array('action'=>'edit', 'admin'=>true, $id));
    }
    
    public function admin_edit($id) {
        $topic = $this->Topic->where(array('id'=>$id))->first();
        if (!$topic) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->data = $topic;
        $this->set('topic', $topic);
    }
    
    public function admin_update() {
        $data = $this->data['Topic'];
        $data['is_display'] = 1;
        $this->Topic->save($data);
        $this->admin_upload($data['id']);
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
      
    public function admin_upload($id) {
        $data = $this->data['Topic'];
        if (!$data['banner']['error']) {
            $this->_setAttachmentComponent();
            $this->_logoAttachment->upload($data, 'banner');
            $save = array(
                'id' => $id,
                'banner_file_path' => $data['banner_file_path'],
                'banner_file_size' => $this->_getFileSize($data['banner_file_size']),
            );
            $this->Topic->save($save);
        }
    }
}