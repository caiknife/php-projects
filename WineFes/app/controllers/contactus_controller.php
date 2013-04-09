<?php
class ContactusController extends AppController {
    public $uses = array(
        'Article'
    );
    
    // frontend goes here
    public function cn_index() {
        $contactus = $this->Article->where(array('type'=>'contactus'))->first();
        $this->set('contactus', $contactus);
    }
}