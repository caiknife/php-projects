<?php
class PartnersController extends AppController {
    public $uses = array(
        'Partner'
    );
    
    // frontend goes here
    
    // cn frontend goes here
    
    // backend goes here
    public function admin_index() {
        if ($this->RequestHandler->isPost()) {
            $url = array('action'=>'index', 'admin'=>true);
            isset($this->data['type']) ? $url['type'] = $this->data['type'] : null;
            $this->redirect($url);
        }
        $teamType = Configure::read('Partner.type');
        $this->set('teamType', $teamType);
        $type = isset($this->params['named']['type']) ? $this->params['named']['type'] : '';
        $this->set('current', $type);
        $this->data['type'] = $type;
        $results = array();
        foreach ($teamType as $key=>$val) {
            $results[$key] = $this->Partner->where(array('is_display'=>1, 'type_id'=>$key))->order('sort ASC')->select();
        }
        $this->set('results', $results);
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->Partner->id = $val;
            $this->Partner->saveField('sort', $key);
        }
    }
    
    public function admin_add() {
        $this->Partner->save(array());
        $id = $this->Partner->id;
        $this->redirect(array('action'=>'edit', 'admin'=>true, $id));
    }
    
    public function admin_edit($id) {
        $partner = $this->Partner->where(array('id'=>$id))->first();
        if (!$partner) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->data = $partner;
        $this->set('partner', $partner);
    }
    
    public function admin_update() {
        $data = $this->data['Partner'];
        $data['is_display'] = 1;
        $this->Partner->save($data);
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Partner->id = $id;
        if ($this->Partner->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_upload() {
        $this->autoRender = false;
        $this->_setAttachmentComponent();
        $data = $this->params['form'];
        $this->_logoAttachment->upload($data, 'partner_logo');
        $data['media_url'] = $data['partner_logo_file_path'];
        $this->Partner->save($data);
        echo json_encode(array('msg'=>$data));
    }
    
    protected function _setAttachmentComponent() {
        App::import('Component', 'Attachment');
        $this->_logoAttachment = new AttachmentComponent();
        $this->_logoAttachment->initialize($this, array(
        	'rm_tmp_file' => true,
            'origin' => true,
            'images_size' => array(
                'partner' => array(100, 63, 'resize'),
            ),
        ));
    }
}