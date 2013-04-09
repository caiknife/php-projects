<?php
class PblockController extends AppController {
    public $uses = array(
        'Pblock',
    );
    
    // backend goes here
    public function admin_index() {
        $pblocks = $this->Pblock->where(array('is_display'=>1))->order('sort ASC, id DESC')->select();
        $this->set('pblocks', $pblocks);
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->Pblock->id = $val;
            $this->Pblock->saveField('sort', $key);
        }
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Pblock->id = $id;
        if ($this->Pblock->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_add() {
        $data = array();
        $this->Pblock->save($data);
        $id = $this->Pblock->id;
        $this->redirect(array('action'=>'edit', 'admin'=>true, $id));
    }
    
    public function admin_edit($id) {
        $pblock = $this->Pblock->where(array('id'=>$id))->first();
        if (!$pblock) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->data = $pblock;
        $this->set('pblock', $pblock);
    }
    
    public function admin_update() {
        $data = $this->data['Pblock'];
        $data['is_display'] = 1;
        $this->Pblock->save($data);
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_hide($id) {
        $this->autoRender = false;
        $this->Pblock->id = $id;
        $this->Pblock->saveField('is_show', 0);
    }
    
    public function admin_show($id) {
        $this->autoRender = false;
        $this->Pblock->id = $id;
        $this->Pblock->saveField('is_show', 1);
    }
}