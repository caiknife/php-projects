<?php
class News extends AppModel {
    public $useTable = 'news';
    
    var $hasAndBelongsToMany = array(        
    	'Project' => array(
    		'className' => 'Project',                
    		'joinTable' => 'news_project',
            'with' => 'NewsProject',                
    		'foreignKey' => 'news_id',                
    		'associationForeignKey' => 'project_id',                
    		'unique' => true,                
    		'conditions' => 'Project.is_display=1',                              
    		'order' => 'NewsProject.created ASC', 
        )
    );
    
    protected $_reservedKeys = array(
        'is_display',
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
    
    public function getRelativeNews($id=null) {
        if (!$id) {
            $id = $this->id;
        } else {
            $this->id = $id;
        }
        $news = $this->read();
        $projectIds = array();
        foreach ($news['Project'] as $project) {
            $projectIds[] = $project['id'];
        }
        $relations = $this->NewsProject->where(array('project_id'=>$projectIds))->select();
        if (!$relations) {
            return array();
        }
        $relativeNewsIds = array();
        foreach ($relations as $item) {
            $relativeNewsIds[] = $item['NewsProject']['news_id'];
        }
        $this->recursive = -1;
        return $this->where(array('id'=>$relativeNewsIds, 'id <>'=>$id, 'lang'=>$news['News']['lang'], 'is_display'=>1, 'is_public'=>1))->order('News.public_date DESC')->select();
    }
    
    public function beforeSave() {
        if (isset($this->data[$this->name]['public_date']) && empty($this->data[$this->name]['public_date'])) {
            $this->data[$this->name]['public_date'] = date('Y-m-d H:i');
        }
        return true;
    }
}