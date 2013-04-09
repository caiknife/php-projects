<?php
class HblockController extends AppController {
    public $uses = array(
        'Hblock',
    );
    
    // backend goes here
    public function admin_index() {
        $hblocks = $this->Hblock->where(array('is_display'=>1))->order('sort ASC, id DESC')->select();
        $this->set('hblocks', $hblocks);
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->Hblock->id = $val;
            $this->Hblock->saveField('sort', $key);
        }
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Hblock->id = $id;
        if ($this->Hblock->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_add() {
        $data = array();
        $this->Hblock->save($data);
        $id = $this->Hblock->id;
        $this->redirect(array('action'=>'edit', 'admin'=>true, $id));
    }
    
    public function admin_edit($id) {
        $hblock = $this->Hblock->where(array('id'=>$id))->first();
        if (!$hblock) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->data = $hblock;
        $this->set('hblock', $hblock);
    }
    
    public function admin_update() {
        $data = $this->data['Hblock'];
        $data['is_display'] = 1;
        $this->Hblock->save($data);
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_hide($id) {
        $this->autoRender = false;
        $this->Hblock->id = $id;
        $this->Hblock->saveField('is_show', 0);
    }
    
    public function admin_show($id) {
        $this->autoRender = false;
        $this->Hblock->id = $id;
        $this->Hblock->saveField('is_show', 1);
    }
}