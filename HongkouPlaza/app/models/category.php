<?php
class Category extends AppModel {
    public $useTable = 'categories';
    
    public function getCategoriesList() {
        return $this->find('list', array('conditions' => array('deleted' => 0), 'order' => 'sort ASC, id ASC'));
    }
    
    public function getCategoryByName($name) {
        return $this->find('first', array('conditions' => array('deleted' => 0, 'name' => $name), 'order' => 'id ASC'));
    }
    
    public function getEditableCategoriesList() {
        return $this->find('list', array('conditions' => array('deleted' => 0, 'is_lock' => 0), 'order' => 'sort ASC, id ASC'));
    }
    
    public function getLockedCategoriesList() {
        return $this->find('list', array('conditions' => array('deleted' => 0, 'is_lock' => 1), 'order' => 'sort ASC, id ASC'));
    }
}