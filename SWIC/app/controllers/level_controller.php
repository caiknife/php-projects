<?php 
class LevelController extends AppController {
    public $uses = array(
        'StatutoryLevel', 'Wine'
    );
    
    // frontend goes here
    
    // backend goes here
    
    public function admin_index() {
        $levels = $this->StatutoryLevel->where(array('deleted'=>0))->order('sort ASC')->select();
        $this->set('levels', $levels);
    }
    
    public function admin_add() {
        $this->autoRender = false;
        $level = $this->data['AddLevel'];
        if ($this->StatutoryLevel->save($level)) {
            $level['id'] = $this->StatutoryLevel->id;
            $this->set('level', $level);
            $this->autoRender = true;
            $this->autoLayout = false;
        } else {
            echo false;
        }
    }
    
    public function admin_edit($id) {
        $this->autoRender = false;
        $level = $this->StatutoryLevel->where(array('id'=>$id))->first();
        if (!$level) {
            echo false;
        } else {
            $this->data['EditLevel'.$id] = $level['StatutoryLevel'];
            $this->set('id', $id);
            $this->autoRender = true;
            $this->autoLayout = false;
        }
    }
    
    public function admin_save($id) {
        $this->autoRender = false;
        $level = $this->data['EditLevel'.$id];
        $level['id'] = $id;
        if ($this->StatutoryLevel->save($level)) {
            $this->set('level', $level);
            $this->autoRender = true;
            $this->autoLayout = false;
            $this->render('admin_add');
        } else {
            echo false;
        }
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->StatutoryLevel->id = $id;
        if ($this->StatutoryLevel->saveField('deleted', true)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_count($id) {
        $this->autoRender = false;
        $count = $this->Wine->where($this->Wine->buildFilter(array('is_display'=>1, 'statutory_level_id'=>$id)))->count();
        echo $count;
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->StatutoryLevel->id = $val;
            $this->StatutoryLevel->saveField('sort', $key);
        }
    }
}