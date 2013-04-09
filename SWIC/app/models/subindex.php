<?php
class Subindex extends AppModel {
    public $useTable = 'index_sub';
    
    public $displayField = 'title';
    
    public function getList($pid) {
        return $this->find('list', array('conditions'=>array('deleted'=>0, 'pid'=>$pid), 'order'=>'sort ASC'));
    }
}