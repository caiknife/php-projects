<?php
class DonationController extends AppController {
    public $uses = array(
        'Donation'
    );
    
    public function cn_index() {
        $this->index('cn');
    }
    
    public function en_index() {
        $this->index('en');
    }
    
    public function index($lang) {
        $donationList = $this->Donation->getList($lang, true);
        if (!$donationList) {
            $this->cakeError('error404');
            return;
        }
        $firstId = array_shift(array_keys($donationList));
        $this->redirect(array('action'=>'view', $firstId));
    }
    
    public function cn_view($id) {
        $this->view('cn', $id);
    }
    
    public function en_view($id) {
        $this->view('en', $id);
    }
    
    public function view($lang, $id) {
        $this->Donation->id = $id;
        $donation = $this->Donation->read();
        if (!$donation) {
            $this->cakeError('error404');
            return;
        }
        $this->set('donation', $donation);
        $this->set('id', $id);
        
        $donationList = $this->Donation->getList($lang, true);
        $this->set('donationList', $donationList);
    }
    
    // backend goes here
    public function admin_index() {
        $donations = $this->Donation->where(array('is_display'=>1))->order('sort ASC, id DESC')->select();
        $this->set('donations', $donations);
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->Donation->id = $val;
            $this->Donation->saveField('sort', $key);
        }
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Donation->id = $id;
        if ($this->Donation->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_add() {
        $data = array();
        $this->Donation->save($data);
        $id = $this->Donation->id;
        $this->redirect(array('action'=>'edit', 'admin'=>true, $id));
    }
    
    public function admin_edit($id) {
        $donation = $this->Donation->where(array('id'=>$id))->first();
        if (!$donation) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->data = $donation;
        $this->set('donation', $donation);
    }
    
    public function admin_update() {
        $data = $this->data['Donation'];
        $data['is_display'] = 1;
        $this->Donation->save($data);
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_hide($id) {
        $this->autoRender = false;
        $this->Donation->id = $id;
        $this->Donation->saveField('is_show', 0);
    }
    
    public function admin_show($id) {
        $this->autoRender = false;
        $this->Donation->id = $id;
        $this->Donation->saveField('is_show', 1);
    }
}