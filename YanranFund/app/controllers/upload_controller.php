<?php
class UploadController extends AppController {
    public $uses = array(
        'Album', 'Photo', 
        'Project', 'Logo',
        'HelpAttachment',
    );
    
    protected function _adminBeforeFilter() {
        return;
    }
    
    protected function _frontendBeforeFilter($lang) {
        $this->lang = $lang;
        $this->set('lang', $lang);
        return;
    }
    
    protected $_logoAttachment;
    
    protected function _setAlbumAttachmentComponent() {
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
    
    protected function _setProjectAttachmentComponent() {
        App::import('Component', 'Attachment');
        $this->_logoAttachment = new AttachmentComponent();
        $this->_logoAttachment->initialize($this, array(
        	'rm_tmp_file' => true,
            'origin' => false,
            'images_size' => array(
                'logo' => array(150, 75, 'resize'),
            ),
        ));
    }
    
    protected function _setHelpAttachmentComponent() {
        App::import('Component', 'Attachment');
        $this->_logoAttachment = new AttachmentComponent();
        $this->_logoAttachment->initialize($this, array(
        	'rm_tmp_file' => true,
            'origin' => true,
            'images_size' => array(
                'help' => array(1600, 1200, 'resize'),
            ),
        ));
    }
    
    public function admin_albumupload($id) {
        $this->autoRender = false;
        $this->_setAlbumAttachmentComponent();
        $data = $this->params['form'];
        $this->_logoAttachment->upload($data, 'Filedata');
        $save = array(
            'banner_file_path' => $data['Filedata_file_path'],
            'album_id' => $id,
        );
        $this->Photo->save($save);
        $data['id'] = $this->Photo->id;
        $data['set_url'] = Router::url(array('controller'=>'album', 'action'=>'setcover', $id, $data['id']));
        $data['edit_url'] = Router::url(array('controller'=>'album', 'action'=>'photo', $data['id']));
        $data['delete_url'] = Router::url(array('controller'=>'album', 'action'=>'deletephoto', $data['id']));
        echo json_encode(array('msg'=>$data));
    }
    
    public function admin_projectupload($id) {
        $this->autoRender = false;
        $this->_setProjectAttachmentComponent();
        $data = $this->params['form'];
        $this->_logoAttachment->upload($data, 'Filedata');
        $save = array(
            'banner_file_path' => $data['Filedata_file_path'],
            'project_id' => $id,
        );
        $this->Logo->save($save);
        $data['id'] = $this->Logo->id;
        $data['delete_url'] = Router::url(array('action'=>'deletelogo', $data['id']));
        echo json_encode(array('msg'=>$data));
    }
    
    public function cn_helpupload() {
        $this->helpupload('cn');
    }
    
    public function en_helpupload() {
        $this->helpupload('en');
    }
    
    public function helpupload($lang) {
        $this->autoLayout = false;
        $this->_setHelpAttachmentComponent();
        $data = $this->params['form'];
        $this->_logoAttachment->upload($data, 'Filedata');
        $save = array(
        	'banner_file_name' => $data['Filedata_file_name'],
        	'banner_file_path' => $data['Filedata_file_path'],
            'type' => $data['type'],
        );
        $this->HelpAttachment->save($save);
        $save['id'] = $this->HelpAttachment->id; 
        $this->set('data', $save);
    }
}