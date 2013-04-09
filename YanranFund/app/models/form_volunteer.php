<?php
class FormVolunteer extends AppModel {
    protected $_reservedKeys = array(
       
    );
    
    public function buildFilter($query) {
        $search = array();
       
        foreach ($this->_reservedKeys as $key) {
            $search[$key] = $query[$key];
        }

        return $search;
    }
}