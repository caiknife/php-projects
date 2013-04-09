<?php
class Project extends AppModel {
    public $hasMany = array(
        'Logo' => array(
        	'className' => 'Logo',
    		'foreignKey' => 'project_id',
    		'order' => 'Logo.sort ASC, Logo.id DESC',
    		'dependent' => true,        
        ),
    );
    
    protected $_reservedKeys = array(
        'is_display',
    );
    
    public function buildFilter($query, $lang=null) {
        $search = array();
        
        if ($lang) {
            $search['title_'.$lang.' <>'] = ''; 
            $search['desc_'.$lang.' <>'] = ''; 
            $search['content_'.$lang.' <>'] = '';     
        }
        
        if (isset($query['query']) && $query['query']) {
            $search['OR'] = array(
                'title_cn LIKE' => '%'.$query['query'].'%',
            	'title_en LIKE' => '%'.$query['query'].'%', 
            );
        }
        
        foreach ($this->_reservedKeys as $key) {
            $search[$key] = $query[$key];
        }

        return $search;
    }
}