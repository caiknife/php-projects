<?php
class MemberController extends AppController {
    public $uses = array(
        'Member',
    );
    
    // frontend goes here
    
    // cn frontend goes here
    public function cn_index() {
        $teamType = Configure::read('Member.type');
        $this->set('teamType', $teamType);
        
        $results = array();
        foreach ($teamType as $key=>$val) {
            $results[$key] = $this->Member->where(array('type_id'=>$key))->order('sort ASC')->select();
        }
        $this->set('results', $results);
    }
    // backend goes here
    public function admin_index() {
        if ($this->RequestHandler->isPost()) {
            $url = array('action'=>'index', 'admin'=>true);
            isset($this->data['type']) ? $url['type'] = $this->data['type'] : null;
            $this->redirect($url);
        }
        $teamType = Configure::read('Member.type');
        $this->set('teamType', $teamType);
        $type = isset($this->params['named']['type']) ? $this->params['named']['type'] : '';
        $this->set('current', $type);
        $this->data['type'] = $type;
        $results = array();
        foreach ($teamType as $key=>$val) {
            $results[$key] = $this->Member->where(array('type_id'=>$key))->order('sort ASC')->select();
        }
        $this->set('results', $results);
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->Member->id = $val;
            $this->Member->saveField('sort', $key);
        }
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Member->id = $id;
        if ($this->Member->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_add() {
        $this->autoRender = false;
        $data = array(
            'type_id' => $this->params['form']['type_id'],
            'title' => $this->params['form']['title'],
        );
        if ($this->Member->save($data)) {
            $data['id'] = $this->Member->id;
            $this->autoLayout = false;
            $this->autoRender = true;
            $this->set('member', $data);
        } else {
            echo false;
        }
    }
    
    public function admin_edit($id) {
        $this->autoRender = false;
        $member = $this->Member->where(array('id'=>$id))->first();
        if (!$member) {
            echo false;
        } else {
            $this->data['EditMember'.$id] = $member['Member'];
            $this->set('id', $id);
            $this->autoRender = true;
            $this->autoLayout = false;
        }
    }
    
    public function admin_save($id) {
        $this->autoRender = false;
        $member = $this->params['form'];
        $member['id'] = $id;
        if ($this->Member->save($member)) {
            $this->set('member', $member);
            $this->autoRender = true;
            $this->autoLayout = false;
            $this->render('admin_add');
        } else {
            echo false;
        }
    }
}