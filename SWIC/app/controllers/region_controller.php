<?php
class RegionController extends AppController {
    public $uses = array(
        'Region', 'Wine'
    );
    
    // frontend goes here
    
    // backend goes here
    
    public function admin_index() {
        $regions = $this->Region->where(array('deleted'=>0))->order('sort ASC')->select();
        $this->set('regions', $regions);
    }
    
    public function admin_add() {
        $this->autoRender = false;
        $region = $this->data['AddRegion'];
        if ($this->Region->save($region)) {
            $region['id'] = $this->Region->id;
            $this->set('region', $region);
            $this->autoRender = true;
            $this->autoLayout = false;
        } else {
            echo false;
        }
    }
    
    public function admin_edit($id) {
        $this->autoRender = false;
        $region = $this->Region->where(array('id'=>$id))->first();
        if (!$region) {
            echo false;
        } else {
            $this->data['EditRegion'.$id] = $region['Region'];
            $this->set('id', $id);
            $this->autoRender = true;
            $this->autoLayout = false;
        }
    }
    
    public function admin_save($id) {
        $this->autoRender = false;
        $region = $this->data['EditRegion'.$id];
        $region['id'] = $id;
        if ($this->Region->save($region)) {
            $this->set('region', $region);
            $this->autoRender = true;
            $this->autoLayout = false;
            $this->render('admin_add');
        } else {
            echo false;
        }
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Region->id = $id;
        if ($this->Region->saveField('deleted', true)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_count($id) {
        $this->autoRender = false;
        $count = $this->Wine->where($this->Wine->buildFilter(array('is_display'=>1, 'regions_id'=>$id)))->count();
        echo $count;
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->Region->id = $val;
            $this->Region->saveField('sort', $key);
        }
    }
}