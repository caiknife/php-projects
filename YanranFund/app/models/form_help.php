<?php
class FormHelp extends AppModel {
    public $hasMany = array(
        'Attach0' => array(
        	'className' => 'HelpAttachment',
    		'foreignKey' => 'help_id',
            'conditions' => array('Attach0.type'=>0),
    		'order' => 'Attach0.id ASC',
    		'dependent' => true,        
        ),
        'Attach1' => array(
        	'className' => 'HelpAttachment',
    		'foreignKey' => 'help_id',
            'conditions' => array('Attach1.type'=>1),
    		'order' => 'Attach1.id ASC',
    		'dependent' => true,        
        ),
        'Attach2' => array(
        	'className' => 'HelpAttachment',
    		'foreignKey' => 'help_id',
            'conditions' => array('Attach2.type'=>2),
    		'order' => 'Attach2.id ASC',
    		'dependent' => true,        
        ),
        'Attach3' => array(
        	'className' => 'HelpAttachment',
    		'foreignKey' => 'help_id',
            'conditions' => array('Attach3.type'=>3),
    		'order' => 'Attach3.id ASC',
    		'dependent' => true,        
        ),
        'Attach4' => array(
        	'className' => 'HelpAttachment',
    		'foreignKey' => 'help_id',
            'conditions' => array('Attach4.type'=>4),
    		'order' => 'Attach4.id ASC',
    		'dependent' => true,        
        ),
        'Attach5' => array(
        	'className' => 'HelpAttachment',
    		'foreignKey' => 'help_id',
            'conditions' => array('Attach5.type'=>5),
    		'order' => 'Attach5.id ASC',
    		'dependent' => true,        
        ),
    );
    
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