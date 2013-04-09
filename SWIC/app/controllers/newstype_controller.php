<?php
class NewstypeController extends AppController {
    public $uses = array(
        'NewsType', 'News'
    );
    
    protected $_logoAttachment;
    
    // frontend goes here
    
    // cn frontend goes here
    
    // backend goes here
    
    public function admin_index() {
        $newsTypes = $this->NewsType->order('sort ASC')->select();
        $this->set('newsTypes', $newsTypes);
    }
    
    public function admin_add() {
        $data = $this->params['form'];
        $this->_setAttachmentComponent();
        $this->_logoAttachment->upload($data, 'newstype_logo');
        $save = array(
            'title' => $data['newstype_title'],
            'media_url' => $data['newstype_logo_file_path'],
        );
        $this->NewsType->save($save);
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_edit($id) {
        $this->autoRender = false;
        $type = $this->NewsType->where(array('id'=>$id))->first();
        if (!$type) {
            echo false;
        } else {
            $this->data['EditNewsType'.$id] = $type['NewsType'];
            $this->set('id', $id);
            $this->set('type', $type);
            $this->autoRender = true;
            $this->autoLayout = false;
        }
    }
    
    public function admin_save($id) {
        $this->autoRender = false;
        $type = $this->data['EditNewsType'.$id];
        $type['id'] = $id;
        if ($this->NewsType->save($type)) {
            $this->NewsType->id = $id;
            $type = $this->NewsType->read();
            $this->set('type', $type['NewsType']);
            $this->autoRender = true;
            $this->autoLayout = false;
            $this->render('admin_add');
        } else {
            echo false;
        }
    }
    
    public function admin_upload() {
        $this->autoRender = false;
        $this->_setAttachmentComponent();
        $data = $this->params['form'];
        $this->_logoAttachment->upload($data, 'newstype_logo_'.$data['id']);
        $save = array(
            'id' => $data['id'],
            'media_url' => $data['newstype_logo_'.$data['id'].'_file_path'],
        );
        $this->NewsType->save($save);
        echo json_encode(array('msg'=>$save));
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->NewsType->id = $id;
        if ($this->NewsType->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_count($id) {
        $this->autoRender = false;
        $count = $this->News->where($this->News->buildFilter(array('is_display'=>1, 'type_id'=>$id)))->count();
        echo $count;
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->NewsType->id = $val;
            $this->NewsType->saveField('sort', $key);
        }
    }
    
    protected function _setAttachmentComponent() {
        App::import('Component', 'Attachment');
        $this->_logoAttachment = new AttachmentComponent();
        $this->_logoAttachment->initialize($this, array(
        	'rm_tmp_file' => true,
            'origin' => false,
            'images_size' => array(
                'newstype_logo' => array(70, 70, 'resizeCrop'),
            ),
        ));
    }
}