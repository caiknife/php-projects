<?php
class NoteController extends AppController {
    public $uses = array(
        'TastingNotes',
    );
    
    public $paginate = array(
        'TastingNotes' => array(
            'limit' => 15,
            'order' => array('TastingNotes.date_time'=>'DESC'),
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
        		'note_big' => array(693, 390, 'resizeCrop'),
                'note' => array(204, 115, 'resizeCrop'),
            ),
        ));
    }
    
    // frontend goes here
    
    // cn frontend goes here
    
    // backend goes here
    public function admin_index() {
        if ($this->RequestHandler->isPost()) {
            $url = array('action'=>'search', 'admin'=>true, 'query'=>($this->_encodeUrlParams($this->data['TastingNotes'])));
            isset($this->data['Page']['page']) && is_numeric($this->data['Page']['page']) ? $url['page'] = $this->data['Page']['page'] : null;
            $this->redirect($url);
        }
        
        $notes = $this->paginate('TastingNotes', $this->TastingNotes->buildFilter(array('is_display'=>1)));
        //pr($notes);
        $this->set('notes', $notes);
        $this->set('status', Configure::read('Rating.status'));
    }
    
    
    public function admin_search() {
        $query = $this->_decodeUrlParams($this->params['named']['query']);
        $this->data['TastingNotes'] = $query;
        
        $notes = $this->paginate('TastingNotes', $this->TastingNotes->buildFilter(array_merge(array('is_display'=>1), $query)));
        //pr($notes);
        $this->set('notes', $notes);
        $this->render('admin_index');
        $this->set('status', Configure::read('Rating.status'));
    }
    
    public function admin_add() {
        $this->TastingNotes->save(array());
        $id = $this->TastingNotes->id;
        $this->redirect(array('action'=>'edit', 'admin'=>true, $id));
    }
    
    public function admin_edit($id) {
        $note = $this->TastingNotes->where(array('id'=>$id))->first();
        if (!$note) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->data = $note;
        $this->set('note', $note);
    }
    
    public function admin_update() {
        $data = $this->data['TastingNotes'];
        $data['is_display'] = 1;
        if (isset($this->params['form']['logo_desc'])) {
            $sort = $this->params['form']['logo_desc'];
            for ($i=1; $i<=6; $i++) {
                $data['media_desc_'.$i] = isset($sort[$i-1]) ? $sort[$i-1] : '';
            }
        }
        $this->TastingNotes->save($data);
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->TastingNotes->id = $id;
        if ($this->TastingNotes->saveField('deleted', true)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_save() {
        $this->autoRender = false;
        $sort = $this->params['form']['sort'];
        for ($i=1; $i<=6; $i++) {
            $data['media_url_'.$i] = isset($sort[$i-1]) ? $sort[$i-1] : '';
        }
        $this->TastingNotes->id = $this->params['form']['id'];
        if ($this->TastingNotes->save($data)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_upload() {
         $this->autoRender = false;
        $this->_setAttachmentComponent();
        $data = $this->params['form'];
        $this->_logoAttachment->upload($data, 'note_logo');
        echo json_encode(array('msg'=>$data));
    }
    
    
} 