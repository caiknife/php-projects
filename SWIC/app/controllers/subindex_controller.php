<?php
class SubindexController extends AppController {
    public $uses = array(
        'Subindex', 'Wine'
    );
    
    // frontend goes here
    
    // backend goes here
    
    public function admin_index() {
        $subindexes = $this->Subindex->where(array('deleted'=>0))->order('sort ASC')->select();
        $this->set('subindexes', $subindexes);
        $this->_setWineType();
    }
    
    public function admin_add() {
        $this->autoRender = false;
        $subindex = $this->data['AddSubindex'];
        if ($this->Subindex->save($subindex)) {
            $subindex['id'] = $this->Subindex->id;
            $this->set('subindex', $subindex);
            $this->_setWineType();
            $this->autoRender = true;
            $this->autoLayout = false;
        } else {
            echo false;
        }
    }
    
    public function admin_edit($id) {
        $this->autoRender = false;
        $subindex = $this->Subindex->where(array('id'=>$id))->first();
        if (!$subindex) {
            echo false;
        } else {
            $this->data['EditSubindex'.$id] = $subindex['Subindex'];
            $this->set('id', $id);
            $this->_setWineType();
            $this->autoRender = true;
            $this->autoLayout = false;
        }
    }
    
    public function admin_save($id) {
        $this->autoRender = false;
        $subindex = $this->data['EditSubindex'.$id];
        $subindex['id'] = $id;
        if ($this->Subindex->save($subindex)) {
            $this->set('subindex', $subindex);
            $this->autoRender = true;
            $this->autoLayout = false;
            $this->render('admin_add');
        } else {
            echo false;
        }
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Subindex->id = $id;
        if ($this->Subindex->saveField('deleted', true)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_count($id) {
        $this->autoRender = false;
        $count = $this->Wine->where($this->Wine->buildFilter(array('is_display'=>1, 'index_sub_id'=>$id)))->count();
        echo $count;
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->Subindex->id = $val;
            $this->Subindex->saveField('sort', $key);
        }
    }
    
    protected function _setWineType() {
        $this->setWineTypes();
    }
}