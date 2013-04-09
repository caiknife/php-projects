<?php
class HomeController extends AppController {
    public $uses = array(
        'News', 'Subindex', 'Wine', 'Banner', 'Partner'
    );
    
    //frontend goes here
    
    public function index() {
        
    }
    
    // cn frontend goes here
    
    public function cn_index() {
        //banners
        $banners = $this->Banner->order('sort ASC')->limit(5)->select();
        $this->set('banners', $banners);
        
        // news
        $this->setNewsTypes();
        $displayType = array(1, 6);
        $displayNews = array();
        foreach ($displayType as $type) {
            $displayNews[$type] = $this->News->where(array('deleted'=>0, 'is_display'=>1, 'type_id'=>$type))->limit(5)->order('created DESC')->select();
        }
        $this->set('displayNews', $displayNews);
        
        // index
        $displaySubType = array('CWPI-100', 'CGWPI', 'IWPI', 'CLPI');
        $displayIndexes = $this->Subindex->where(array('title'=>$displaySubType, 'deleted'=>0))->select();        
        $this->set('displayIndexes', $displayIndexes);
        
        // partners
        $partners = $this->Partner->where(array('is_display'=>1))->order('sort ASC')->limit(7)->select();
        $this->set('partners', $partners);
    }
    
    public function cn_wine() {
        $this->autoLayout = false;
        $type = $this->params['form']['type'];
        $subtype = $this->params['form']['subtype'];
        $wines =  $this->Wine->where($this->Wine->buildFilter(array('type'=>$type, 'index_sub_id'=>$subtype, 'is_display'=>1)))->order('Wine.created DESC')->limit(8)->select();
        $this->set('wines', $wines);
    }
    
    //backend goes here
    
    public function admin_index() {
        $this->autoLayout = false;
    }
    
    protected function _adminBeforeFilter() {
        return;
    }
}