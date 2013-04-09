<?php
class WineType extends AppModel {
    public $displayField = 'title';
    
    public function getList() {
        return $this->find('list', array('order'=>'sort ASC'));
    }
}