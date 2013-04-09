<?php
class LinkController extends AppController {
    public $uses = array(
        'Link'
    );
    
    // frontend goes here
    public function cn_index() {
        $block = $this->Link->where(array('is_display'=>1))->order('sort ASC, id DESC')->first();
        $this->redirect(array('action'=>'view', 'cn'=>true, $block['Link']['id']));
    }
    
    public function cn_view($id) {
        $block = $this->Link->where(array('is_display'=>1, 'id'=>$id))->first();
        if (!$block) {
            $this->cakeError('error404');
            return;
        }
        $this->set('block', $block);
        if ($block['Link']['type']=='sitemap') {
            $this->cn_sitemap();
            $this->render('cn_sitemap');
        }
    }
    
    public function cn_sitemap() {
        
    }
    
    // backend goes here
    
    public function admin_index() {
        $links = $this->Link->where(array('is_display'=>1))->order('sort ASC, id DESC')->select();
        $this->set('links', $links);
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->Link->id = $val;
            $this->Link->saveField('sort', $key);
        }
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Link->id = $id;
        if ($this->Link->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_add() {
        $this->Link->save(array());
        $id = $this->Link->id;
        $this->redirect(array('action'=>'edit', 'admin'=>true, $id));
    }
    
    public function admin_edit($id) {
        $link = $this->Link->where(array('id'=>$id))->first();
        if (!$link) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->data = $link;
        $this->set('link', $link);    
    }
    
    public function admin_update() {
        $link = $this->data;
        $link['Link']['is_display'] = 1;
        $this->Link->save($link);
        $this->redirect(array('action'=>'index', 'admin'=>'true'));
    }
}