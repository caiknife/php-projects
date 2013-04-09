<?php
class VblockController extends AppController {
    public $uses = array(
        'Vblock',
    );
    
    // backend goes here
    public function admin_index() {
        $vblocks = $this->Vblock->where(array('is_display'=>1))->order('sort ASC, id DESC')->select();
        $this->set('vblocks', $vblocks);
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->Vblock->id = $val;
            $this->Vblock->saveField('sort', $key);
        }
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Vblock->id = $id;
        if ($this->Vblock->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_add() {
        $data = array();
        $this->Vblock->save($data);
        $id = $this->Vblock->id;
        $this->redirect(array('action'=>'edit', 'admin'=>true, $id));
    }
    
    public function admin_edit($id) {
        $vblock = $this->Vblock->where(array('id'=>$id))->first();
        if (!$vblock) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->data = $vblock;
        $this->set('vblock', $vblock);
    }
    
    public function admin_update() {
        $data = $this->data['Vblock'];
        $data['is_display'] = 1;
        $this->Vblock->save($data);
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_hide($id) {
        $this->autoRender = false;
        $this->Vblock->id = $id;
        $this->Vblock->saveField('is_show', 0);
    }
    
    public function admin_show($id) {
        $this->autoRender = false;
        $this->Vblock->id = $id;
        $this->Vblock->saveField('is_show', 1);
    }
}