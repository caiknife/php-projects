<?php
class ProjectController extends AppController {
    public $uses = array(
        'Project', 'Logo', 'NewsProject',
    );
    
    public $paginate = array(
        'Project' => array(
            'limit' => 15,
            'order' => array('Project.modified'=>'DESC'),
        ),
    );
    
    protected $_logoAttachment;
    protected $_kvAttachment;
    
    protected function _setAttachmentComponent() {
        App::import('Component', 'Attachment');
        $this->_logoAttachment = new AttachmentComponent();
        $this->_logoAttachment->initialize($this, array(
        	'rm_tmp_file' => true,
            'origin' => false,
            'images_size' => array(
                'logo' => array(150, 75, 'resize'),
            ),
        ));
        $this->_kvAttachment = new AttachmentComponent();
        $this->_kvAttachment->initialize($this, array(
        	'rm_tmp_file' => true,
            'origin' => true,
            'images_size' => array(
                'project' => array(160, 120, 'resizeCrop'),
            ),
        ));
    }
    
    // frontend goes here
    public function cn_index() {
        $this->index('cn');
    }
    
    public function en_index() {
        $this->index('en');
    }
    
    public function index($lang) {
        $this->paginate['Project']['order'] = array('Project.created'=>'DESC');
        $this->Project->recursive = -1;
        $projects = $this->paginate('Project', $this->Project->buildFilter(array('is_display'=>1), $lang));
        $this->set('projects', $projects);
    }
    
    public function cn_view($id) {
        $this->view('cn', $id);
    }
    
    public function en_view($id) {
        $this->view('en', $id);
    }
    
    public function view($lang, $id) {
        $project = $this->Project->where(array('id'=>$id))->first();
        if (!$project) {
            $this->cakeError('error404');
            return;
        }
        $this->set('project', $project);
    }
    
    // backend goes here
    public function admin_index() {
        // post
        if ($this->RequestHandler->isPost()) {
            $query = isset($this->data['Project']) ? $this->data['Project'] : array();
            unset($query['type']);
            $url = array('action'=>'index', 'admin'=>true, 'query'=>$this->_encodeUrlParams($query));
            isset($this->data['Page']['page']) && is_numeric($this->data['Page']['page']) ? $url['page'] = $this->data['Page']['page'] : null;
            $this->redirect($url);
        }
                
        $query = isset($this->params['named']['query']) ? $this->_decodeUrlParams($this->params['named']['query']) : array();
        $this->data['News'] = $query;
                
        $projects = $this->paginate('Project', $this->Project->buildFilter(array_merge(array('is_display'=>1), $query)));
        $this->set('projects', $projects);
    }
    
    public function admin_sort() {
        $this->autoRender = false;        
        $sort = $this->params['form']['sort'];
        foreach ($sort as $key=>$val) {
            $this->Logo->id = $val;
            $this->Logo->saveField('sort', $key);
        }
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Project->id = $id;
        if ($this->Project->delete($id, true)) {
            $this->NewsProject->deleteAll(array('project_id'=>$id), false);
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_deletelogo($id) {
        $this->autoRender = false;
        $this->Logo->id = $id;
        if ($this->Logo->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_add() {
        $data = array();
        $this->Project->save($data);
        $id = $this->Project->id;
        $this->redirect(array('action'=>'edit', 'admin'=>true, $id));
    }
    
    public function admin_edit($id) {
        $project = $this->Project->where(array('id'=>$id))->first();
        if (!$project) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->data = $project;
        $this->set('project', $project);
    }
    
    public function admin_update() {
        $data = $this->data['Project'];
        $data['is_display'] = 1;
        $this->Project->save($data);
        $this->admin_kv($data['id']);
        $this->_saveLogoForProject();
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    protected function _saveLogoForProject() {
        if (!isset($this->params['form']['title_cn'])) {
            return;
        }
        $keys = array_keys($this->params['form']['title_cn']);
        foreach($keys as $key) {
            $this->Logo->id = null;
            $save = array(
                'id' => $key,
                'title_cn' => $this->params['form']['title_cn'][$key],
            	'title_en' => $this->params['form']['title_en'][$key],
            	'url' => $this->params['form']['url'][$key],
            );
            $this->Logo->save($save);
        }
    }
    
    public function admin_upload($id) {
        $this->autoRender = false;
        $this->_setAttachmentComponent();
        $data = $this->params['form'];
        $this->_logoAttachment->upload($data, 'project_logo');
        $save = array(
            'banner_file_path' => $data['project_logo_file_path'],
            'project_id' => $id,
        );
        $this->Logo->save($save);
        $data['id'] = $this->Logo->id;
        $data['delete_url'] = Router::url(array('action'=>'deletelogo', $data['id']));
        echo json_encode(array('msg'=>$data));
    }
    
    public function admin_kv($id) {
        $data = $this->data['Project'];
        if (!$data['banner']['error']) {
            $this->_setAttachmentComponent();
            $this->_kvAttachment->upload($data, 'banner');
            $save = array(
                'id' => $id,
                'banner_file_path' => $data['banner_file_path'],
            );
            $this->Project->save($save);
        }
    }
}