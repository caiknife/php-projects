<?php
class ResourceController extends AppController {
    public $uses = array();
    
    protected function _frontendBeforeFilter($lang) {
        $this->lang = $lang;
        $this->set('lang', $lang);
    }
    
    public function cn_download($file=null) {
        $this->download('cn', $file);
    }
    
    public function en_download($file=null) {
        $this->download('en', $file);
    }
   
    public function download($lang, $file=null) {
        $this->autoRender = false;
        if (!$file) {
            $this->cakeError('error404');
            return;
        }
        $resource = WWW_ROOT.'attachments'.DS.'files'.DS.$file;
        $path_parts = pathinfo($file);
        $this->view = 'media';
        $params = array(              
        	'id' => $file,
        	'name' => $path_parts['filename'],          
        	'extension' => $path_parts['extension'],    
        	'download' => true,              
        	'path' => WWW_ROOT.'attachments'.DS.'files'.DS   // don't forget terminal 'DS'       
        );
        $this->set($params);
        $this->render();            
    }
}