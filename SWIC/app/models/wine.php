<?php
class Wine extends AppModel {
    public $belongsTo = array(
        'Country' => array(
        	'className' => 'Country',            
        	'foreignKey' => 'country_id',
        ),
    	'Winery' => array(
            'className' => 'Winery',            
        	'foreignKey' => 'winery_id',
            'conditions' => 'Winery.deleted = 0',
        ),
        'Region' => array(
            'className' => 'Region',            
        	'foreignKey' => 'regions_id',
            'conditions' => 'Region.deleted = 0',
        ),
        'Importer' => array(
            'className' => 'Importer',            
        	'foreignKey' => 'importer_id',
            'conditions' => 'Importer.deleted = 0',
        ),
        'StatutoryLevel' => array(
            'className' => 'StatutoryLevel',            
            'foreignKey' => 'statutory_level_id',
            'conditions' => 'StatutoryLevel.deleted = 0',
        ),
        'Subindex' => array(
            'className' => 'Subindex',            
        	'foreignKey' => 'index_sub_id',
            'conditions' => 'Subindex.deleted = 0',
        ),
        'WineType' => array(
            'className' => 'WineType',            
        	'foreignKey' => 'index_type',
        ),
    );
    
    public $hasMany = array(
        'WineGrapeVariety' => array(
            'className' => 'WineGrapeVariety',            
        	'foreignKey' => 'wines_id',
            'order' => 'WineGrapeVariety.created ASC',
        ),
        'PriceMonthly' => array(
            'className' => 'PriceMonthly',
            'foreignKey' => 'wines_id',
        	'order' => 'PriceMonthly.year DESC, PriceMonthly.month DESC',
        ),
        'TastingScore' => array(
            'className' => 'TastingScore',
            'foreignKey' => 'wines_id',
        	'order' => 'TastingScore.created DESC',
        ),
        
    );
    
    public $reservedKeys = array(
    	'year', 
    	'statutory_level_id', 
    	'country_id', 
    	'regions_id', 
    	'winery_id', 
    	'importer_id', 
    	'index_sub_id', 
    	'index_type',
    	'is_display', 
    	'benchmark_year', 
    	'benchmark_month'
    );
    
    public function buildFilter($query) {
        $search = parent::buildFilter(array());
        if (isset($query['type']) && $query['type']) {
            $search['index_type'] = $query['type'];
        }
        foreach ($this->reservedKeys as $key) {
            if (isset($query[$key]) && $query[$key]) {
                $search[$this->name.'.'.$key] = $query[$key];
            }
        }
        return $search;
    }
    
}