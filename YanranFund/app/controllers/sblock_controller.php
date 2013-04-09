<?php
class SblockController extends AppController {
    public $uses = array(
        'Sblock',
    );
    
    // backend goes here
    public function admin_index() {
        $sblocks = $this->Sblock->where(array('is_display'=>1))->order('sort ASC, id DESC')->select();
        $this->set('sblocks', $sblocks);
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->Sblock->id = $val;
            $this->Sblock->saveField('sort', $key);
        }
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Sblock->id = $id;
        if ($this->Sblock->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_add() {
        $data = array();
        $this->Sblock->save($data);
        $id = $this->Sblock->id;
        $this->redirect(array('action'=>'edit', 'admin'=>true, $id));
    }
    
    public function admin_edit($id) {
        $sblock = $this->Sblock->where(array('id'=>$id))->first();
        if (!$sblock) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->data = $sblock;
        $this->set('sblock', $sblock);
    }
    
    public function admin_update() {
        $data = $this->data['Sblock'];
        $data['is_display'] = 1;
        $this->Sblock->save($data);
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_hide($id) {
        $this->autoRender = false;
        $this->Sblock->id = $id;
        $this->Sblock->saveField('is_show', 0);
    }
    
    public function admin_show($id) {
        $this->autoRender = false;
        $this->Sblock->id = $id;
        $this->Sblock->saveField('is_show', 1);
    }
}