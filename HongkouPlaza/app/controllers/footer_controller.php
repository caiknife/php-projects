<?php
class FooterController extends AppController {
    public $uses = array(
        'Block', 'Post'
    );
    
    protected $_logoAttachment;
    
    protected function _setAttachmentComponent() {
        App::import('Component', 'Attachment');
        $this->_logoAttachment = new AttachmentComponent();
        $this->_logoAttachment->initialize($this, array(
        	'rm_tmp_file' => true,
            'origin' => false,
            'images_size' => array(
                'post' => array(800, 600, 'resizeCrop'),
            ),
        ));
    }
    
    public function view($type) {
        $this->autoLayout = false;
        $post = $this->Post->where(array('type'=>$type))->first();
        if (!$post) {
           $this->cakeError('error404');
           return;
        }
        $this->set('post', $post);
    }
    
    public function admin_post($type) {
        $post = $this->Post->where(array('type'=>$type))->first();
        if (!$post) {
            $data = array('type'=>$type);
            $this->Post->save($data);
            $post = $this->Post->read();
        }
        $this->set('type', $type);        
        $this->set('post', $post);
        $this->data = $post;
    }
    
    public function admin_upload() {
        $data = $this->data['Post'];
        if (!$data['banner']['error']) {
            $this->_setAttachmentComponent();
            $this->_logoAttachment->upload($data, 'banner');
            $save = array(
                'id' => $data['id'],
                'banner_file_path' => $data['banner_file_path'],
            );
            $this->Post->save($save);
            $data = $this->Post->read();
            $this->redirect(array('action'=>'post', 'admin'=>true, $data['Post']['type']));
        }
    }
    
    // backend goes here
    public function admin_index() {
        $blocks = $this->Block->where(array('is_display'=>1))->order('sort ASC, id DESC')->select();
        $this->set('blocks', $blocks);
    }
    
    public function admin_new() {
        $data = array();
        $this->Block->save($data);
        $id = $this->Block->id;
        $this->redirect(array('action'=>'edit', 'admin'=>true, $id));
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->Banner->id = $val;
            $this->Banner->saveField('sort', $key);
        }
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Block->id = $id;
        if ($this->Block->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_edit($id) {
        $block = $this->Block->where(array('id'=>$id))->first();
        if (!$block) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->data = $block;
    }
    
    public function admin_update() {
        $data = $this->data['Block'];
        $data['is_display'] = 1;
        $this->Block->save($data);
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
}