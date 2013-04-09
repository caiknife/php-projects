<?php
class ArticleController extends AppController {
    public $uses = array(
        'Article'
    );
    
    // frontend goes here
    public function cn_view($type='') {
        $article = $this->Article->where(array('type'=>$type))->first();
    }
    
    // backend goes here
    
    public function admin_index($type='') {
        $article = $this->Article->where(array('type'=>$type))->first();
        if (!$article) {
            $this->Article->save(array('type'=>$type));
            $article = $this->Article->read();            
        }
        $this->data = $article;
    }
    
    public function admin_update() {
        $article = $this->data;
        $this->Article->save($article);
        $this->Session->setFlash('更新成功！');
        $this->redirect(array('action'=>'index', 'admin'=>'true', $article['Article']['type']));
    }
    
    public function admin_lists() {
        $articles = $this->Article->where(array('is_menu'=>1, 'is_display'=>1))->select();
        $this->set('articles', $articles);
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->Article->id = $val;
            $this->Article->saveField('sort', $key);
        }
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Article->id = $id;
        if ($this->Article->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_add() {
        $this->Article->save(array('is_display'=>0));
        $id = $this->Article->id;
        $this->redirect(array('action'=>'edit', 'admin'=>true, $id));
    }
    
    public function admin_edit($id) {
        $article = $this->Article->where(array('id'=>$id))->first();
        if (!$article) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->data = $article;
        $this->set('article', $article);    
    }
    
    public function admin_save() {
        $article = $this->data;
        $article['Article']['is_display'] = 1;
        $this->Article->save($article);
        $this->redirect(array('action'=>'lists', 'admin'=>'true'));
    }
}