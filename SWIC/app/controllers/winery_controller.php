<?php
class WineryController extends AppController {
    public $uses = array(
        'Winery', 'Wine'
    );
    
    // frontend goes here
    
    // backend goes here
    public function admin_index() {
        $wineries = $this->Winery->where(array('deleted'=>0))->order('sort ASC')->select();
        $this->set('wineries', $wineries);
    }
    
    public function admin_add() {
        $this->autoRender = false;
        $winery = $this->data['AddWinery'];
        if ($this->Winery->save($winery)) {
            $winery['id'] = $this->Winery->id;
            $this->set('winery', $winery);
            $this->autoRender = true;
            $this->autoLayout = false;
        } else {
            echo false;
        }
    }
    
    public function admin_edit($id) {
        $this->autoRender = false;
        $winery = $this->Winery->where(array('id'=>$id))->first();
        if (!$winery) {
            echo false;
        } else {
            $this->data['EditWinery'.$id] = $winery['Winery'];
            $this->set('id', $id);
            $this->autoRender = true;
            $this->autoLayout = false;
        }
    }
    
    public function admin_save($id) {
        $this->autoRender = false;
        $winery = $this->data['EditWinery'.$id];
        $winery['id'] = $id;
        if ($this->Winery->save($winery)) {
            $this->set('winery', $winery);
            $this->autoRender = true;
            $this->autoLayout = false;
            $this->render('admin_add');
        } else {
            echo false;
        }
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Winery->id = $id;
        if ($this->Winery->saveField('deleted', true)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_count($id) {
        $this->autoRender = false;
        $count = $this->Wine->where($this->Wine->buildFilter(array('is_display'=>1, 'winery_id'=>$id)))->count();
        echo $count;
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->Winery->id = $val;
            $this->Winery->saveField('sort', $key);
        }
    }
}