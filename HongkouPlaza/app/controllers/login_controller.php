<?php
class LoginController extends AppController {
    public $uses = array(
        'Administrator', 'Member'
    );
    
    /*
     * frontend goes here
     */
    
    public function signup() {
        if ($this->Session->check('Member.login')) {
            $this->redirect($this->referer('/', true));
        }
        $this->layout = 'signup';
    }
    
    public function valid() {
        $this->autoRender = false;
        if (isset($this->params['form']['email'])) {
            $query['email'] = $this->params['form']['email'];
        }
        if (isset($this->params['form']['nickname'])) {
            $query['nickname'] = $this->params['form']['nickname'];
        }
        $data = $this->Member->where($query)->first();
        if ($data) {
            echo false;
        } else {
            echo true;
        }
    }
    
    public function create() {
        $this->autoRender = false;
        $this->Member->save($this->data);
        $this->Member->id = $this->Member->getLastInsertID();
        $this->Member->recursive = -1;
        $member = $this->Member->read();
        $this->Session->write('Member.login', $member);
        $email = $member['Member']['email'];
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
    
    public function signin() {
        $this->autoRender = false;
        extract($this->data['Login']);
        $this->Member->recursive = -1;       
        $data = $this->Member->getMember($email, $password);
        if ($data) {
            $this->Session->write('Member.login', $data);
            $this->Member->id = $data['Member']['id'];
            $this->Member->save(array(
                'last_login_ip' => $this->RequestHandler->getClientIP(),
                'last_login_time' => date('Y-m-d H:i:s'),
            )); 
            if ($live) {
                $this->Cookie->write('Member.login', $data['Member']['id'], true, 3600*24*30);
            }
            echo true;    
        } else {
            echo false;
        }
        
    }
    
    public function signout() {
        $this->Session->delete('Member.login');
        $this->Cookie->delete('Member.login');
        $this->redirect('/');
    }

    public function active($hash) {
        $email = $this->_decodeUrlParams($hash);
        $this->Member->recursive = -1;
        $member = $this->Member->where(array('email'=>$email))->first();
        $this->Member->id = $member['Member']['id'];
        if ($this->Member->saveField('actived', true)) {
            $member['Member']['actived'] = 1;
            $this->Session->write('Member.login', $member);
        }
        $this->redirect(array('controller'=>'profile', 'action'=>'info'));
    }
    
    public function resetpassword() {
        $this->autoRender = false;
        $email = $this->data['Forgot']['email'];
        $member = $this->Member->where(array('email'=>$email))->first();
        if (!$member) {
            echo false;
        } else {            
            $this->Email->reset();
            $this->Email->delivery = 'smtp';
            $this->Email->smtpOptions = Configure::read('Email.smtpOptions');       
            $this->Email->to = '<'.$email.'>';    
            $this->Email->subject = '重置您的密码';     
            $this->Email->from = '<info@hongkouplaza.com>';    
            $this->Email->template = 'password'; // note no '.ctp'    //Send as 'html', 'text' or 'both' (default is 'text')    
            $this->Email->sendAs = 'html'; // because we like to send pretty mail
            $this->Member->id = $member['Member']['id'];
            $password = $this->_buildPassword(8);
            $this->set('email', $email);
            $this->set('password', $password);
            if ($this->Member->saveField('password', $password) && $this->Email->send()) {
                echo true;
            } else {
                echo false;
            }
        }
    }
    
    /*
     * backend goes here
     */
    
    public function admin_index() {
        
    }
    
    public function admin_signin() {
        $data = $this->data;
        $admin = $this->Administrator->getAdmin($data['username'], $data['password']);
        if (!$admin) {
            $this->Session->setFlash('用户名/密码错误！');
            $this->redirect(array('controller'=>'home', 'action'=>'index', 'admin'=>true));
        } else {
            $this->Session->write('Admin.login', $admin);
            $this->Administrator->id = $admin['Administrator']['id'];
            $this->Administrator->save(array(
                'last_login_ip' => $this->RequestHandler->getClientIP(),
                'last_login_time' => date('Y-m-d H:i:s'),
            )); 
            $this->redirect(array('controller'=>'top', 'action'=>'index', 'admin'=>true));
        }
    }
    
    public function admin_signout() {
        $this->Session->delete('Admin.login');
        $this->redirect(array('controller'=>'home', 'action'=>'index', 'admin'=>true));
    }
    
    protected function _adminBeforeFilter() {
        return;
    }
    
    protected function _buildPassword($len) {
        $chars = array( 
            "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",  
            "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",  
            "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",  
            "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",  
            "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2",  
            "3", "4", "5", "6", "7", "8", "9" 
        ); 
        $charsLen = count($chars) - 1; 
        shuffle($chars);    // 将数组打乱 
        $output = ""; 
        for ($i=0; $i<$len; $i++) { 
            $output .= $chars[mt_rand(0, $charsLen)]; 
        } 
        return $output;  
    }
}