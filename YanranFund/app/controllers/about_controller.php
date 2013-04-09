<?php
class AboutController extends AppController {
    public $uses = array(
        'Ablock', 'Person',
    );
    
    public function cn_index() {
        $this->index('cn');
    }
    
    public function en_index() {
        $this->index('en');
    }
    
    public function index($lang) {
        $ablockList = $this->Ablock->getList($lang, true);
        if (!$ablockList) {
            $this->cakeError('error404');
            return;
        }
        $firstId = array_shift(array_keys($ablockList));
        $this->redirect(array('action'=>'view', $firstId));
    }
    
    public function cn_view($id) {
        $this->view('cn', $id);
    }
    
    public function en_view($id) {
        $this->view('en', $id);
    }
    
    public function view($lang, $id) {
        $this->Ablock->id = $id;
        $ablock = $this->Ablock->read();
        if (!$ablock) {
            $this->cakeError('error404');
            return;
        }
        $this->set('ablock', $ablock);
        $this->set('id', $id);
        
        $ablockList = $this->Ablock->getList($lang, true);
        $this->set('ablockList', $ablockList);
        
        if ($ablock['Ablock']['type']) {
            $method = '_'.$ablock['Ablock']['type'];
            $this->{$method}();
            $this->render($lang.'_'.$ablock['Ablock']['type']);
        }
    }
    
    protected function _team() {
        $persons = $this->Person->where(array('type'=>2))->order('sort ASC, id DESC')->select();
        $this->set('persons', $persons);
    }
}