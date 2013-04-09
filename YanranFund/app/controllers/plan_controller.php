<?php
class PlanController extends AppController {
    public $uses = array(
        'Plan',
    );
    
    public $paginate = array(
        'Plan' => array(
            'limit' => 15,
            'order' => array('Plan.public_date'=>'DESC', 'Plan.created'=>'DESC'),
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
                'plan' => array(260, 180, 'resizeCropForWidth'),
            ),
        ));
    }
    
    public function cn_index() {
        $this->index('cn');
    }
    
    public function en_index() {
        $this->index('en');
    }
    
    public function index($lang) {
        $plans = $this->paginate('Plan', $this->Plan->buildFilter(array('is_display'=>1, 'is_public'=>1, 'lang'=>$lang)));
        $this->set('plans', $plans);
    }
    
    public function cn_view($id) {
        $this->view('cn', $id);
    }
    
    public function en_view($id) {
        $this->view('en', $id);
    }
    
    public function view($lang, $id) {
        $plan = $this->Plan->where(array('id'=>$id, 'lang'=>$lang, 'is_public'=>1))->first();
        if (!$plan) {
            $this->cakeError('error404');
            return;
        }
        $this->set('plan', $plan);
    }
    
    // backend goes here
    public function admin_index() {
        // post
        if ($this->RequestHandler->isPost()) {
            $query = $this->data['Plan'];
            unset($query['type']);
            $url = array('action'=>'index', 'admin'=>true, 'query'=>$this->_encodeUrlParams($query));
            isset($this->data['Page']['page']) && is_numeric($this->data['Page']['page']) ? $url['page'] = $this->data['Page']['page'] : null;
            $this->redirect($url);
        }
                
        $query = isset($this->params['named']['query']) ? $this->_decodeUrlParams($this->params['named']['query']) : array();
        $this->data['Plan'] = $query;
                
        $plans = $this->paginate('Plan', $this->Plan->buildFilter(array_merge(array('is_display'=>1), $query)));
        $this->set('plans', $plans);
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Plan->id = $id;
        if ($this->Plan->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_add() {
        $data = array();
        $this->Plan->save($data);
        $id = $this->Plan->id;
        $this->redirect(array('action'=>'edit', 'admin'=>true, $id));
    }
    
    public function admin_edit($id) {
        $plan = $this->Plan->where(array('id'=>$id))->first();
        if (!$plan) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->data = $plan;
        $this->set('plan', $plan);
    }
    
    public function admin_update() {
        $data = $this->data['Plan'];
        $data['is_display'] = 1;
        $this->Plan->save($data);
        $this->admin_upload($data['id']);
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_public() {
        $data = $this->data['Plan'];        
        $data['is_display'] = 1;
        $this->Plan->save($data);
        $this->admin_upload($data['id']);
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    
    public function admin_upload($id) {
        $data = $this->data['Plan'];
        if (!$data['banner']['error']) {
            $this->_setAttachmentComponent();
            $this->_logoAttachment->upload($data, 'banner');
            $save = array(
                'id' => $id,
                'banner_file_path' => $data['banner_file_path'],
            );
            $this->Plan->save($save);
        }
    }
    
    public function admin_open($id) {
        $this->autoRender = false;
        $data = array(
            'id' => $id,
            'is_public' => 1,
        );
        if ($this->Plan->save($data)) {
            echo true;
        } else {
            echo false;
        }
    }
}