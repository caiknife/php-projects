<?php
class TeamController extends AppController {
    public $uses = array(
        'ReviewTeam',
    );
    
    protected $_logoAttachment;
    
    // frontend goes here
    
    // cn frontend goes here
    
    // backend goes here
    public function admin_index() {
        if ($this->RequestHandler->isPost()) {
            $url = array('action'=>'index', 'admin'=>true);
            isset($this->data['type']) ? $url['type'] = $this->data['type'] : null;
            $this->redirect($url);
        }
        $teamType = Configure::read('ReviewTeam.type');
        $this->set('teamType', $teamType);
        $type = isset($this->params['named']['type']) ? $this->params['named']['type'] : '';
        $this->set('current', $type);
        $this->data['type'] = $type;
        $results = array();
        foreach ($teamType as $key=>$val) {
            $results[$key] = $this->ReviewTeam->where(array('is_display'=>1, 'type_id'=>$key))->order('sort ASC')->select();
        }
        $this->set('results', $results);
    }    
    
    public function admin_add() {        
        $this->ReviewTeam->save(array());
        $id = $this->ReviewTeam->id;
        $this->redirect(array('action'=>'edit', 'admin'=>true, $id));
    }
    
    public function admin_edit($id) {
        $team = $this->ReviewTeam->where(array('id'=>$id))->first();
        if (!$team) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->data = $team;
        $this->set('team', $team);
    }
    
    public function admin_update() {
        $data = $this->data['ReviewTeam'];
        $data['is_display'] = 1;
        $this->ReviewTeam->save($data);
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->ReviewTeam->id = $id;
        if ($this->ReviewTeam->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->ReviewTeam->id = $val;
            $this->ReviewTeam->saveField('sort', $key);
        }
    }
    
    public function admin_upload() {
        $this->autoRender = false;
        $this->_setAttachmentComponent();
        $data = $this->params['form'];
        $this->_logoAttachment->upload($data, 'team_logo');
        $data['media_url'] = $data['team_logo_file_path'];
        $this->ReviewTeam->save($data);
        echo json_encode(array('msg'=>$data));
    }
    
    protected function _setAttachmentComponent() {
        App::import('Component', 'Attachment');
        $this->_logoAttachment = new AttachmentComponent();
        $this->_logoAttachment->initialize($this, array(
        	'rm_tmp_file' => true,
            'origin' => true,
            'images_size' => array(
                'team' => array(120, 150, 'resizeCropForWidth'),
            ),
        ));
    }
}