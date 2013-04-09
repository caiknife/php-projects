<?php
class AboutController extends AppController {
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
        $board = $this->Board->where(array('type'=>'about'))->first();
        $this->set('board', $board);
        
        $block = $this->Block->where(array('type'=>'about', 'id'=>$id))->first();
        if (!$block) {
            $this->cakeError('error404');
            return;
        }
        $this->set('block', $block);
    }
}