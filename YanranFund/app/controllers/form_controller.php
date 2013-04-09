<?php
class FormController extends AppController {
    public $uses = array(
        'FormHelp', 'FormVolunteer', 'FormHospital',
        'HelpAttachment',
    );
    
    public $paginate = array(
        'FormHelp' => array(
            'limit' => 15,
            'order' => array('FormHelp.created'=>'DESC'),
        ),
        'FormVolunteer' => array(
            'limit' => 15,
            'order' => array('FormVolunteer.created'=>'DESC'),
        ),
        'FormHospital' => array(
            'limit' => 15,
            'order' => array('FormHospital.created'=>'DESC'),
        ),
    );
    
    protected $_logoAttachment;
    
    protected function _setAttachmentComponent() {
        App::import('Component', 'Attachment');
        $this->_logoAttachment = new AttachmentComponent();
        $this->_logoAttachment->initialize($this, array(
            'files_dir'   => 'files',
            'rm_tmp_file' => true,
            'origin' => false,
        ));
    }
    
    // frontend goes here
    public function cn_help() {
        $this->help();
    }
    
    public function en_help() {
        $this->help();
    }
    
    public function help() {
        $this->autoRender = false;
        $data = $this->data['FormHelp'];
        $this->FormHelp->save($data);
        $helpId = $this->FormHelp->id;
        $attachments = $this->params['form']['attachments'];
        $this->HelpAttachment->updateAll(array('help_id'=>$helpId), array('id'=>$attachments));
    }
    
    public function cn_volunteer() {
        $this->volunteer();    
    }
    
    public function en_volunteer() {
        $this->volunteer();
    }
    
    public function volunteer() {
        $this->autoRender = false;
        $data = $this->data['FormVolunteer'];
        $form = $this->params['form'];
        
        $formVolunteer = Configure::read('FormVolunteer');
        $service = $formVolunteer[$this->lang]['service'];
        $term = $formVolunteer[$this->lang]['service_term'];
        $time = $formVolunteer[$this->lang]['service_time'];
        $via = $formVolunteer[$this->lang]['via'];
        if (isset($form['service'])) {
            $collection = array();
            foreach ($form['service'] as $key=>$val) {
                if ($key==3) {
                    $collection[] = $service[$key].'('.$data['service_translate'].')';
                } elseif($key==4) {
                    $collection[] = $service[$key].'('.$data['service_other'].')';
                } else {
                    $collection[] = $service[$key];
                }
            }
            $data['service'] = implode('，', $collection);
        }
        if (isset($form['term'])) {
            $collection = array();
            foreach ($form['term'] as $key=>$val) {
                if($key==4) {
                    $collection[] = $term[$key].'('.$data['term_other'].')';
                } else {
                    $collection[] = $term[$key];
                }
            }
            $data['service_term'] = implode('，', $collection);
        }
        if (isset($form['time'])) {
            $collection = array();
            foreach ($form['time'] as $key=>$val) {
                $collection[] = $time[$key];
            }
            $data['service_time'] = implode('，', $collection);
        }
        if (isset($form['via'])) {
            $collection = array();
            foreach ($form['via'] as $key=>$val) {
                if($key==9) {
                    $collection[] = $via[$key].'('.$data['via_other'].')';
                } else {
                    $collection[] = $via[$key];
                }
            }
            $data['via'] = implode('，', $collection);
        }
        
        $this->FormVolunteer->save($data);
    }
    
    public function cn_hospital() {
        $this->hospital();
    }
    
    public function en_hospital() {
        $this->hospital();
    }
    
    public function hospital() {
        $this->autoRender = false;
        $data = $this->data['FormHospital'];
        $this->FormHospital->save($data);
    }
    
    public function cn_upload() {
        $this->upload();    
    }
    
    public function en_upload() {
        $this->upload();
    }
    
    public function upload() {
        $this->autoRender = false;
        $this->_setAttachmentComponent();
        $data = $this->params['form'];
        $this->_logoAttachment->upload($data, 'banner');
        echo json_encode(array('msg'=>$data));
    }
    
    public function admin_help() {
        // post
        if ($this->RequestHandler->isPost()) {
            $query = isset($this->data['FormHelp']) ? $this->data['FormHelp'] : array();
            unset($query['type']);
            $url = array('action'=>'help', 'admin'=>true, 'query'=>$this->_encodeUrlParams($query));
            isset($this->data['Page']['page']) && is_numeric($this->data['Page']['page']) ? $url['page'] = $this->data['Page']['page'] : null;
            $this->redirect($url);
        }
        
        $this->FormHelp->recursive = -1;
        
        $query = isset($this->params['named']['query']) ? $this->_decodeUrlParams($this->params['named']['query']) : array();
        $this->data['FormHelp'] = $query;

        $forms = $this->paginate('FormHelp', $this->FormHelp->buildFilter($query));
        $this->set('forms', $forms);
    }
    
    public function admin_viewhelp($id) {
        $this->FormHelp->id = $id;
        $data = $this->FormHelp->read();
        if (!$data) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'help'));
        }
        $this->FormHelp->saveField('is_viewed', 1);
        $this->set('data', $data);
    }
    
    public function admin_volunteer() {
        // post
        if ($this->RequestHandler->isPost()) {
            $query = isset($this->data['FormVolunteer']) ? $this->data['FormVolunteer'] : array();
            unset($query['type']);
            $url = array('action'=>'volunteer', 'admin'=>true, 'query'=>$this->_encodeUrlParams($query));
            isset($this->data['Page']['page']) && is_numeric($this->data['Page']['page']) ? $url['page'] = $this->data['Page']['page'] : null;
            $this->redirect($url);
        }
                
        $query = isset($this->params['named']['query']) ? $this->_decodeUrlParams($this->params['named']['query']) : array();
        $this->data['FormVolunteer'] = $query;

        $forms = $this->paginate('FormVolunteer', $this->FormVolunteer->buildFilter($query));
        $this->set('forms', $forms);
    }
    
    public function admin_viewvolunteer($id) {
        $this->FormVolunteer->id = $id;
        $data = $this->FormVolunteer->read();
        if (!$data) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'volunteer'));
        }
        $this->FormVolunteer->saveField('is_viewed', 1);
        $this->set('data', $data);
    }
    
    public function admin_hospital() {
        // post
        if ($this->RequestHandler->isPost()) {
            $query = isset($this->data['FormHospital']) ? $this->data['FormHospital'] : array();
            unset($query['type']);
            $url = array('action'=>'hospital', 'admin'=>true, 'query'=>$this->_encodeUrlParams($query));
            isset($this->data['Page']['page']) && is_numeric($this->data['Page']['page']) ? $url['page'] = $this->data['Page']['page'] : null;
            $this->redirect($url);
        }
                
        $query = isset($this->params['named']['query']) ? $this->_decodeUrlParams($this->params['named']['query']) : array();
        $this->data['FormHospital'] = $query;

        $forms = $this->paginate('FormHospital', $this->FormHospital->buildFilter($query));
        $this->set('forms', $forms);
    }
    
    public function admin_viewhospital($id) {
        $this->FormHospital->id = $id;
        $data = $this->FormHospital->read();
        if (!$data) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'hospital'));
        }
        $this->FormHospital->saveField('is_viewed', 1);
        $this->set('data', $data);
    }
}