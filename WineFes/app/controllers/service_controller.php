<?php
class ServiceController extends AppController {
    public $uses = array(
        'Article', 'Partner'
    );
    
    // frontend goes here
    public function cn_view($id) {
        $article = $this->Article->where(array('id'=>$id))->first();
        $this->set('article', $article);
        if ($article['Article']['type']=='apply') {
            $this->cn_apply();
            $this->render('cn_apply');
        } elseif ($article['Article']['type']=='partner') {
            $this->cn_partner();
            $this->render('cn_partner');
        }
    }
    
    public function cn_index() {
        $this->redirect(array('action'=>'hotel', 'cn'=>true));
    }
    
    public function cn_hotel() {
        $article = $this->Article->where(array('type'=>'hotel'))->first();
        $this->set('article', $article);
    }
    
    public function cn_apply() {
        $article = $this->Article->where(array('type'=>'apply'))->first();
        $this->set('article', $article);
    }
    
    public function cn_ticket() {
        $article = $this->Article->where(array('type'=>'ticket'))->first();
        $this->set('article', $article);
    }
    
    public function cn_partner() {
        $partners = $this->Partner->order('sort ASC, id DESC')->select();
        $this->set('partners', $partners);
    }
    
}