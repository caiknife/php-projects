<?php
class BoardController extends AppController {
    public $uses = array(
        'Board',
    );
    
    protected $_logoAttachment;
    
    protected function _setAttachmentComponent() {
        App::import('Component', 'Attachment');
        $this->_logoAttachment = new AttachmentComponent();
        $this->_logoAttachment->initialize($this, array(
        	'rm_tmp_file' => true,
            'origin' => false,
            'images_size' => array(
                'board' => array(980, 400, 'resizeCrop'),
            ),
        ));
    }
    
    // cn frontend goes here
    
    // backend goes here
    public function admin_index() {
        $boards = $this->Board->order('sort ASC, id DESC')->select();
        $this->set('boards', $boards);
    }
    
    public function admin_edit($id) {
        $this->autoRender = false;
        $board = $this->Board->where(array('id'=>$id))->first();
        if (!$board) {
            echo false;
        } else {
            $this->data['EditBoard'.$id] = $board['Board'];
            $this->set('id', $id);
            $this->set('board', $board);
            $this->autoRender = true;
            $this->autoLayout = false;
        }   
    }

    public function admin_save($id) {
        $this->autoRender = false;
        $board = $this->data['EditBoard'.$id];
        $board['id'] = $id;
        if ($this->Board->save($board)) {
            $this->Board->id = $id;
            $board = $this->Board->read();
            $this->set('board', $board);
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
            $this->Board->save($save);
        }
    }
}