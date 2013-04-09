<?php
class PagesController extends AppController {
    public $uses = array(
        'Block', 'Category'
    );
    
    public function service() {
        $this->layout = 'popup';
    }
    
    public function map() {
        $this->autoLayout = false;
    }
    
    public function reach() {
        
    }
    
    public function about() {
        
    }
    
    public function contact() {
        
    }
    
    public function office() {
        
    }
    
    public function officemoreinfo() {
        
    }
    
    public function sitemap() {
        $categories = $this->Category->getCategoriesList();
        $this->set('categories', $categories);
    }
    
    public function view($id) {
        $block = $this->Block->where(array('id'=>$id))->first();
        if (!$block) {
            $this->cakeError('error404');
            return;
        }
        $this->set('block', $block);
    }
}