<?php
class ExhibitorController extends AppController {
    public $uses = array(
        'Exhibitor'
    );
    
    protected $_logoAttachment;
    
    protected function _setAttachmentComponent() {
        App::import('Component', 'Attachment');
        $this->_logoAttachment = new AttachmentComponent();
        $this->_logoAttachment->initialize($this, array(
        	'rm_tmp_file' => true,
            'origin' => false,
            'images_size' => array(
                'exhibitor' => array(150, 150, 'resize'),
            ),
        ));
    }
    
    // frontend goes here
    
    // backend goes here
    public function admin_index() {
        $exhibitors = $this->Exhibitor->order('sort ASC, id DESC')->select();
        $this->set('exhibitors', $exhibitors);
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Exhibitor->id = $id;
        if ($this->Exhibitor->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->Exhibitor->id = $val;
            $this->Exhibitor->saveField('sort', $key);
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
        $this->Exhibitor->save($save);
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_edit($id) {
        $this->autoRender = false;
        $exhibitor = $this->Exhibitor->where(array('id'=>$id))->first();
        if (!$exhibitor) {
            echo false;
        } else {
            $this->data['EditExhibitor'.$id] = $exhibitor['Exhibitor'];
            $this->set('id', $id);
            $this->set('exhibitor', $exhibitor);
            $this->autoRender = true;
            $this->autoLayout = false;
        }
    }
    
    public function admin_save($id) {
        $this->autoRender = false;
        $exhibitor = $this->data['EditExhibitor'.$id];
        $exhibitor['id'] = $id;
        if ($this->Exhibitor->save($exhibitor)) {
            $this->Exhibitor->id = $id;
            $exhibitor = $this->Exhibitor->read();
            $this->set('exhibitor', $exhibitor);
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
            $this->Exhibitor->save($save);
        }
    }
}