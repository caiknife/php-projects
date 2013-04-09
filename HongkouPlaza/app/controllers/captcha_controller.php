<?php
class CaptchaController extends AppController {
    public $uses = array();
    public $components = array(
        'Captcha'
    );
    
    public function index() {
        Configure::write('debug', 0);
		$this->autoRender = false;
		$this->Captcha->render();
    }
    
    public function read() {
        Configure::write('debug', 0);
        $this->autoRender = false;
        echo $this->Session->read('captcha');
    }
}