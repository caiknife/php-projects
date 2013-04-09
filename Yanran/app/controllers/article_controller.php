<?php
class ArticleController extends AppController {
    public $uses = array(
        'Article', 'Board'
    );
    
    // frontend goes here
    public function cn_view($type) {
        $this->view('cn', $type);
    }
    
    public function en_view($type) {
        $this->view('en', $type);
    }
    
    public function view($lang, $type) {
        $articleTypes = Configure::read('Article.type');
        if (!array_key_exists($type, $articleTypes)) {
            $this->cakeError('error404');
            return;
        }
        $this->set('articleTypes', $articleTypes);
        $this->set('type', $type);
        
        // board
        $board = $this->Board->where(array('type'=>$type))->first();
        $this->set('board', $board);
        
        $article = $this->Article->where(array('type'=>$type))->first();
        $this->set('article', $article);
    }
    
    // backend goes here
    public function admin_index() {
        
    }
    
    public function admin_edit($type) {
        $articleTypes = Configure::read('Article.type');
        if (!array_key_exists($type, $articleTypes)) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->set('articleTypes', $articleTypes);
        
        $article = $this->Article->where(array('type'=>$type))->first();
        if (!$article) {
            $data = array(
                'type' => $type,
                'title' => $articleTypes[$type],
            );
            $this->Article->save($data);
            $article = $this->Article->read();
        }
        $this->data = $article;
        $this->Set('article', $article);
    }
    
    public function admin_update() {
        $data = $this->data['Article'];
        $this->Article->save($data);
        $this->Session->setFlash('保存成功！');
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
}