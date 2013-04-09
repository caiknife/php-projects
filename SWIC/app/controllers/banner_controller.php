<?php
class BannerController extends AppController {
    public $uses = array(
        'Banner',
    );
    
    protected $_logoAttachment;
    
    // frontend goes here
    
    // cn frontend goes here
    
    // backend goes here
    public function admin_index() {
        $banners = $this->Banner->order('sort ASC')->select();
        $this->set('banners', $banners);
    }
    
    public function admin_add() {
        $data = $this->params['form'];
        $this->_setAttachmentComponent();
        $this->_logoAttachment->upload($data, 'banner_pic');
        $save = array(
            'title' => $data['banner_title'],
            'url' => $data['banner_url'],
            'banner_file_path' => $data['banner_pic_file_path'],
        );
        $this->Banner->save($save);
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_edit($id) {
        $this->autoRender = false;
        $banner = $this->Banner->where(array('id'=>$id))->first();
        if (!$banner) {
            echo false;
        } else {
            $this->data['EditBanner'.$id] = $banner['Banner'];
            $this->set('id', $id);
            $this->set('banner', $banner);
            $this->autoRender = true;
            $this->autoLayout = false;
        }
    }
    
    public function admin_save($id) {
        $this->autoRender = false;
        $banner = $this->data['EditBanner'.$id];
        $banner['id'] = $id;
        if ($this->Banner->save($banner)) {
            $this->Banner->id = $id;
            $banner = $this->Banner->read();
            $this->set('banner', $banner);
            $this->autoRender = true;
            $this->autoLayout = false;
            $this->render('admin_add');
        } else {
            echo false;
        }
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Banner->id = $id;
        if ($this->Banner->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->Banner->id = $val;
            $this->Banner->saveField('sort', $key);
        }
    }
    
    public function admin_upload() {
        $this->autoRender = false;
        $this->_setAttachmentComponent();
        $data = $this->params['form'];
        $this->_logoAttachment->upload($data, 'banner_'.$data['id']);
        $save = array(
            'id' => $data['id'],
            'banner_file_path' => $data['banner_'.$data['id'].'_file_path'],
        );
        $this->Banner->save($save);
        echo json_encode(array('msg'=>$save));
    }
    
    protected function _setAttachmentComponent() {
        App::import('Component', 'Attachment');
        $this->_logoAttachment = new AttachmentComponent();
        $this->_logoAttachment->initialize($this, array(
        	'rm_tmp_file' => true,
            'origin' => false,
            'images_size' => array(
                'banner' => array(971, 405, 'resizeCrop'),
            ),
        ));
    }
}