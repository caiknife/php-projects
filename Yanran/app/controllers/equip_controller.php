<?php
class EquipController extends AppController {
    public $uses = array(
        'Equip', 'EquipType', 'Board'
    );
    
    protected $_logoAttachment;
    
    protected function _setAttachmentComponent() {
        App::import('Component', 'Attachment');
        $this->_logoAttachment = new AttachmentComponent();
        $this->_logoAttachment->initialize($this, array(
        	'rm_tmp_file' => true,
            'origin' => false,
            'images_size' => array(
                'equip' => array(800, 600, 'resize'),
            	'equip_logo' => array(200, 200, 'resizeCrop'),
            ),
        ));
    }

    // cn frontend goes here
    public function cn_index() {
        $this->index('cn');    
    }
    
    public function en_index() {
        $this->index('en');    
    }
    
    public function index($lang) {
        // board
        $board = $this->Board->where(array('type'=>'equip'))->first();
        $this->set('board', $board);
        
        if (isset($this->params['named']['type'])) {
            $type = $this->params['named']['type'];
        } else {
            $types = $this->_equipTypes;
            $type = array_shift(array_keys($types));
        }
        
        $equips = $this->Equip->where(array('type_id'=>$type))->order('sort ASC, id DESC')->select();
        $this->set('equips', $equips);
        $this->set('type', $type);
    }
    
    // backend goes here
    public function admin_index() {
        $equipTypes = $this->EquipType->getList('cn');
        $this->set('equipTypes', $equipTypes);
        $data = array();
        foreach ($equipTypes as $key=>$type) {
            $data[$key] = $this->Equip->where(array('type_id'=>$key))->order('sort ASC, id DESC')->select();
        }
        $this->set('data', $data);
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->Equip->id = $val;
            $this->Equip->saveField('sort', $key);
        }
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Equip->id = $id;
        if ($this->Equip->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_add() {
        $type = $this->params['named']['type'];
        $data = $this->data['Equip'];
        $this->_setAttachmentComponent();
        $this->_logoAttachment->upload($data, 'banner');
        $save = array(
            'desc_cn' => $data['desc_cn'],
        	'desc_en' => $data['desc_en'],
            'type_id' => $type,
            'banner_file_path' => $data['banner_file_path'],
        );
        $this->Equip->save($save);
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_edit($id) {
        $this->autoRender = false;
        $equip = $this->Equip->where(array('id'=>$id))->first();
        if (!$equip) {
            echo false;
        } else {
            $this->data['EditEquip'.$id] = $equip['Equip'];
            $this->set('id', $id);
            $this->set('equip', $equip);
            $this->autoRender = true;
            $this->autoLayout = false;
        }
    }
    
    public function admin_save($id) {
        $this->autoRender = false;
        $equip = $this->data['EditEquip'.$id];
        $equip['id'] = $id;
        if ($this->Equip->save($equip)) {
            $this->Equip->id = $id;
            $equip = $this->Equip->read();
            $this->set('equip', $equip);
            $this->admin_upload($id);
            $this->redirect(array('action'=>'index', 'admin'=>true));
        } else {
            echo false;
        }
    }
    
    public function admin_upload($id) {
        $data = $this->params['form'];
        if (!$data['banner_'.$id]['error']) {
            $this->_setAttachmentComponent();
            $this->_logoAttachment->upload($data, 'banner_'.$id);
            $save = array(
                'id' => $id,
                'banner_file_path' => $data['banner_'.$id.'_file_path'],
            );
            $this->Equip->save($save);
        }
    }
}