<?php
class WineGrapeVariety extends AppModel {
    public $useTable = 'wines_grape_varieties';
    
    public $belongsTo = array(
        'Wine' => array(
            'className' => 'Wine',            
        	'foreignKey' => 'wines_id'
        ),
    	'GrapeVariety' => array(
            'className' => 'GrapeVariety',            
        	'foreignKey' => 'grape_varieties_id'
        ),
    );
}