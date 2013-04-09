<?php
class TeamController extends AppController {
    public $uses = array(
        'Team', 'Board'
    );
    
    protected $_logoAttachment;
    
    protected function _setAttachmentComponent() {
        App::import('Component', 'Attachment');
        $this->_logoAttachment = new AttachmentComponent();
        $this->_logoAttachment->initialize($this, array(
        	'rm_tmp_file' => true,
            'origin' => false,
            'images_size' => array(
                'team' => array(200, 200, 'resizeCrop'),
            ),
        ));
    }
    
    // cn frontend goes here
    public function cn_index() {
        $this->index('cn');
    }
    
    public function en_index() {
        $this->index('en');
    }
    
    public function index($lang) {
        // board
        $board = $this->Board->where(array('type'=>'team'))->first();
        $this->set('board', $board);
        
        // team
        $teams = $this->Team->order('sort ASC, id DESC')->select();
        $this->set('teams', $teams);
    }
    
    
    // backend goes here
    public function admin_index() {
        $teams = $this->Team->order('sort ASC, id DESC')->select();
        $this->set('teams', $teams);
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->Team->id = $val;
            $this->Team->saveField('sort', $key);
        }
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Team->id = $id;
        if ($this->Team->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_add() {
        $data = array();
        $this->Team->save($data);
        $id = $this->Team->id;
        $this->redirect(array('action'=>'edit', 'admin'=>true, $id));
    }
    
    public function admin_edit($id) {
        $team = $this->Team->where(array('id'=>$id))->first();
        if (!$team) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->data = $team;
        $this->set('team', $team);
    }
    
    public function admin_update() {
        $data = $this->data['Team'];
        $data['is_display'] = 1;
        $this->Team->save($data);
        $this->admin_upload($data['id']);
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_upload($id) {
        $data = $this->data['Team'];
        if (!$data['banner']['error']) {
            $this->_setAttachmentComponent();
            $this->_logoAttachment->upload($data, 'banner');
            $save = array(
                'id' => $id,
                'banner_file_path' => $data['banner_file_path'],
            );
            $this->Team->save($save);
        }
    }
}