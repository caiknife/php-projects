<?php
class EnterpriseController extends AppController {
    public $uses = array(
        'Enterprise'
    );
    
    protected $_logoAttachment;
    
    protected function _setAttachmentComponent() {
        App::import('Component', 'Attachment');
        $this->_logoAttachment = new AttachmentComponent();
        $this->_logoAttachment->initialize($this, array(
        	'rm_tmp_file' => true,
            'origin' => false,
            'images_size' => array(
                'enterprise' => array(150, 75, 'resize'),
            ),
        ));
    }
    
    //backend goes here
    public function admin_index() {
        $enterprises = $this->Enterprise->order('sort ASC, id DESC')->select();
        $this->set('enterprises', $enterprises);
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->Enterprise->id = $val;
            $this->Enterprise->saveField('sort', $key);
        }
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Enterprise->id = $id;
        if ($this->Enterprise->delete($id, false)) {
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
            'url' => $data['banner_url'],
            'banner_file_path' => $data['banner_pic_file_path'],
        );
        $this->Enterprise->save($save);
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_edit($id) {
        $this->autoRender = false;
        $enterprise = $this->Enterprise->where(array('id'=>$id))->first();
        if (!$enterprise) {
            echo false;
        } else {
            $this->data['EditEnterprise'.$id] = $enterprise['Enterprise'];
            $this->set('id', $id);
            $this->set('enterprise', $enterprise);
            $this->autoRender = true;
            $this->autoLayout = false;
        }
    }
    
    public function admin_save($id) {
        $this->autoRender = false;
        $enterprise = $this->data['EditEnterprise'.$id];
        $enterprise['id'] = $id;
        if ($this->Enterprise->save($enterprise)) {
            $this->Enterprise->id = $id;
            $enterprise = $this->Enterprise->read();
            $this->set('enterprise', $enterprise);
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
            $this->Enterprise->save($save);
        }
    }
}