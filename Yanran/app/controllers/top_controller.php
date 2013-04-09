<?php
class TopController extends AppController {
    public $uses = array(
        
    );
    
    // cn frontend goes here
    public function cn_index() {
        
    }
    
    // backend goes here
    public function admin_index() {
        $this->autoLayout = false;
    }
}