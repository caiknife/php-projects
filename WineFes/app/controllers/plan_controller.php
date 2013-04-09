<?php
class PlanController extends AppController {
    public $uses = array(
        'Plan'
    );
    
    protected $_logoAttachment;
    
    protected function _setAttachmentComponent() {
        App::import('Component', 'Attachment');
        $this->_logoAttachment = new AttachmentComponent();
        $this->_logoAttachment->initialize($this, array(
        	'rm_tmp_file' => true,
            'origin' => true,
            'images_size' => array(
                'plan_logo' => array(220, 0, 'resize'),
        		'plan' => array(1000, 1000, 'resize'),
            ),
        ));
    }
    
    // frontend goes here
    
    // backend goes here

    public function admin_index() {
        $plans = $this->Plan->order('sort ASC, id DESC')->select();
        $this->set('plans', $plans);
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->Plan->id = $val;
            $this->Plan->saveField('sort', $key);
        }
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Plan->id = $id;
        if ($this->Plan->delete($id, false)) {
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
            'title' => $data['banner_title'],
            'banner_file_path' => $data['banner_pic_file_path'],
        );
        $this->Plan->save($save);
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_edit($id) {
        $this->autoRender = false;
        $plan = $this->Plan->where(array('id'=>$id))->first();
        if (!$plan) {
            echo false;
        } else {
            $this->data['EditPlan'.$id] = $plan['Plan'];
            $this->set('id', $id);
            $this->set('plan', $plan);
            $this->autoRender = true;
            $this->autoLayout = false;
        }
    }
    
    public function admin_save($id) {
        $plan = $this->data['EditPlan'.$id];
        $plan['id'] = $id;
        if ($this->Plan->save($plan)) {
            $this->Plan->id = $id;
            $plan = $this->Plan->read();
            $this->set('plan', $plan);
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
            $this->Plan->save($save);
        }
    }
}