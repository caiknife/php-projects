<?php
class SearchController extends AppController {
    public $uses = array(
        'Brand', 'Event'
    );
    
    public $paginate = array(
        'Brand' => array(
			'limit'=>6, 'order'=>array('created'=>'DESC')
        ),
        'Event' => array(
            'limit'=>9, 'order'=>array('created'=>'DESC')
        ),
    );
    
    public function index() {
        
    }
    
    public function quicksearch() {
        $this->autoLayout = false;
        $keyword = $this->data['Search']['keyword'];
        $this->Brand->recursive = -1;
        $brands = $this->Brand->searchByKeyword($keyword);
        $this->set('brands', $brands);
    }
    
    public function searchbrands() {
        if ($this->RequestHandler->isPost()) {
            $this->redirect(array('query'=>$this->_encodeUrlParams($this->data['Brand'])));
        }
        $query = $this->_decodeUrlParams($this->params['named']['query']);
        $this->data['Brand'] = $query;
        $this->set('keyword', $this->_buildKeyword('brand', $query));
        $this->Brand->recursive = -1;
        $brands = $this->paginate('Brand', $this->Brand->buildFilter($query));
        $this->set('brands', $brands);
        $this->_getSubscribedBrands();
    }
    
    public function searchevents() {
        if ($this->RequestHandler->isPost()) {
            $this->redirect(array('query'=>$this->_encodeUrlParams($this->data['Event'])));
        }
        $query = $this->_decodeUrlParams($this->params['named']['query']);
        $this->data['Event'] = $query;
        $this->set('keyword', $this->_buildKeyword('event', $query));
        $this->Event->recursive = -1;
        $events = $this->paginate('Event', $this->Event->buildFilter($query));
        $this->set('events', $events);
    }
    
    protected function _buildKeyword($type, $query) {
        $result = array();
        switch ($type) {
            case 'brand':
                $result[] = '品牌';
                if (isset($query['floor']) && $query['floor']) {
                    $floors = Configure::read('Brand.floor');
                    $result[] = '楼层：'.$floors[$query['floor']];
                }
                if (isset($query['cate']) && $query['cate']) {
                    $cates = Configure::read('Brand.cate');
                    $result[] = '类型：'.$cates[$query['cate']];
                }
                if (isset($query['title']) && $query['title']) {
                    $result[] = $query['title'];
                }
                break;
            case 'event':
                $result[] = '活动';
                if (isset($query['cat']) && $query['cat']) {
                    $cates = Configure::read('Event.cate');
                    $result[] = '类型：'.$cates[$query['cat']];
                }
                if (isset($query['title']) && $query['title']) {
                    $result[] = $query['title'];
                }
                break;
        }
        return implode(' - ', $result);
    }
}