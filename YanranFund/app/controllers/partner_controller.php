<?php
class PartnerController extends AppController {
    public $uses = array(
        'Enterprise', 'Person',
    );
    
    public function cn_index() {
        $this->index('cn');
    }
    
    public function en_index() {
        $this->index('en');
    }
    
    public function index($lang) {
        $this->redirect(array('action'=>'enterprise'));
    }
    
    public function cn_enterprise() {
        $this->enterprise('cn');
    }
    
    public function en_enterprise() {
        $this->enterprise('en');
    }
    
    public function enterprise($lang) {
        $enterprises = $this->Enterprise->order('sort ASC, id DESC')->select();
        $this->set('enterprises', $enterprises);
    }
    
    public function cn_personal() {
        $this->personal('cn');
    }
    
    public function en_personal() {
        $this->personal('en');
    }
    
    public function personal($lang) {
        $persons = $this->Person->where(array('type'=>1))->order('sort ASC, id DESC')->select();
        $this->set('persons', $persons);
    }
}