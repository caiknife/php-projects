<?php
class VolunteerController extends AppController {
    public $uses = array(
        'Volunteer', 'Vblock',
    );
    
    protected $_logoAttachment;
    
    protected function _setAttachmentComponent() {
        App::import('Component', 'Attachment');
        $this->_logoAttachment = new AttachmentComponent();
        $this->_logoAttachment->initialize($this, array(
        	'rm_tmp_file' => true,
            'origin' => false,
            'images_size' => array(
                'volunteer' => array(70, 70, 'resizeCrop'),
            ),
        ));
    }
    
    // frontend goes here
    public function cn_index() {
        $this->index('cn');
    }
    
    public function en_index() {
        $this->index('en');
    }
    
    public function index($lang) {
        $vblockList = $this->Vblock->getList($lang, true);
        if (!$vblockList) {
            $this->cakeError('error404');
            return;
        }
        $firstId = array_shift(array_keys($vblockList));
        $this->redirect(array('action'=>'view', $firstId));
    }
    
    public function cn_view($id) {
        $this->view('cn', $id);
    }
    
    public function en_view($id) {
        $this->view('en', $id);
    }
    
    public function view($lang, $id) {
        $this->Vblock->id = $id;
        $vblock = $this->Vblock->read();
        if (!$vblock) {
            $this->cakeError('error404');
            return;
        }
        $this->set('vblock', $vblock);
        $this->set('id', $id);
        
        $vblockList = $this->Vblock->getList($lang, true);
        $this->set('vblockList', $vblockList);
        
        if ($vblock['Vblock']['type']) {
            $method = '_'.$vblock['Vblock']['type'];
            $this->{$method}();
            $this->render($lang.'_'.$vblock['Vblock']['type']);
        }
    }
    
    protected function _volunteer() {
        $volunteerTypes = Configure::read('Volunteer.types');
        $this->set('volunteerTypes', $volunteerTypes);
        
        $data = array();
        foreach ($volunteerTypes as $key=>$val) {
            $data[$key] = $this->Volunteer->getVolunteerListByType($key);
        }
        $this->set('data', $data);
    }
    
    protected function _apply() {
        
    }
    
    // backend goes here
    public function admin_index() {
        $volunteerTypes = Configure::read('Volunteer.types');
        $this->set('volunteerTypes', $volunteerTypes);
        
        $data = array();
        foreach ($volunteerTypes as $key=>$val) {
            $data[$key] = $this->Volunteer->getVolunteerListByType($key);
        }
        $this->set('data', $data);
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Volunteer->id = $id;
        if ($this->Volunteer->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        $type = $this->params['form']['type'];
        foreach ($sort as $key=>$val) {
            $this->Volunteer->id = $val;
            $this->Volunteer->saveField('sort_'.$type, $key);
        }
    }
    
    public function admin_add() {
        $data = array();
        $this->Volunteer->save($data);
        $id = $this->Volunteer->id;
        $this->redirect(array('action'=>'edit', 'admin'=>true, $id));
    }
    
    public function admin_edit($id) {
        $volunteer = $this->Volunteer->where(array('id'=>$id))->first();
        if (!$volunteer) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->data = $volunteer;
        $volunteer['Volunteer']['types'] = explode('|', $volunteer['Volunteer']['types']);
        $this->set('volunteer', $volunteer);
    }
    
    public function admin_update() {
        $data = $this->data['Volunteer'];
        $data['is_display'] = 1;
        $types = isset($this->params['form']['types']) ? '|'.implode('|', $this->params['form']['types']).'|' : '';
        $data['types'] = $types;
        $this->Volunteer->save($data);
        $this->admin_upload($data['id']);
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_upload($id) {
        $data = $this->data['Volunteer'];
        if (!$data['banner']['error']) {
            $this->_setAttachmentComponent();
            $this->_logoAttachment->upload($data, 'banner');
            $save = array(
                'id' => $id,
                'banner_file_path' => $data['banner_file_path'],
            );
            $this->Volunteer->save($save);
        }
    }
}