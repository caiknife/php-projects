<?php
class NewsController extends AppController {
    public $uses = array(
        'News', 'NewsType', 'Board'
    );
    
    public $paginate = array(
        'News' => array(
            'limit' => 15,
            'order' => array('News.news_date'=>'DESC', 'News.created'=>'DESC'),
        ),
    );
    
    // cn frontend goes here
// cn frontend goes here
    public function cn_index() {
        $this->index('cn');
    }
    
    public function en_index() {
        $this->index('en');
    }
    
    public function index($lang) {
        // board
        $board = $this->Board->where(array('type'=>'news'))->first();
        $this->set('board', $board);
        
        if (isset($this->params['named']['type'])) {
            $type = $this->params['named']['type'];
        } else {
            $types = $this->_newsTypes;
            $type = array_shift(array_keys($types));
        }
        $this->set('type', $type);
        
        $newses = $this->paginate('News', $this->News->buildFilter(array('is_display'=>1, 'lang'=>$lang, 'type_id'=>$type)));
        $this->set('newses', $newses);
    }
    
    public function cn_view($id) {
        $this->view('cn', $id);
    }
    
    public function en_view($id) {
        $this->view('en', $id);
    }
    
    public function view($lang, $id) {
        $news = $this->News->where(array('lang'=>$lang, 'id'=>$id))->first();
        if (!$news) {
            $this->cakeError('error404');
            return;
        }
        $this->set('news', $news);
        
        // board
        $board = $this->Board->where(array('type'=>'news'))->first();
        $this->set('board', $board);
        
    }
    
    // backend goes here
    public function admin_index() {
        // post
        if ($this->RequestHandler->isPost()) {
            $query = $this->data['News'];
            unset($query['type']);
            $url = array('action'=>'index', 'admin'=>true, 'type'=>$this->data['News']['type'], 'query'=>$this->_encodeUrlParams($query));
            isset($this->data['Page']['page']) && is_numeric($this->data['Page']['page']) ? $url['page'] = $this->data['Page']['page'] : null;
            $this->redirect($url);
        }
        
        // news type
        $newsTypes = $this->NewsType->getList('cn');
        if (isset($this->params['named']['type'])) {
            $type = $this->params['named']['type'];
        } else {
            $type = array_shift(array_keys($newsTypes));
        }
        $this->set('type', $type);
        $this->set('newsTypes', $newsTypes);
        
        $query = isset($this->params['named']['query']) ? $this->_decodeUrlParams($this->params['named']['query']) : array();
        $this->data['News'] = $query;
                
        $newses = $this->paginate('News', $this->News->buildFilter(array_merge(array('is_display'=>1, 'type_id'=>$type), $query)));
        $this->set('newses', $newses);
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->News->id = $id;
        if ($this->News->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_add() {
        $data = array();
        if (isset($this->params['named']['type'])) {
            $data['type_id'] = $this->params['named']['type'];
        }
        $this->News->save($data);
        $id = $this->News->id;
        $this->redirect(array('action'=>'edit', 'admin'=>true, $id));
    }
    
    public function admin_edit($id) {
        $news = $this->News->where(array('id'=>$id))->first();
        if (!$news) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->data = $news;
        $this->set('news', $news);
        $this->set('newsTypes', $this->NewsType->getList('cn'));
    }
    
    public function admin_update() {
        $data = $this->data['News'];
        $data['is_display'] = 1;
        $this->News->save($data);
        $this->redirect(array('action'=>'index', 'admin'=>true, 'type'=>$data['type_id']));
    }

}