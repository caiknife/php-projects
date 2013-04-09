<?php
class GrapeController extends AppController {
    public $uses = array(
        'GrapeVariety', 'Wine', 'WineGrapeVariety'
    );
    
    // frontend goes here
    
    // backend goes here
    
    public function admin_index() {
        $grapes = $this->GrapeVariety->where(array('deleted'=>0))->order('sort ASC')->select();
        $this->set('grapes', $grapes);
    }
    
    public function admin_add() {
        $this->autoRender = false;
        $grape = $this->data['AddGrape'];
        if ($this->GrapeVariety->save($grape)) {
            $grape['id'] = $this->GrapeVariety->id;
            $this->set('grape', $grape);
            $this->autoRender = true;
            $this->autoLayout = false;
        } else {
            echo false;
        }
    }
    
    public function admin_edit($id) {
        $this->autoRender = false;
        $grape = $this->GrapeVariety->where(array('id'=>$id))->first();
        if (!$grape) {
            echo false;
        } else {
            $this->data['EditGrape'.$id] = $grape['GrapeVariety'];
            $this->set('id', $id);
            $this->autoRender = true;
            $this->autoLayout = false;
        }
    }
    
    public function admin_save($id) {
        $this->autoRender = false;
        $grape = $this->data['EditGrape'.$id];
        $grape['id'] = $id;
        if ($this->GrapeVariety->save($grape)) {
            $this->set('grape', $grape);
            $this->autoRender = true;
            $this->autoLayout = false;
            $this->render('admin_add');
        } else {
            echo false;
        }
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->GrapeVariety->id = $id;
        if ($this->GrapeVariety->saveField('deleted', true)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_count($id) {
        $this->autoRender = false;
        $count = $this->WineGrapeVariety->where(array('grape_varieties_id'=>$id))->count();
        echo $count;
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->GrapeVariety->id = $val;
            $this->GrapeVariety->saveField('sort', $key);
        }
    }
}