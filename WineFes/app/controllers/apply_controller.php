<?php
class ApplyController extends AppController {
    public $uses = array(
        'Application'
    );
    
    public $paginate = array(
        'Application' => array(
            'limit' => 15,
            'order' => array('Application.created'=>'DESC'),
        ),
    );
    
    // frontend goes here
    public function cn_post() {
        $this->autoRender = false;
        $data = $this->data['Application'];
        if ($this->Application->save($data)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    // backend goes here
    public function admin_index() {
        if ($this->RequestHandler->isPost()) {
            $url = array('action'=>'index', 'admin'=>true);
            isset($this->data['Page']['page']) && is_numeric($this->data['Page']['page']) ? $url['page'] = $this->data['Page']['page'] : null;
            $this->redirect($url);
        }
        
        $applications = $this->paginate('Application');
        $this->set('applications', $applications);
    }
    
    public function admin_view($id) {
        $application = $this->Application->where(array('id'=>$id))->first();
        if (!$application) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->set('application', $application);
    }
}