<?php
class EquiptypeController extends AppController {
    public $uses = array(
        'EquipType', 'Equip'
    );
    
    // backend goes here
    public function admin_index() {
        $types = $this->EquipType->order('sort ASC, id DESC')->select();
        $this->set('types', $types);
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->EquipType->id = $val;
            $this->EquipType->saveField('sort', $key);
        }
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->EquipType->id = $id;
        if ($this->EquipType->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_count($id) {
        $this->autoRender = false;
        $count = $this->Equip->where(array('type_id'=>$id, 'is_display'=>1))->count();
        echo $count;
    }
    
    public function admin_add() {
        $data = $this->data;
        $this->EquipType->save($data);
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_edit($id) {
        $this->autoRender = false;
        $type = $this->EquipType->where(array('id'=>$id))->first();
        if (!$type) {
            echo false;
        } else {
            $this->data['EditEquipType'.$id] = $type['EquipType'];
            $this->set('id', $id);
            $this->set('type', $type);
            $this->autoRender = true;
            $this->autoLayout = false;
        }
    }
    
    public function admin_save($id) {
        $this->autoRender = false;
        $type = $this->data['EditEquipType'.$id];
        $type['id'] = $id;
        if ($this->EquipType->save($type)) {
            $this->set('type', array('EquipType'=>$type));
            $this->autoRender = true;
            $this->autoLayout = false;
            $this->render('admin_add');
        } else {
            echo false;
        }
    }
}