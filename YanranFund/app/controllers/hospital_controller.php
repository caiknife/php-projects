<?php
class HospitalController extends AppController {
    public $uses = array(
        'Hospital', 'Sblock',
    );
    
    protected $_logoAttachment;
    
    protected function _setAttachmentComponent() {
        App::import('Component', 'Attachment');
        $this->_logoAttachment = new AttachmentComponent();
        $this->_logoAttachment->initialize($this, array(
        	'rm_tmp_file' => true,
            'origin' => false,
            'images_size' => array(
                'hospital' => array(250, 140, 'resize'),
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
        $sblockList = $this->Sblock->getList($lang, true);
        if (!$sblockList) {
            $this->cakeError('error404');
            return;
        }
        $firstId = array_shift(array_keys($sblockList));
        $this->redirect(array('action'=>'view', $firstId));
    }
    
    public function cn_view($id) {
        $this->view('cn', $id);
    }
    
    public function en_view($id) {
        $this->view('en', $id);
    }
    
    public function view($lang, $id) {
        $this->Sblock->id = $id;
        $sblock = $this->Sblock->read();
        if (!$sblock) {
            $this->cakeError('error404');
            return;
        }
        $this->set('sblock', $sblock);
        $this->set('id', $id);
        
        $sblockList = $this->Sblock->getList($lang, true);
        $this->set('sblockList', $sblockList);
        
        if ($sblock['Sblock']['type']) {
            $method = '_'.$sblock['Sblock']['type'];
            $this->{$method}();
            $this->render($lang.'_'.$sblock['Sblock']['type']);
        }
    }
    
    protected function _hospital() {
        $hospitals = $this->Hospital->where(array('is_display'=>1))->order('sort ASC, id DESC')->select();
        $this->set('hospitals', $hospitals);
    }
    
    protected function _apply() {
        
    }
    
    public function cn_viewhospital($id) {
        $this->viewhospital('cn', $id);
    }
    
    public function en_viewhospital($id) {
        $this->viewhospital('en', $id);
    }
    
    public function viewhospital($lang, $id) {
        $this->Hospital->id = $id;
        $hospital = $this->Hospital->read();
        if (!$hospital) {
            $this->cakeError('error404');
            return;
        }
        $this->set('hospital', $hospital);
        
        $sblockList = $this->Sblock->getList($lang, true);
        $this->set('sblockList', $sblockList);
        
        $hospitalBlock = $this->Sblock->where(array('type'=>'hospital'))->first();
        $this->set('id', $hospitalBlock['Sblock']['id']);
    }
    
    // backend goes here
    public function admin_index() {
        $hospitals = $this->Hospital->where(array('is_display'=>1))->order('sort ASC, id DESC')->select();
        $this->set('hospitals', $hospitals);
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->Hospital->id = $val;
            $this->Hospital->saveField('sort', $key);
        }
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Hospital->id = $id;
        if ($this->Hospital->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_add() {
        $data = array();
        $this->Hospital->save($data);
        $id = $this->Hospital->id;
        $this->redirect(array('action'=>'edit', 'admin'=>true, $id));
    }
    
    public function admin_edit($id) {
        $hospital = $this->Hospital->where(array('id'=>$id))->first();
        if (!$hospital) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->data = $hospital;
        $this->set('hospital', $hospital);
    }
    
    public function admin_update() {
        $data = $this->data['Hospital'];
        $data['is_display'] = 1;        
        $this->Hospital->save($data);
        $this->admin_upload($data['id']);
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_upload($id) {
        $data = $this->data['Hospital'];
        if (!$data['banner']['error']) {
            $this->_setAttachmentComponent();
            $this->_logoAttachment->upload($data, 'banner');
            $save = array(
                'id' => $id,
                'banner_file_path' => $data['banner_file_path'],
            );
            $this->Hospital->save($save);
        }
    }
    
}