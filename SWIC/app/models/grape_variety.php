<?php
class GrapeVariety extends AppModel {
    public $displayField = 'title_cn';
    
    public function getList() {
        return $this->find('list', array('conditions'=>array('deleted'=>0), 'order'=>'sort ASC'));
    }
}