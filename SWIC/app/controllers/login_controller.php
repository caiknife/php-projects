<?php
class LoginController extends AppController {
    public $uses = array(
        'Administrator',
    );
    
    // frontend goes here
    
    // backend goes here
    
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
        $this->autoRender = false;
        $this->Session->delete('Admin.login');
        echo '<script>parent.location="/admin";</script>';
    }
    
    protected function _adminBeforeFilter() {
        return;
    }
}