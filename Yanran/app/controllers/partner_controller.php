<?php
class PartnerController extends AppController {
    public $uses = array(
    	'Partner'
    );
    
    protected $_logoAttachment;
    
    protected function _setAttachmentComponent() {
        App::import('Component', 'Attachment');
        $this->_logoAttachment = new AttachmentComponent();
        $this->_logoAttachment->initialize($this, array(
        	'rm_tmp_file' => true,
            'origin' => false,
            'images_size' => array(
                'partner' => array(150, 150, 'resizeCrop'),
            ),
        ));
    }
    
    // cn frontend goes here
    
    // backend goes here
    public function admin_index() {
        $partners = $this->Partner->order('sort ASC, id DESC')->select();
        $this->set('partners', $partners);
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
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->Partner->id = $val;
            $this->Partner->saveField('sort', $key);
        }
    }
    
     public function admin_add() {
        $data = $this->params['form'];
        $this->_setAttachmentComponent();
        $this->_logoAttachment->upload($data, 'banner_pic');
        $save = array(
            'title_cn' => $data['banner_title_cn'],
            'title_en' => $data['banner_title_en'],
            'banner_file_path' => $data['banner_pic_file_path'],
        );
        $this->Partner->save($save);
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_edit($id) {
        $this->autoRender = false;
        $partner = $this->Partner->where(array('id'=>$id))->first();
        if (!$partner) {
            echo false;
        } else {
            $this->data['EditPartner'.$id] = $partner['Partner'];
            $this->set('id', $id);
            $this->set('partner', $partner);
            $this->autoRender = true;
            $this->autoLayout = false;
        }
    }
    
    public function admin_save($id) {
        $partner = $this->data['EditPartner'.$id];
        $partner['id'] = $id;
        if ($this->Partner->save($partner)) {
            $this->Partner->id = $id;
            $partner = $this->Partner->read();
            $this->set('partner', $partner);
            $this->admin_upload($id);
            $this->redirect(array('action'=>'index', 'admin'=>true));
        } else {
            echo false;
        }
    }
    
    public function admin_upload($id) {
        $data = $this->params['form'];
        if (!$data['banner_'.$id]['error']) {
            $this->_setAttachmentComponent();
            $this->_logoAttachment->upload($data, 'banner_'.$id);
            $save = array(
                'id' => $id,
                'banner_file_path' => $data['banner_'.$id.'_file_path'],
            );
            $this->Partner->save($save);
        }
    }
}