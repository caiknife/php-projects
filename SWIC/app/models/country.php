<?php 
class Country extends AppModel {
    public $useTable = 'country';
    
    public $displayField = 'title_cn';
    
    public function getList() {
        return $this->find('list', array('order'=>'id ASC'));
    }
}