<?php
class IndexController extends AppController {
    public $uses = array(
        'IndexCenter', 'Subindex', 'Wine', 'PriceMonthly', 'IndexPurchase', 'Importer',
    );
    
    public $paginate = array(
        'Wine' => array(
            'limit' => 10,
            'order' => array('Wine.created'=>'DESC'),
        ),
    );
    
    // frontend goes here
    
    // cn frontend goes here
    public function cn_index() {
        $type = isset($this->params['named']['type']) ? $this->params['named']['type'] : 1;
        $this->set('type', $type);
        $this->setWineTypes();
        $this->set('subindexes', $this->Subindex->getList($type));
        
        $importers = $this->Importer->getList();
        $this->set('importers', $importers);
    }
    
    public function cn_detail() {
        if (!isset($this->params['named']['type']) || !isset($this->params['named']['subtype'])) {
            $this->cakeError('error404');
            return;
        }
        $type = isset($this->params['named']['type']) ? $this->params['named']['type'] : 1;
        $this->set('type', $type);
        $subtype = isset($this->params['named']['subtype']) ? $this->params['named']['subtype'] : '';
        $this->set('subtype', $subtype);
        $this->setWineTypes();
        $this->set('indexes', $this->Subindex->getList($type));
        
        $wines = $this->paginate('Wine', $this->Wine->buildFilter(array('type'=>$type, 'index_sub_id'=>$subtype, 'is_display'=>1)));
        $this->set('wines', $wines);

        $subindex = $this->Subindex->where(array('id'=>$subtype, 'deleted'=>0))->first();
        $this->set('subindex', $subindex);
        
        $this->_setIndexYears($type, $subtype);
    }
    
    
    
    public function cn_data() {
        $this->autoRender = false;
        $type = $this->params['form']['type'];
        $subtype = $this->params['form']['subtype'];
        if (isset($this->params['form']['year']) && !empty($this->params['form']['year'])) {
            $year = $this->params['form']['year'];
        } else {
            $year = null;
        }
        $index = $this->IndexCenter->getIndex($type, $subtype, $year);
        echo json_encode(array(
            'data' => $index
        ));
    }
    
    public function cn_purchase() {
        $this->set('subtype', null);
    }
    
    public function cn_purchasedata() {
        $this->autoRender = false;
        $purchases = $this->IndexPurchase->order('created DESC')->select();
        $total = 0;
        foreach ($purchases as $index) {
            $data[] = array(
                $index['IndexPurchase']['country'],
                (float)$index['IndexPurchase']['ratio'],
            );
            $total += (float)$index['IndexPurchase']['ratio'];
        }
        if ($total < 100.0) {
            $data[] = array(
                '其他',
                (100.0-$total),
            );
        }
        echo json_encode(array('data'=>$data));
    }
    
    // backend goes here
    
    public function admin_index() {
        if ($this->RequestHandler->isPost()) {
            $url = array('action'=>'index', 'admin'=>true, 'type'=>$this->data['IndexCenter']['index_type']);
            if ($this->data['IndexCenter']['index_sub_id']) {
                $url['subtype'] = $this->data['IndexCenter']['index_sub_id'];
            }
            $this->redirect($url);
        }
        
        $type = isset($this->params['named']['type']) ? $this->params['named']['type'] : 1;
        $this->setWineTypes();
        $this->set('type', $type);
        $search = array('deleted'=>0, 'index_type'=>$type);
        $subtype = isset($this->params['named']['subtype']) ? $this->params['named']['subtype'] : '';
        $this->set('subtype', $subtype);
        if (isset($this->params['named']['subtype'])) {
            $search['index_sub_id'] = $this->params['named']['subtype'];
            $this->data['IndexCenter']['index_sub_id'] = $this->params['named']['subtype'];
        }
        $indexes = $this->IndexCenter->where($search)->order('year DESC, month DESC')->select();
        $this->set('indexes', $indexes);
        $this->_setSubindex($type); 
    }
    
    public function admin_add() {
        $this->autoRender = false;
        $index = array_merge($this->data['AddIndexCenter'], $this->data['IndexCenter']);
        if ($this->IndexCenter->save($index)) {
            $index['id'] = $this->IndexCenter->id;
            $this->set('index', $index);
            $this->autoRender = true;
            $this->autoLayout = false;
        } else {
            echo false;
        }
    }
    
    public function admin_edit($id) {
        $this->autoRender = false;
        $index = $this->IndexCenter->where(array('id'=>$id))->first();
        if (!$index) {
            echo false;
        } else {
            $this->data['EditIndexCenter'.$id] = $index['IndexCenter'];
            $this->set('id', $id);
            $this->autoRender = true;
            $this->autoLayout = false;
        }
    }
    
    public function admin_save($id) {
        $this->autoRender = false;
        $index = array_merge($this->data['EditIndexCenter'.$id], $this->data['IndexCenter']);
        $index['id'] = $id;
        if ($this->IndexCenter->save($index)) {
            $this->set('index', $index);
            $this->autoRender = true;
            $this->autoLayout = false;
            $this->render('admin_add');
        } else {
            echo false;
        }
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->IndexCenter->id = $id;
        if ($this->IndexCenter->saveField('deleted', true)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_calculate() {
        $this->autoRender = false;
        $query = $this->params['form'];
        $result = $this->IndexCenter->getMonthlyPriceTotalAndBenchmarkPriceTotal($query);
        echo json_encode($result);
    }
    
    protected function _setSubindex($pid) {
        $this->set('subindexes', $this->Subindex->getList($pid));
    }
    
    protected function _setIndexYears($type, $subtype) {
        $years = array(date('Y'));
        $result = $this->IndexCenter->getYears($type, $subtype);
        $years = array_unique(array_merge($years, $result));
        $this->set('years', $years);
    }
    
}