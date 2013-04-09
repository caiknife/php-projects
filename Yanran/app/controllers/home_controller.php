<?php
class HomeController extends AppController {
    public $uses = array(
        'Banner', 'Team', 'Partner', 'News', 'Board'
    );
    
    protected function _adminBeforeFilter() {
        $this->autoLayout = false;
        return;
    }
    
    // frontend goes here
    public function cn_index() {
        $this->index('cn');
    }
    
    public function en_index() {
        $this->index('en');
    }
    
    public function index($lang) {        
        // board
        $board = $this->Board->where(array('type'=>'index'))->first();
        $this->set('board', $board);
        
        // banner
        $banners = $this->Banner->limit(5)->order('sort ASC, id DESC')->select();
        $this->set('banners', $banners);
        
        // team
        $teams = $this->Team->limit(6)->order('sort ASC, id DESC')->select();
        $this->set('teams', $teams);
        
        // partners
        $partners = $this->Partner->order('sort ASC, id DESC')->select();
        $this->set('partners', $partners);
        
        //news
        $hotNews = $this->News->where(array('lang'=>$lang))->order('news_date DESC, created DESC')->limit(5)->select();
        $this->set('hotNews', $hotNews);
    }
    
    // backend goes here
    public function admin_index() {
        
    }
}