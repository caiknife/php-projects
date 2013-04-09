<?php
class AblockController extends AppController {
    public $uses = array(
        'Ablock',
    );
    
    // backend goes here
    public function admin_index() {
        $ablocks = $this->Ablock->where(array('is_display'=>1))->order('sort ASC, id DESC')->select();
        $this->set('ablocks', $ablocks);
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->Ablock->id = $val;
            $this->Ablock->saveField('sort', $key);
        }
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Ablock->id = $id;
        if ($this->Ablock->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_add() {
        $data = array();
        $this->Ablock->save($data);
        $id = $this->Ablock->id;
        $this->redirect(array('action'=>'edit', 'admin'=>true, $id));
    }
    
    public function admin_edit($id) {
        $ablock = $this->Ablock->where(array('id'=>$id))->first();
        if (!$ablock) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->data = $ablock;
        $this->set('ablock', $ablock);
    }
    
    public function admin_update() {
        $data = $this->data['Ablock'];
        $data['is_display'] = 1;
        $this->Ablock->save($data);
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_hide($id) {
        $this->autoRender = false;
        $this->Ablock->id = $id;
        $this->Ablock->saveField('is_show', 0);
    }
    
    public function admin_show($id) {
        $this->autoRender = false;
        $this->Ablock->id = $id;
        $this->Ablock->saveField('is_show', 1);
    }
}