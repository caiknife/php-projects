<?php
class ProfileController extends AppController {
    public $uses = array(
        'Brand', 'MemberBrand', 'Category', 'BrandCategory'
    );
    
    protected function _frontendBeforeFilter() {
        parent::_frontendBeforeFilter();
        if (!$this->Session->check('Member.login')) {
            $this->redirect($this->referer('/', true));
        }
        if ($this->RequestHandler->isAjax()) {
            $this->autoLayout = false;
        }
    }
    
    public function index() {
        if ($this->_profile['Member']['first_login']) {
            $this->redirect(array('action'=>'info'));
        } else {
            $this->redirect(array('action'=>'subscribe'));
        }
    }
    
    public function subscribe() {
        $this->_showSubscribeCount();
        $this->_getSubscribedBrands();
        $this->_setAllBrandsWithCategory();
        
    }
    
    public function subscribed() {
        $this->_showSubscribeCount();
    }
    
    public function connect() {
        $this->autoRender = false;
        $data = $this->params['form'];
        $memberId = $this->_profile['Member']['id'];
        if (isset($data['brands']) && $data['brands']) {
            $save = array();
            foreach ($data['brands'] as $brandId) {                
                $save[] = array('brand_id'=>$brandId, 'member_id'=>$memberId);
            }
            if ($this->MemberBrand->connectMemberWithBrands($save)) {
                echo true;   
            } else {
                echo false;
            }
        }
        
    } 
    
    public function disconnect($brandId) {
        $this->autoRender = false;
        if (!$brandId) {
            echo false;
        }
        $memberId = $this->_profile['Member']['id'];
        $data = $this->MemberBrand->where(array('brand_id'=>$brandId, 'member_id'=>$memberId))->first();
        if ($this->MemberBrand->delete($data['MemberBrand']['id'], false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function password() {
        $this->_showSubscribeCount();
    }
    
    public function info() {
        if ($this->_profile['Member']['first_login']) {
            $this->Member->id = $this->_profile['Member']['id'];
            $this->Member->saveField('first_login', 0);
            $this->_profile['Member']['first_login'] = 0;
            $this->Session->write('Member.login', $this->_profile);
        }
        $this->_showSubscribeCount();
        //pr($this->_profile);
        $this->data = $this->_profile;
    }
    
    public function valid() {
        $this->autoRender = false;
        if (isset($this->params['form']['email'])) {
            $query['email'] = $this->params['form']['email'];
        }
        if (isset($this->params['form']['nickname'])) {
            $query['nickname'] = $this->params['form']['nickname'];
        }
        $query['id <>'] = $this->_profile['Member']['id'];
        $data = $this->Member->where($query)->first();
        if ($data) {
            echo false;
        } else {
            echo true;
        }
    }
    
    public function active() {
        $this->autoRender = false;
        if (!$this->_profile) {
            echo false;
            return;
        }
        $email = $this->_profile['Member']['email'];
        $this->Email->reset();
        $this->Email->delivery = 'smtp';
        $this->Email->smtpOptions = Configure::read('Email.smtpOptions');       
        $this->Email->to = '<'.$email.'>';    
        $this->Email->subject = '激活您的账户';     
        $this->Email->from = '<info@hongkouplaza.com>';    
        $this->Email->template = 'active'; // note no '.ctp'    //Send as 'html', 'text' or 'both' (default is 'text')    
        $this->Email->sendAs = 'html'; // because we like to send pretty mail
        $this->set('email', $email);
        $this->set('active_url', $this->_buildActiveUrl($email));
        if ($this->Email->send()) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function changeinfo() {
        $this->autoRender = false;
        $data = $this->data['Member'];
        $memberId = $this->_profile['Member']['id'];
        if ($this->Member->save(am(array('id'=>$memberId), $data))) {
            $this->Member->id = $memberId;
            $this->Member->recursive = -1;
            $member = $this->Member->read();
            $this->Session->write('Member.login', $member);
            echo true;
        } else {
            echo false;
        }
    }
    
    public function checkpassword() {
        $this->autoRender = false;
        $password = $this->_profile['Member']['password'];
        $old_password = $this->data['Member']['old_password'];
        if ($password != md5($old_password)) {
            echo false;
        } else {
            echo true;
        }
        
    }
    
    public function changepassword() {
        $this->autoRender = false;
        $password = $this->data['Member']['new_password'];
        $memberId= $this->_profile['Member']['id'];
        $this->_profile['Member']['password'] = md5($password);
        $this->Session->write('Member.login', $this->_profile);
        if ($this->Member->save(array('id'=>$memberId, 'password'=>$password))) {
            echo true;
        } else {
            echo false;
        }
    }
    
    protected function _showSubscribeCount() {
        $this->Member->recursive = 1;
        $member = $this->Member->where(array('id'=>$this->_profile['Member']['id']))->first();
        $this->set('brands', $member['Brand']);
    }
    
    protected function _setAllBrands() {
        $this->Brand->recursive = -1;
        $brands = $this->Brand->where(array('deleted'=>0))->select();
        $brandsGroup = array();
        foreach ($brands as $brand) {
            $brandsGroup[$brand['Brand']['cat_main']][] = $brand;
            if ($brand['Brand']['cat_main']!=$brand['Brand']['cat_sub']) {                
                $brandsGroup[$brand['Brand']['cat_sub']][] = $brand;
            }
        }        
        $this->set('brands_group', $brandsGroup);
    }
    
    protected function _setAllBrandsWithCategory() {
        $this->Brand->recursive = -1;
        $categories = $this->Category->getCategoriesList();
        $this->set('categories', $categories);
        $brandsGroup = array();
        foreach ($categories as $index=>$cate) {
            $brandsGroup[$index] = $this->Brand->getBrandsWithCategory($index);
        }
        $this->set('brands_group', $brandsGroup);
    }
    
    protected function _buildActiveUrl($email) {
        return FULL_BASE_URL.Router::url(array('controller'=>'login', 'action'=>'active', $this->_encodeUrlParams($email)));
    }
}