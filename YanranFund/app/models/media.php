<?php
class Media extends AppModel {
    public $useTable = 'medias';
    
    protected $_reservedKeys = array(
        'is_display',
    );
    
    public function buildFilter($query) {
        $search = array();
        
        if (isset($query['lang']) && $query['lang']) {
            $search['lang'] = $query['lang'];
        }
        
        if (isset($query['year']) && $query['year']) {
            $search['media_date LIKE'] = $query['year'].'%';
            if (isset($query['month']) && $query['month']) {
                $search['media_date LIKE'] = date('Y-m', mktime(0, 0, 0, $query['month'], 1, $query['year'])).'%';
            }
        }
        
        if (isset($query['start']) && $query['start']) {
            $search['media_date >='] = $query['start'];
        }
        
        if (isset($query['end']) && $query['end']) {
            $search['media_date <='] = $query['end'];
        }
        
        foreach ($this->_reservedKeys as $key) {
            $search[$key] = $query[$key];
        }

        return $search;
    }
    
    public function beforeSave() {
        if (isset($this->data[$this->name]['media_date']) && empty($this->data[$this->name]['media_date'])) {
            $this->data[$this->name]['media_date'] = date('Y-m-d H:i');
        }
        return true;
    }
}