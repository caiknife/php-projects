<?php
class InfoController extends AppController {
    public $uses = array(
        'Info', 'Board'
    );
    
    public $paginate = array(
        'Info' => array(
            'limit' => 15,
            'order' => array('Info.news_date'=>'DESC', 'Info.created'=>'DESC'),
        ),
    );
    
    // cn frontend goes here
    public function cn_index() {
        $this->index('cn');
    }
    
    public function en_index() {
        $this->index('en');
    }
    
    public function index($lang) {
        // board
        $board = $this->Board->where(array('type'=>'info'))->first();
        $this->set('board', $board);
        
        $infos = $this->paginate('Info', $this->Info->buildFilter(array('is_display'=>1, 'lang'=>$lang)));
        $this->set('infos', $infos);
    }
    
    public function cn_view($id) {
        $this->view('cn', $id);
    }
    
    public function en_view($id) {
        $this->view('en', $id);
    }
    
    public function view($lang, $id) {
        $info = $this->Info->where(array('lang'=>$lang, 'id'=>$id))->first();
        if (!$info) {
            $this->cakeError('error404');
            return;
        }
        $this->set('info', $info);
        
        // board
        $board = $this->Board->where(array('type'=>'info'))->first();
        $this->set('board', $board);
        
    }
    
    // backend goes here
    public function admin_index() {
        // post
        if ($this->RequestHandler->isPost()) {
            $query = $this->data['Info'];
            $url = array('action'=>'index', 'admin'=>true, 'query'=>$this->_encodeUrlParams($query));
            isset($this->data['Page']['page']) && is_numeric($this->data['Page']['page']) ? $url['page'] = $this->data['Page']['page'] : null;
            $this->redirect($url);
        }
        
        $query = isset($this->params['named']['query']) ? $this->_decodeUrlParams($this->params['named']['query']) : array();
        $this->data['Info'] = $query;
                
        $infos = $this->paginate('Info', $this->Info->buildFilter(array_merge(array('is_display'=>1), $query)));
        $this->set('infos', $infos);
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Info->id = $id;
        if ($this->Info->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_add() {
        $data = array();
        $this->Info->save($data);
        $id = $this->Info->id;
        $this->redirect(array('action'=>'edit', 'admin'=>true, $id));
    }
    
    public function admin_edit($id) {
        $info = $this->Info->where(array('id'=>$id))->first();
        if (!$info) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->data = $info;
        $this->set('info', $info);
    }
    
    public function admin_update() {
        $data = $this->data['Info'];
        $data['is_display'] = 1;
        $this->Info->save($data);
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
}