<?php
class TopController extends AppController {
    public $uses = array(
    
    );
    
    // backend goes here
    public function admin_index() {
        $this->autoLayout = false;
    }
}