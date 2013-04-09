<?php
class OverviewController extends AppController {
    public $uses = array(
        'Block', 'Plan'
    );
    
    // frontend goes here
    public function cn_index() {
        $block = $this->Block->where(array('is_display'=>1))->order('sort ASC, id DESC')->first();
        $this->redirect(array('action'=>'view', 'cn'=>true, $block['Block']['id']));
    }
    
    public function cn_view($id) {
        $block = $this->Block->where(array('is_display'=>1, 'id'=>$id))->first();
        if (!$block) {
            $this->cakeError('error404');
            return;
        }
        $this->set('block', $block);
        if ($block['Block']['title'] == '展位平面图') {
            $plans = $this->Plan->order('sort ASC, id DESC')->select();
            $this->set('plans', $plans);
            $this->render('cn_plan');
        }
    }
    
    // backend goes here
    public function admin_index() {
        $blocks = $this->Block->where(array('is_display'=>1))->order('sort ASC, id DESC')->select();
        $this->set('blocks', $blocks);
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
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->Block->id = $val;
            $this->Block->saveField('sort', $key);
        }
    }
    
    public function admin_add() {
        $this->Block->save(array('is_display'=>0));
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
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
}