<?php
class ImporterController extends AppController {
    public $uses = array(
    	'Importer', 'Wine'
    );
    
    public $paginate = array(
        'Importer' => array(
            'limit' => 15,
            'order' => array('Importer.modified'=>'DESC'),
        ),
    );
    
    // frontend goes here
    
    // backend goes here
    
    public function admin_index() {
        if ($this->RequestHandler->isPost()) {
            $url = array('action'=>'index', 'admin'=>true);
            isset($this->data['Page']['page']) && is_numeric($this->data['Page']['page']) ? $url['page'] = $this->data['Page']['page'] : null;
            $this->redirect($url);
        }
        $importers = $this->paginate('Importer', $this->Importer->buildFilter(array('is_display'=>1)));
        $this->set('importers', $importers);
    }
    
    public function admin_add() {
        $this->Importer->save(array());
        $id = $this->Importer->id;
        $this->redirect(array('action'=>'edit', 'admin'=>true, $id));
    }
    
    public function admin_edit($id) {
        $importer = $this->Importer->where(array('id'=>$id))->first();
        if (!$importer) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->data = $importer;
    }
    
    public function admin_update() {
        $data = $this->data['Importer'];
        $data['is_display'] = 1;
        $this->Importer->save($data);
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Importer->id = $id;
        if ($this->Importer->saveField('deleted', true)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_count($id) {
        $this->autoRender = false;
        $count = $this->Wine->where($this->Wine->buildFilter(array('is_display'=>1, 'importer_id'=>$id)))->count();
        echo $count;
    }
}