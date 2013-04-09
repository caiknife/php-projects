<?php
class HomeController extends AppController {
    public $uses = array(
        'HomeBanner', 'HomeEvent', 'Event', 'Brand', 'Category'
    );
    
    public $components = array(
        'Weibo'
    );
    
    /*
     * frontend part goes here
     */
    public function index() {
        $home_banners = $this->HomeBanner->getAllHomeBanners(Configure::read('HomeBanner.max'));
        $home_events = $this->HomeEvent->getAllHomeEvents(Configure::read('HomeEvent.max'));
        
        $this->Event->recursive = -1;
        $events = $this->Event->getRandomEvents();       
        
        //$weibo = $this->Weibo->getSinaWeibo(); 
        $weibo = array();
        
        $lockedCategories = $this->Category->getLockedCategoriesList();
        
        $this->set('home_banners', $home_banners);
        $this->set('home_events', $home_events);
        $this->set('events', $events);
        $this->set('weibo', $weibo);
        $this->set('lockedCategories', $lockedCategories);
    }
    
    public function brands() {
        if ($this->RequestHandler->isAjax()) {
            $this->autoLayout = false;
        }
        $cate = $this->params['named']['cate'];
        $this->Brand->recursive = -1;
        $brands = $this->Brand->getFeaturedBrands($cate);
        $this->set('brands', $brands);
    }
    
    /*
     * backend part goes here
     */
    public function admin_index() {
        if ($this->Session->check('Admin.login')) {
            $this->redirect(array('controller'=>'top', 'action'=>'index', 'admin'=>true));
        }
        $this->layout = '';
    }
    
    protected function _adminBeforeFilter() {
        return;
    }
}