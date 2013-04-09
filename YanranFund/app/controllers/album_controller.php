<?php
class AlbumController extends AppController {
    public $uses = array(
        'Album', 'Photo', 'Project', 'PhotoProject',
    );
    
    protected $_logoAttachment;
    
    protected function _setAttachmentComponent() {
        App::import('Component', 'Attachment');
        $this->_logoAttachment = new AttachmentComponent();
        $this->_logoAttachment->initialize($this, array(
        	'rm_tmp_file' => true,
            'origin' => false,
            'images_size' => array(
                'photo_list' => array(260, 180, 'resizeCrop'),
        		'photo' => array(800, 600, 'resize'),
            ),
        ));
    }
    
    public function admin_index() {
        $this->Album->recursive = -1;
        $albums = $this->Album->where(array('is_display'=>1))->order('sort ASC, id DESC')->select();
        $this->set('albums', $albums);
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->Album->id = $val;
            $this->Album->saveField('sort', $key);
        }
    }
    
    public function admin_sortphoto() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->Photo->id = $val;
            $this->Photo->saveField('sort', $key);
        }
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Album->id = $id;
        if ($this->Album->delete($id, true)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_deletephoto($id) {
        $this->autoRender = false;
        $this->Photo->id = $id;
        if ($this->Photo->delete($id, true)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_add() {
        $data = array();
        $this->Album->save($data);
        $id = $this->Album->id;
        $this->redirect(array('action'=>'edit', 'admin'=>true, $id));
    }
    
    public function admin_edit($id) {
        $album = $this->Album->where(array('id'=>$id))->first();
        if (!$album) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->data = $album;
        $this->set('album', $album);
    }
    
    public function admin_update() {
        $data = $this->data['Album'];
        $data['is_display'] = 1;
        $this->Album->save($data);
        $this->_savePhotoForAlbum();
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
     protected function _savePhotoForAlbum() {
        if (!isset($this->params['form']['title_cn'])) {
            return;
        }
        $keys = array_keys($this->params['form']['title_cn']);
        foreach($keys as $key) {
            $this->Photo->id = null;
            $save = array(
                'id' => $key,
                'title_cn' => $this->params['form']['title_cn'][$key],
            	'title_en' => $this->params['form']['title_en'][$key],
            );
            $this->Photo->save($save);
        }
    }
    
    public function admin_upload($id) {
        $this->autoRender = false;
        $this->_setAttachmentComponent();
        $data = $this->params['form'];
        $this->_logoAttachment->upload($data, 'album_photo');
        $save = array(
            'banner_file_path' => $data['album_photo_file_path'],
            'album_id' => $id,
        );
        $this->Photo->save($save);
        $data['id'] = $this->Photo->id;
        $data['set_url'] = Router::url(array('action'=>'setcover', $id, $data['id']));
        $data['edit_url'] = Router::url(array('action'=>'photo', $data['id']));
        $data['delete_url'] = Router::url(array('action'=>'deletephoto', $data['id']));
        echo json_encode(array('msg'=>$data));
    }
     
    public function admin_setcover($albumId, $photoId) {
        $this->autoRender = false;
        $this->Photo->recursive = -1;
        $photo = $this->Photo->where(array('id'=>$photoId))->first();
        $save = array(
            'id' => $albumId,
            'banner_file_path' => $photo['Photo']['banner_file_path'],
        );
        $this->Album->save($save);
    }
    
    public function admin_photo($id) {
        $this->Photo->id = $id;
        $photo = $this->Photo->read();
        if (!$photo) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->data = $photo;
        $this->set('photo', $photo);
        $this->set('albumList', $this->Album->getAlbumListForPhoto($photo['Photo']['album_id']));
    }
    
    public function admin_updatephoto() {
        $data = $this->data['Photo'];        
        $this->Photo->save($data);
        $this->admin_uploadphoto($data['id']);
        $this->redirect(array('action'=>'edit', 'admin'=>true, $data['album_id']));
    }
    
    public function admin_uploadphoto($id) {
        $data = $this->data['Photo'];
        if (!$data['banner']['error']) {
            $this->_setAttachmentComponent();
            $this->_logoAttachment->upload($data, 'banner');
            $save = array(
                'id' => $id,
                'banner_file_path' => $data['banner_file_path'],
            );
            $this->Photo->save($save);
        }
    }
    
    public function admin_searchproject() {
        $this->autoLayout = false;
        $query = $this->params['form']['query'];
        $photoId = $this->params['form']['photoId'];
        $projects = $this->Project->where($this->Project->buildFilter(array('is_display'=>1, 'query'=>$query)))->order('Project.created DESC')->select();
        $this->set('projects', $projects);
        $this->set('photoId', $photoId);
    }
    
    public function admin_connect($photoId, $projectId) {
        $this->autoRender = false;
        $data = $this->PhotoProject->where(array('photo_id'=>$photoId, 'project_id'=>$projectId))->first();
        if ($data) {
            echo false;
        } else {
            $this->PhotoProject->save(array('photo_id'=>$photoId, 'project_id'=>$projectId));
            echo Router::url(array('action'=>'disconnect', $photoId, $projectId));
        }
    }
    
    public function admin_disconnect($photoId, $projectId) {
        $this->autoRender = false;
        if ($this->PhotoProject->deleteAll(array('photo_id'=>$photoId, 'project_id'=>$projectId), false)) {
            echo true;
        } else {
            echo false;
        }
    }
}