<?php
class ServiceController extends AppController {
    public $uses = array(
        'Service', 'Board'
    );
    
    protected $_logoAttachment;
    
    protected function _setAttachmentComponent() {
        App::import('Component', 'Attachment');
        $this->_logoAttachment = new AttachmentComponent();
        $this->_logoAttachment->initialize($this, array(
        	'rm_tmp_file' => true,
            'origin' => false,
            'images_size' => array(
                'service' => array(200, 200, 'resizeCrop'),
            ),
        ));
    }
    
    // cn frontend goes here
    public function cn_index() {
        $this->index('cn');
    }
    
    public function en_index() {
        $this->index('en');
    }
    
    public function index($lang) {
        // board
        $board = $this->Board->where(array('type'=>'service'))->first();
        $this->set('board', $board);
        
        $services = $this->Service->order('sort ASC, id DESC')->select();
        $this->set('services', $services);
    }
    
    // backend goes here
    public function admin_index() {
        $services = $this->Service->order('sort ASC, id DESC')->select();
        $this->set('services', $services);
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->Service->id = $val;
            $this->Service->saveField('sort', $key);
        }
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Service->id = $id;
        if ($this->Service->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_add() {
        $data = array();
        $this->Service->save($data);
        $id = $this->Service->id;
        $this->redirect(array('action'=>'edit', 'admin'=>true, $id));
    }
    
    public function admin_edit($id) {
        $service = $this->Service->where(array('id'=>$id))->first();
        if (!$service) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->data = $service;
        $this->set('service', $service);
    }
    
    public function admin_update() {
        $data = $this->data['Service'];
        $data['is_display'] = 1;
        $this->Service->save($data);
        $this->admin_upload($data['id']);
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_upload($id) {
        $data = $this->data['Service'];
        if (!$data['banner']['error']) {
            $this->_setAttachmentComponent();
            $this->_logoAttachment->upload($data, 'banner');
            $save = array(
                'id' => $id,
                'banner_file_path' => $data['banner_file_path'],
            );
            $this->Service->save($save);
        }
    }
}