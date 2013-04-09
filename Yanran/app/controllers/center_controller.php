<?php
class CenterController extends AppController {    
    public $uses = array(
        'Block', 'Board'
    );
    
    public function cn_view($id) {
        $this->view('cn', $id);
    }
    
    public function en_view($id) {
        $this->view('en', $id);
    }
    
    public function view($lang, $id) {
        // board
        $board = $this->Board->where(array('type'=>'center'))->first();
        $this->set('board', $board);
        
        $block = $this->Block->where(array('type'=>'center', 'id'=>$id))->first();
        if (!$block) {
            $this->cakeError('error404');
            return;
        }
        $this->set('block', $block);
    }
}