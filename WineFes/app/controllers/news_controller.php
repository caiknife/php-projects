<?php
class NewsController extends AppController {
    public $uses = array(
        'News', 
        'NewsReview',
    );
    
    public $paginate = array(
        'News' => array(
            'limit' => 15,
            'order' => array('News.news_date'=>'DESC', 'News.created'=>'DESC'),
        ),
    );
    
    protected $_logoAttachment;
    
    protected function _setAttachmentComponent() {
        App::import('Component', 'Attachment');
        $this->_logoAttachment = new AttachmentComponent();
        $this->_logoAttachment->initialize($this, array(
        	'rm_tmp_file' => true,
            'origin' => false,
            'images_size' => array(
                'news' => array(145, 90, 'resizeCrop'),
            ),
        ));
    }
    
    protected function _cnFrontendBeforeFilter() {
        parent::_cnFrontendBeforeFilter();
        $this->set('newsType', Configure::read('News.type'));
        $this->paginate['News'] = array(
            'limit' => 15,
            'order' => array('News.news_date'=>'DESC', 'News.created'=>'DESC'),
        );
    }
    
    protected function _groupNewsByMonth($newses) {
        $groupedNews = array();
        foreach ($newses as $news) {
            $key = date('Y年m月', strtotime($news['News']['news_date']));
            $groupedNews[$key][] = $news['News'];
        }
        return $groupedNews;
    }
    
    // frontend goes here
    public function cn_index() {
        $this->redirect(array('action'=>'latest', 'cn'=>true));
    }
    
    public function cn_latest() {
        $newses = $this->paginate('News', array('is_display'=>1));
        $groupedNews = $this->_groupNewsByMonth($newses);
        $this->set('groupedNews', $groupedNews);
        $this->set('type', null);
        $this->render('cn_lists');
    }
    
    public function cn_lists() {
        $type = isset($this->params['named']['type']) ? $this->params['named']['type'] : 1;
        $newses = $this->paginate('News', array('is_display'=>1, 'type_id'=>$type));
        $groupedNews = $this->_groupNewsByMonth($newses);
        $this->set('groupedNews', $groupedNews);
        $this->set('type', $type);
    }
    
    public function cn_detail($id) {
        $news = $this->News->where(array('is_display'=>1, 'id'=>$id))->first();
        if (!$news) {
            $this->cakeError('error404');
            return;
        }
        $news['News']['traffic'] += 1;
        $this->News->save($news);
        $this->set('news', $news);
        
        $hotNewses = $this->News->where(array('is_display'=>1))->order('traffic DESC')->limit(8)->select();
        $this->set('hotNewses', $hotNewses);
    }
    
    // backend goes here
    public function admin_index() {
        if ($this->RequestHandler->isPost()) {
            $query = $this->data['News'];
            unset($query['type']);
            $url = array('action'=>'index', 'admin'=>true, 'type'=>$this->data['News']['type'], 'query'=>$this->_encodeUrlParams($query));
            isset($this->data['Page']['page']) && is_numeric($this->data['Page']['page']) ? $url['page'] = $this->data['Page']['page'] : null;
            $this->redirect($url);
        }
        
        $type = isset($this->params['named']['type']) ? $this->params['named']['type'] : '';
        $this->set('type', $type);
        $this->set('newsType', Configure::read('News.type'));
        
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
        $type = isset($this->params['named']['type']) ? $this->params['named']['type'] : 1;
        $data['type_id'] = $type;
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
    }
    
    public function admin_update() {
        $data = $this->data['News'];
        $data['is_display'] = 1;
        $this->News->save($data);
        $this->redirect(array('action'=>'index', 'admin'=>true, 'type'=>$data['type_id']));
    }
    
    public function admin_upload() {
        $this->autoRender = false;
        $this->_setAttachmentComponent();
        $data = $this->params['form'];
        $this->_logoAttachment->upload($data, 'news_pic');
        $this->News->save($data);
        echo json_encode(array('msg'=>$data));
    }
    
    public function admin_review() {
        $reviews = $this->NewsReview->getAllReviews();
        $this->set('reviews', $reviews);
    }
    
    public function admin_deletereview($id) {
        $this->autoRender = false;
        $this->NewsReview->id = $id;
        if ($this->NewsReview->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_addreview() {
        $data = $this->data['NewsReview'];
        $this->NewsReview->save($data);
        $this->redirect(array('action'=>'review', 'admin'=>true));
    }
    
    public function admin_editreview($id) {
        $this->autoRender = false;
        $review = $this->NewsReview->where(array('id'=>$id))->first();
        if (!$review) {
            echo false;
        } else {
            $this->data['EditReview'.$id] = $review['NewsReview'];
            $this->set('id', $id);
            $this->autoRender = true;
            $this->autoLayout = false;
        }
    }
    
    public function admin_savereview($id) {
        $this->autoRender = false;
        $review = $this->data['EditReview'.$id];
        $review['id'] = $id;
        if ($this->NewsReview->save($review)) {
            $this->NewsReview->id = $id;
            $banner = $this->NewsReview->read();
            $this->set('review', $review);
            $this->autoRender = true;
            $this->autoLayout = false;
            $this->render('admin_addreview');
        } else {
            echo false;
        }
    }
}