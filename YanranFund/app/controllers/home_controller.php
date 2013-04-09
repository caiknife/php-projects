<?php
class HomeController extends AppController {
    public $uses = array(
        'Administrator',
    );
    
    protected function _adminBeforeFilter() {
        $this->autoLayout = false;
        return;
    }
    
    public function cn_index() {
        $this->index('cn');
    }
    
    public function en_index() {        
        $this->index('en');
    }
    
    public function index($lang) {
        $this->autoLayout = false;       
    }
    
    // backend goes here
    public function admin_index() {
        
    }
}