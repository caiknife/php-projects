<?php
class WinetypeController extends AppController {
    public $uses = array(
        'WineType', 'Wine'
    );
    
    // frontend goes here
    
    // cn frontend goes here
    
    // backend goes here
    
    public function admin_index() {
        $wineTypes = $this->WineType->order('sort ASC')->select();
        $this->set('wineTypes', $wineTypes);
    }
    
    public function admin_add() {
        $this->autoRender = false;
        $type = $this->data['AddWineType'];
        if ($this->WineType->save($type)) {
            $type['id'] = $this->WineType->id;
            $this->set('type', $type);
            $this->autoRender = true;
            $this->autoLayout = false;
        } else {
            echo false;
        }
    }
    
    public function admin_edit($id) {
        $this->autoRender = false;
        $type = $this->WineType->where(array('id'=>$id))->first();
        if (!$type) {
            echo false;
        } else {
            $this->data['EditWineType'.$id] = $type['WineType'];
            $this->set('id', $id);
            $this->autoRender = true;
            $this->autoLayout = false;
        }
    }
    
    public function admin_save($id) {
        $this->autoRender = false;
        $type = $this->data['EditWineType'.$id];
        $type['id'] = $id;
        if ($this->WineType->save($type)) {
            $this->set('type', $type);
            $this->autoRender = true;
            $this->autoLayout = false;
            $this->render('admin_add');
        } else {
            echo false;
        }
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->WineType->id = $id;        
        if ($this->WineType->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_count($id) {
        $this->autoRender = false;
        $count = $this->Wine->where($this->Wine->buildFilter(array('is_display'=>1, 'index_type'=>$id)))->count();
        echo $count;
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->WineType->id = $val;
            $this->WineType->saveField('sort', $key);
        }
    }
    
}