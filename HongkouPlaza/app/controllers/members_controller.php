<?php
class MembersController extends AppController {
    public $uses = array(
        'User', 'Member'
    );
    
    public $paginate = array(
        'User' => array(
            'limit' => 10,
            'order' => array('modified'=>'DESC'),
        ),
        'Member' => array(
            'limit' => 10,
            'order' => array('modified'=>'DESC'),
        ),
    );
    
    protected $_searchKeys = array(
        'email'=>null, 'gender'=>null, 'age'=>null, 'district'=>null, 'last_login_time'=>null,'subscribe'=>null
    );
    /*
     * frontend goes here
     */
    
    /*
     * backend goes here
     */
    
    public function admin_index() {
        if ($this->RequestHandler->isPost()) {
            $this->redirect(array('action'=>'search', 'admin'=>true, 'query'=>$this->_encodeUrlParams($this->data['Member'])));
        }
        $members = $this->paginate('User', $this->User->buildFilter(array()));        
        $this->set('members', $members);        
        $this->set('csv_url', Router::url(array('action'=>'csv', 'admin'=>true, 'query'=>$this->_encodeUrlParams($this->_searchKeys))));
    }
    
    public function admin_search() {
        $query = $this->_decodeUrlParams($this->params['named']['query']);
        $this->data['Member'] = $query;
        $members = $this->paginate('User', $this->User->buildFilter($query));
        $this->set('members', $members);
        $this->set('csv_url', Router::url(array('action'=>'csv', 'admin'=>true, 'query'=>$this->_encodeUrlParams($this->data['Member']))));
        $this->render('admin_index');
    }
    
    public function admin_csv() {
        $this->autoRender = false;
        $query = $this->_decodeUrlParams($this->params['named']['query']);
        $this->User->recursive = -1;
        $members = $this->User->filter($query)->getCsvFormatData();
        $this->header('Content-Type: text/csv');
        $this->header('Content-Disposition: attachment;filename=members_'.date('YmdHis').'.csv');
        $buffer = fopen('php://output', 'r+');
        foreach ($members as $member) {
            fputcsv($buffer, $member);
        }
        fclose($buffer);
    }
}