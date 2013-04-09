<?php 
class PageController extends AppController {
    public $uses = array();
    
    // frontend goes here
    
    // backend goes here
    
    public function admin_header() {
        $this->autoLayout = false;
    }
    
    public function admin_menu() {
        $this->setWineTypes();
    }
}