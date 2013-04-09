<?php
class News extends AppModel {
    public $useTable = 'news';
    
    protected $_reservedKeys = array(
        'is_display',
    );
    
    public function buildFilter($query) {
        $search = array();
        
        if (isset($query['type_id']) && $query['type_id']) {
            $search['type_id'] = $query['type_id'];
        }
        
        if (isset($query['lang']) && $query['lang']) {
            $search['lang'] = $query['lang'];
        }
        
        if (isset($query['year']) && $query['year']) {
            $search['news_date LIKE'] = $query['year'].'%';
            if (isset($query['month']) && $query['month']) {
                $search['news_date LIKE'] = date('Y-m', mktime(0, 0, 0, $query['month'], 1, $query['year'])).'%';
            }
        }
        
        if (isset($query['start']) && $query['start']) {
            $search['news_date >='] = $query['start'];
        }
        
        if (isset($query['end']) && $query['end']) {
            $search['news_date <='] = $query['end'];
        }
        
        foreach ($this->_reservedKeys as $key) {
            $search[$key] = $query[$key];
        }

        return $search;
    }
    
    public function beforeSave() {
        if (isset($this->data[$this->name]['news_date']) && empty($this->data[$this->name]['news_date'])) {
            $this->data[$this->name]['news_date'] = date('Y-m-d');
        }
        return true;
    }
}