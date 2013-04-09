<?php
class NewstypeController extends AppController {
    public $uses = array(
        'NewsType', 'News'
    );
    
    // backend goes here
    public function admin_index() {
        $types = $this->NewsType->order('sort ASC, id DESC')->select();
        $this->set('types', $types);
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->NewsType->id = $val;
            $this->NewsType->saveField('sort', $key);
        }
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
        $count = $this->News->where(array('type_id'=>$id, 'is_display'=>1))->count();
        echo $count;
    }
    
    public function admin_add() {
        $data = $this->data;
        $this->NewsType->save($data);
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
            $this->set('type', array('NewsType'=>$type));
            $this->autoRender = true;
            $this->autoLayout = false;
            $this->render('admin_add');
        } else {
            echo false;
        }
    }
}