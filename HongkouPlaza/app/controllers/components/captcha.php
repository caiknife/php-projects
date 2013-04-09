<?php
class CaptchaComponent extends Object {
    var $Controller = null;
    
    function startup(&$controller) {
        $this->Controller = $controller;
    }
    
    function render() {
        App::import('vendor', 'kcaptcha/kcaptcha');
        $kcaptcha = new KCAPTCHA();     
        $this->Controller->Session->write('captcha', $kcaptcha->getKeyString());       
        exit ();
    }
    
    function checkCaptcha($str) {
        if ($this->Controller->Session->check('captcha')) {
            $s_captcha = $this->Controller->Session->read('captcha');
            if (!empty($str) && $str==$s_captcha) {
                return true;
            }
        }
        return false;
    }
}