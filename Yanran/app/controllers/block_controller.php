<?php
class BlockController extends AppController {
    public $uses = array(
        'Block',
    );
    
    // cn frontend goes here
    
    // backend goes here
    public function admin_index() {
        $type = isset($this->params['named']['type']) ? $this->params['named']['type'] : 'about';
        $this->set('type', $type);
        $this->set('blockTypes', Configure::read('Block.type'));
        
        $blocks = $this->Block->where(array('type'=>$type, 'is_display'=>1))->order('sort ASC, id DESC')->select();
        $this->set('blocks', $blocks);
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->Block->id = $val;
            $this->Block->saveField('sort', $key);
        }
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Block->id = $id;
        if ($this->Block->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_add() {
        $type = isset($this->params['named']['type']) ? $this->params['named']['type'] : 'about';
        $data['type'] = $type;
        $this->Block->save($data);
        $id = $this->Block->id;
        $this->redirect(array('action'=>'edit', 'admin'=>true, $id));
    }
    
    public function admin_edit($id) {
        $block = $this->Block->where(array('id'=>$id))->first();
        if (!$block) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->data = $block;
        $this->set('block', $block);
    }
    
    public function admin_update() {
        $data = $this->data['Block'];
        $data['is_display'] = 1;
        $this->Block->save($data);
        $this->redirect(array('action'=>'index', 'admin'=>true, 'type'=>$data['type']));
    }
}