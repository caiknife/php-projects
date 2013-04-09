<?php
class Importer extends AppModel {
    public $useTable = 'importer';
    
    public $displayField = 'title_cn';
    
    public function buildFilter($query) {
        $search = parent::buildFilter();
        if (isset($query['title']) && $query['title']) {
            $search['OR'] = array(
                'title_cn LIKE' => '%'.$query['title'].'%',
            	'title_en LIKE' => '%'.$query['title'].'%',
            );
        }
        $keys = array('is_display');
        foreach ($keys as $key) {
            if (isset($query[$key]) && $query[$key]) {
                $search[$this->name.'.'.$key] = $query[$key];
            }
        }
        return $search;
    }
    
    public function getList() {
        $conditions = array(
            'deleted' => 0,
            'is_display' => 1,
        );
        return $this->find('list', array('order'=>'created DESC', 'conditions'=>$conditions));
    }
}