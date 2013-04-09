<?php
class TeamController extends AppController {
    public $uses = array(
        'Person',
    );
    
    protected $_logoAttachment;
    
    protected function _setAttachmentComponent() {
        App::import('Component', 'Attachment');
        $this->_logoAttachment = new AttachmentComponent();
        $this->_logoAttachment->initialize($this, array(
        	'rm_tmp_file' => true,
            'origin' => false,
            'images_size' => array(
                'person' => array(140, 200, 'resizeCropForWidth'),
            ),
        ));
    }
    
    //backend goes here
    public function admin_index() {
        $persons = $this->Person->where(array('type'=>2))->order('sort ASC, id DESC')->select();
        $this->set('persons', $persons);
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->Person->id = $val;
            $this->Person->saveField('sort', $key);
        }
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Person->id = $id;
        if ($this->Person->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_add() {
        $data = $this->params['form'];
        $this->_setAttachmentComponent();
        $this->_logoAttachment->upload($data, 'banner_pic');
        $save = array(
            'title_cn' => $data['banner_title_cn'],
        	'title_en' => $data['banner_title_en'],
            'slogan_cn' => $data['banner_slogan_en'],
        	'slogan_en' => $data['banner_slogan_en'],
            'banner_file_path' => $data['banner_pic_file_path'],
            'type' => 2,
        );
        $this->Person->save($save);
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_edit($id) {
        $this->autoRender = false;
        $person = $this->Person->where(array('id'=>$id))->first();
        if (!$person) {
            echo false;
        } else {
            $this->data['EditPerson'.$id] = $person['Person'];
            $this->set('id', $id);
            $this->set('person', $person);
            $this->autoRender = true;
            $this->autoLayout = false;
        }
    }
    
    public function admin_save($id) {
        $this->autoRender = false;
        $person = $this->data['EditPerson'.$id];
        $person['id'] = $id;
        if ($this->Person->save($person)) {
            $this->Person->id = $id;
            $person = $this->Person->read();
            $this->set('person', $person);
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
            $this->Person->save($save);
        }
    }
}