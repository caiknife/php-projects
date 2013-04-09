<?php
class GuestController extends AppController {
    public $uses = array(
        'Guest'
    );
    
    protected $_logoAttachment;
    
    protected function _setAttachmentComponent() {
        App::import('Component', 'Attachment');
        $this->_logoAttachment = new AttachmentComponent();
        $this->_logoAttachment->initialize($this, array(
        	'rm_tmp_file' => true,
            'origin' => false,
            'images_size' => array(
                'guest' => array(150, 150, 'resizeCropForWidth'),
            ),
        ));
    }
    
    // frontend goes here
    
    // backend goes here
    public function admin_index() {
        $guests = $this->Guest->order('sort ASC, id DESC')->select();
        $this->set('guests', $guests);
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Guest->id = $id;
        if ($this->Guest->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->Guest->id = $val;
            $this->Guest->saveField('sort', $key);
        }
    }
    
    public function admin_add() {
        $data = $this->params['form'];
        $this->_setAttachmentComponent();
        $this->_logoAttachment->upload($data, 'banner_pic');
        $save = array(
            'title' => $data['banner_title'],
            'banner_file_path' => $data['banner_pic_file_path'],
        );
        $this->Guest->save($save);
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_edit($id) {
        $this->autoRender = false;
        $guest = $this->Guest->where(array('id'=>$id))->first();
        if (!$guest) {
            echo false;
        } else {
            $this->data['EditGuest'.$id] = $guest['Guest'];
            $this->set('id', $id);
            $this->set('guest', $guest);
            $this->autoRender = true;
            $this->autoLayout = false;
        }
    }
    
    public function admin_save($id) {
        $this->autoRender = false;
        $guest = $this->data['EditGuest'.$id];
        $guest['id'] = $id;
        if ($this->Guest->save($guest)) {
            $this->Guest->id = $id;
            $guest = $this->Guest->read();
            $this->set('guest', $guest);
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
            $this->Guest->save($save);
        }
    }
}