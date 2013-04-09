<?php
class Topic extends AppModel {
    protected $_reservedKeys = array(
        'is_display',
    );
    
    public function buildFilter($query) {
        $search = array();
        
        if (isset($query['lang']) && $query['lang']) {
            $search['lang'] = $query['lang'];
        }
        
        if (isset($query['year']) && $query['year']) {
            $search['topic_date LIKE'] = $query['year'].'%';
            if (isset($query['month']) && $query['month']) {
                $search['topic_date LIKE'] = date('Y-m', mktime(0, 0, 0, $query['month'], 1, $query['year'])).'%';
            }
        }
        
        if (isset($query['start']) && $query['start']) {
            $search['topic_date >='] = $query['start'];
        }
        
        if (isset($query['end']) && $query['end']) {
            $search['topic_date <='] = $query['end'];
        }
        
        foreach ($this->_reservedKeys as $key) {
            $search[$key] = $query[$key];
        }

        return $search;
    }
    
    public function beforeSave() {
        if (isset($this->data[$this->name]['topic_date']) && empty($this->data[$this->name]['topic_date'])) {
            $this->data[$this->name]['topic_date'] = date('Y-m-d H:i');
        }
        return true;
    }
}