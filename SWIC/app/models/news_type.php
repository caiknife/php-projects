<?php
class NewsType extends AppModel {
    public $displayField = 'title';
    
    public function getList() {
        return $this->find('list', array('order'=>'sort ASC'));
    }
    
    public function getLogoList() {
        $this->displayField = 'media_url';
        return $this->find('list', array('order'=>'sort ASC'));
    }
}