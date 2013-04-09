<?php
class Photo extends AppModel {
    var $hasAndBelongsToMany = array(        
    	'Project' => array(
    		'className' => 'Project',                
    		'joinTable' => 'photo_project',
            'with' => 'PhotoProject',                
    		'foreignKey' => 'photo_id',                
    		'associationForeignKey' => 'project_id',                
    		'unique' => true,                
    		'conditions' => 'Project.is_display=1',                              
    		'order' => 'PhotoProject.created ASC', 
        )
    );
    
    var $belongsTo = array(
         'Album' => array(            
         	'className' => 'Album',            
         	'foreignKey' => 'album_id',      
         )
    );
}