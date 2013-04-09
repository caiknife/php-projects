<?php
class TastingNotes extends AppModel {
    public $useTable = 'tasting_notes';
    
    public $hasMany = array(
        'TastingScore' => array(
            'className' => 'TastingScore',
            'foreignKey' => 'tasting_notes_id',
        	'order' => 'TastingScore.created DESC',
        ),      
    );
    
    public $displayField = 'title';
    
    public $reservedKeys = array(
    	'is_display',
    );
    
    public function getList() {
        return $this->find('list', array('conditions'=>array('deleted'=>0, 'is_display'=>1), 'order'=>'id ASC'));
    }
    
    public function buildFilter($query) {
        $search = parent::buildFilter();
        foreach ($this->reservedKeys as $key) {
            if (isset($query[$key]) && $query[$key]) {
                $search[$this->name.'.'.$key] = $query[$key];
            }
        }
        if (isset($query['year']) && $query['year']) {
            $search[$this->name.'.date_time LIKE'] = $query['year'].'%';
        }
        return $search;
    }
    
    public function getWinesByNoteId($id) {
        App::import('Model', 'TastingScore');
        $tastingScoreModel = new TastingScore();
        $results = $tastingScoreModel->where(array('tasting_notes_id'=>$id))->select();
        if (!$results) {
            return array();
        }
        $ids = array();
        foreach ($results as $result) {
            $ids[] = $result['TastingScore']['wines_id'];
        }
        App::import('Model', 'Wine');
        $wineModel = new Wine();
        $wines = $wineModel->where(array('Wine.deleted'=>0, 'Wine.is_display'=>1, 'Wine.id'=>$ids))->order('Wine.created DESC')->select();
        return $wines;
    }
}