<?php
class Plan extends AppModel {
    protected $_reservedKeys = array(
        'is_display',
        'is_public',
    );
    
    public function buildFilter($query) {
        $search = array();
        
        if (isset($query['lang']) && $query['lang']) {
            $search['lang'] = $query['lang'];
        }
        
        if (isset($query['year']) && $query['year']) {
            $search['public_date LIKE'] = $query['year'].'%';
            if (isset($query['month']) && $query['month']) {
                $search['public_date LIKE'] = date('Y-m', mktime(0, 0, 0, $query['month'], 1, $query['year'])).'%';
            }
        }
        
        if (isset($query['start']) && $query['start']) {
            $search['public_date >='] = $query['start'];
        }
        
        if (isset($query['end']) && $query['end']) {
            $search['public_date <='] = $query['end'];
        }
        
        foreach ($this->_reservedKeys as $key) {
            if (isset($query[$key])) {
                $search[$key] = $query[$key];
            }
        }

        return $search;
    }
}