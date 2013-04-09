<?php
class Album extends AppModel {
    public $hasMany = array(
        'Photo' => array(
        	'className' => 'Photo',
    		'foreignKey' => 'album_id',
    		'order' => 'Photo.sort ASC, Photo.id DESC',
    		'dependent' => true,        
        ),
    );
    
    public function getAlbumListForPhoto($albumId) {
        $this->displayField = 'title_cn';
        return $this->where(array(
            'OR' => array(
                'is_display' => 1,
                'id' => $albumId,    
            )
        ))->order('sort ASC, id DESC')->lists();
    }
}