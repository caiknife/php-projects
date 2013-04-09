<?php
class ActivityController extends AppController {
    public $uses = array(
        'Activity',
        'ActivityReview'
    );
    
    public $paginate = array(
        'Activity' => array(
            'limit' => 15,
            'order' => array('Activity.created'=>'DESC'),
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
                'activity' => array(250, 250, 'resizeCrop'),
            ),
        ));
    }
    
    // frontend goes here
    
    public function cn_index() {
        $this->paginate['Activity'] = array(
            'limit' => 8,
            'order' => array('Activity.activity_date'=>'DESC', 'Activity.created'=>'DESC'),
        );
        $activities = $this->paginate('Activity', array('is_display'=>1));
        $this->set('activities', $activities);
    }
    
    public function cn_detail($id) {
        $activity = $this->Activity->where(array('is_display'=>1, 'id'=>$id))->first();
        if (!$activity) {
            $this->cakeError('error404');
            return;
        }
        $activity['Activity']['traffic'] += 1;
        $this->Activity->save($activity);
        $this->set('activity', $activity);
        
        $hotActivities = $this->Activity->where(array('is_display'))->order('traffic DESC')->limit(8)->select();
        $this->set('hotActivities', $hotActivities);
    }
    
    // backend goes here
    public function admin_index() {
        if ($this->RequestHandler->isPost()) {
            $query = $this->data['Activity'];
            $url = array('action'=>'index', 'admin'=>true, 'query'=>$this->_encodeUrlParams($query));
            isset($this->data['Page']['page']) && is_numeric($this->data['Page']['page']) ? $url['page'] = $this->data['Page']['page'] : null;
            $this->redirect($url);
        }
        
        $query = isset($this->params['named']['query']) ? $this->_decodeUrlParams($this->params['named']['query']) : array();
        $this->data['Activity'] = $query;
        
        $activities = $this->paginate('Activity', $this->Activity->buildFilter(array_merge(array('is_display'=>1), $query)));
        $this->set('activities', $activities);
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Activity->id = $id;
        if ($this->Activity->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_add() {
        $this->Activity->save(array());
        $id = $this->Activity->id;
        $this->redirect(array('action'=>'edit', 'admin'=>true, $id));
    }
    
    public function admin_edit($id) {
        $activity = $this->Activity->where(array('id'=>$id))->first();
        if (!$activity) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->data = $activity;
        $this->set('activity', $activity);
    }
    
    public function admin_update() {
        $data = $this->data['Activity'];
        $data['is_display'] = 1;
        $this->Activity->save($data);
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_upload() {
        $this->autoRender = false;
        $this->_setAttachmentComponent();
        $data = $this->params['form'];
        $this->_logoAttachment->upload($data, 'activity_pic');
        $this->Activity->save($data);
        echo json_encode(array('msg'=>$data));
    }
    
    public function admin_review() {
        $reviews = $this->ActivityReview->getAllReviews();
        $this->set('reviews', $reviews);
    }
    
    public function admin_deletereview($id) {
        $this->autoRender = false;
        $this->ActivityReview->id = $id;
        if ($this->ActivityReview->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_addreview() {
        $data = $this->data['ActivityReview'];
        $this->ActivityReview->save($data);
        $this->redirect(array('action'=>'review', 'admin'=>true));
    }
    
    public function admin_editreview($id) {
        $this->autoRender = false;
        $review = $this->ActivityReview->where(array('id'=>$id))->first();
        if (!$review) {
            echo false;
        } else {
            $this->data['EditReview'.$id] = $review['ActivityReview'];
            $this->set('id', $id);
            $this->autoRender = true;
            $this->autoLayout = false;
        }
    }
    
    public function admin_savereview($id) {
        $this->autoRender = false;
        $review = $this->data['EditReview'.$id];
        $review['id'] = $id;
        if ($this->ActivityReview->save($review)) {
            $this->ActivityReview->id = $id;
            $banner = $this->ActivityReview->read();
            $this->set('review', $review);
            $this->autoRender = true;
            $this->autoLayout = false;
            $this->render('admin_addreview');
        } else {
            echo false;
        }
    }
}