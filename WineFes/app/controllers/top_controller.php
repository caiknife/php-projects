<?php
class TopController extends AppController {
    public $uses = array();
    
    // frontend goes here
    
    // backend goes here
    public function admin_index() {
        $this->autoLayout = false;
    }
}