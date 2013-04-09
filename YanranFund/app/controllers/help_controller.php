<?php
class HelpController extends AppController {
    public $uses = array(
        'Hblock',
    );
    
    // frontend goes here
    public function cn_index() {
        $this->index('cn');
    }
    
    public function en_index() {
        $this->index('en');
    }
    
    public function index($lang) {
        $hblockList = $this->Hblock->getList($lang, true);
        if (!$hblockList) {
            $this->cakeError('error404');
            return;
        }
        $firstId = array_shift(array_keys($hblockList));
        $this->redirect(array('action'=>'view', $firstId));
    }
    
    public function cn_view($id) {
        $this->view('cn', $id);
    }
    
    public function en_view($id) {
        $this->view('en', $id);
    }
    
    public function view($lang, $id) {
        $this->Hblock->id = $id;
        $hblock = $this->Hblock->read();
        if (!$hblock) {
            $this->cakeError('error404');
            return;
        }
        $this->set('hblock', $hblock);
        $this->set('id', $id);
        
        $hblockList = $this->Hblock->getList($lang, true);
        $this->set('hblockList', $hblockList);
        
        if ($hblock['Hblock']['type']) {
            $method = '_'.$hblock['Hblock']['type'];
            $this->{$method}();
            $this->render($lang.'_'.$hblock['Hblock']['type']);
        }
    }
        
    protected function _apply() {
        
    }
}