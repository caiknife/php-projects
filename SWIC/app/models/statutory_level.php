<?php
class StatutoryLevel extends AppModel {
    public $useTable = 'statutory_level';
    
    public $displayField = 'title';
    
    public function getList() {
        return $this->find('list', array('conditions'=>array('deleted'=>0), 'order'=>'sort ASC'));
    }
}