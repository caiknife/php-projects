<?php
class Region extends AppModel {
    public $displayField = 'title';
    
    public function getList() {
        return $this->find('list', array('conditions'=>array('deleted'=>0), 'order'=>'sort ASC'));
    }
}