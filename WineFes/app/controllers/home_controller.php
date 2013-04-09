<?php
class HomeController extends AppController {
    public $uses = array(
        'Banner', 'Guest', 'Article', 'Activity'
    );
    
    protected function _adminBeforeFilter() {
        $this->autoLayout = false;
        return;
    }
    
    // frontend goes here
    public function cn_index() {
        $banners = $this->Banner->order('sort ASC, id DESC')->limit(5)->select();
        $this->set('banners', $banners);
        
        $guests = $this->Guest->order('sort ASC, id DESC')->select();
        $this->set('guests', $guests);
        
        $organization = $this->Article->where(array('type'=>'organization'))->first();
        $this->set('organization', $organization);
        
        $activities = $this->Activity->where(array('is_display'=>1))->order('activity_date DESC')->limit(4)->select();
        $this->set('activities', $activities);
    }
    
    // backend goes here
    public function admin_index() {
        
    }
}