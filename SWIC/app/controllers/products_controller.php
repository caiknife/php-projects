<?php
class ProductsController extends AppController {
    public $uses = array(
    	'Wine', 'Winery', 'Region', 'Country', 'StatutoryLevel', 'GrapeVariety', 'WineGrapeVariety',
        'TastingScore', 'TastingNotes', 'PriceMonthly', 'Importer', 'Subindex',
    );
    
    public $paginate = array(
        'Wine' => array(
            'limit' => 15,
            'order' => array('Wine.modified'=>'DESC'),
        ),
    );
    
    protected function _setYear($thisYear=null) {
        App::import('Model', 'TastingNotes');
        $tastingNotesModel = new TastingNotes();
        $results = $tastingNotesModel->where(array('is_display'=>1))->order('date_time DESC')->select();
        $years = array();
        foreach ($results as $note) {
            $year = date('Y', strtotime($note['TastingNotes']['date_time']));
            if (!in_array($year, $years)) {
                $years[] = $year;
            }
        }
        $this->set('years', array_combine($years, $years));
        
        $notes = array();
        if ($thisYear) {
            $year = $thisYear;
            $notes = $tastingNotesModel->where(array('is_display'=>1, 'date_time LIKE'=>$year.'%'))->order('date_time DESC')->lists();
        } elseif ($years[0]) {
            $year = $years[0];
            $notes = $tastingNotesModel->where(array('is_display'=>1, 'date_time LIKE'=>$year.'%'))->order('date_time DESC')->lists();
        }
        $this->set('thisYear', $thisYear);
        $this->set('notes', $notes);
    }
    
    protected $_logoAttachment;
    // frontend goes here
    
    // cn frontend goes here
    public function cn_detail($id) {
        $this->autoLayout = false;
        $wine = $this->Wine->where(array('Wine.id'=>$id))->first();
        $this->set('wine', $wine);
        $this->set('capacityType', Configure::read('Wine.capacity_type'));
        $this->set('grapeType', $this->GrapeVariety->getList());
    }
    
    public function cn_price($id) {
        $this->autoRender = false;
        App::import('Model', 'PriceMonthly');
        $priceMonthlyModel = new PriceMonthly();
        $data = $priceMonthlyModel->getYearPricesByWineId($id);
        echo json_encode(array('data'=>$data));
    }
    
    public function cn_clean() {
        //$this->autoRender = false;
        $this->Wine->recursive = -1;
        $results = $this->Wine->where(array('Wine.deleted'=>1))->select();
        if (!$results) {
            return ;
        }
        $ids = array();
        foreach ($results as $wine) {
            $ids[] = $wine['Wine']['id'];
        }
        $this->set('ids', $ids);
        $this->TastingScore->deleteAll(array('wines_id'=>$ids), false);
        $this->PriceMonthly->deleteAll(array('wines_id'=>$ids), false);
    }
    
    // backend goes here
    public function admin_index() {
        if ($this->RequestHandler->isPost()) {
            $type = $this->params['named']['type'];
            $url = array('action'=>'search', 'admin'=>true, 'type'=>$type,'query'=>($this->_encodeUrlParams($this->data['Wine'])));
            isset($this->data['Page']['page']) && is_numeric($this->data['Page']['page']) ? $url['page'] = $this->data['Page']['page'] : null;
            $this->redirect($url);
        }
        
        $type = isset($this->params['named']['type']) ? $this->params['named']['type'] : 1;
        $this->setWineTypes();
        $this->set('type', $type);
        
        $wines = $this->paginate('Wine', $this->Wine->buildFilter(array('type'=>$type, 'is_display'=>1)));
        $this->set('wines', $wines);
        
        $this->_setDataForWine();
    }
    
    public function admin_search() {
        $query = $this->_decodeUrlParams($this->params['named']['query']);
        $this->data['Wine'] = $query;
        
        $type = isset($this->params['named']['type']) ? $this->params['named']['type'] : 1;
        $this->setWineTypes();
        $this->set('type', $type);
        
        $wines = $this->paginate('Wine', $this->Wine->buildFilter(array_merge(array('type'=>$type, 'is_display'=>1), $query)));
        $this->set('wines', $wines);
        
        $this->_setDataForWine();
        
        $this->render('admin_index');
    }
    
    public function admin_add() {
        $type = $this->params['named']['type'];
        $this->Wine->save(array('index_type'=>$type, 'benchmark_year'=>date('Y'), 'benchmark_month'=>date('m'), 'benchmark_day'=>date('d')));
        $id = $this->Wine->id;
        $this->redirect(array('action'=>'edit', 'admin'=>true, $id));
    }
    
    public function admin_edit($id) {
        $wine = $this->Wine->where(array('Wine.id'=>$id))->first();
        if (!$wine) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->data = $wine;
        $this->set('wine', $wine['Wine']);
        $this->set('wineGrapeVarieties', $wine['WineGrapeVariety']);
        $this->set('priceMonthly', $wine['PriceMonthly']);
        $this->set('tastingScore', $wine['TastingScore']);
        $this->set('importer', $wine['Importer']);
        $this->_setDataForWine();
        $this->_setSubindex($wine['Wine']['index_type']);
        
        $this->_setYear();
    }
    
    public function admin_update() {
        $data = $this->data['Wine'];
        $data['is_display'] = 1;
        $this->Wine->save($data);
        $this->redirect(array('action'=>'index', 'admin'=>true, 'type'=>$data['index_type']));
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Wine->id = $id;
        if ($this->Wine->saveField('deleted', true)) {
            $this->TastingScore->deleteAll(array('wines_id'=>$id), false);
            $this->PriceMonthly->deleteAll(array('wines_id'=>$id), false);
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_connect_wine_grape() {
        $this->autoRender = false;
        $wineId = $this->data['Wine']['id'];
        $grapeId = $this->data['Wine']['grape_variety_id']; 
        $percent = $this->data['Wine']['percent'];
        if ($grapeId && $percent) {
            $item = array(
                'wines_id' => $wineId,
                'grape_varieties_id' => $grapeId,
                'percent' => $percent,
            );
            if ($this->WineGrapeVariety->save($item)) {
                $item['id'] = $this->WineGrapeVariety->id;
                $this->set('item', $item);
                $this->set('grapeVarieties', $this->GrapeVariety->getList());
                $this->autoRender = true;
                $this->autoLayout = false;
            } else {
                echo false;
            }
        } else {
            echo false;
        }
    }
    
    public function admin_disconnect_wine_grape($id) {
        $this->autoRender = false;
        if ($this->WineGrapeVariety->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_add_tasting_score() {
        $this->autoRender = false;
        $tastingScore = $this->data['AddTastingScore'];
        $tastingScore['wines_id'] = $this->data['Wine']['id'];
        $data = $this->TastingScore->where(array('wines_id'=>$tastingScore['wines_id'], 'tasting_notes_id'=>$tastingScore['tasting_notes_id']))->first();
        if ($data) {
            echo false;
            return;
        }
        if ($this->TastingScore->save($tastingScore)) {
            $tastingScore['id'] = $this->TastingScore->id;
            $this->set('score', $tastingScore);
            $this->set('tastingNotes', $this->TastingNotes->getList());
            $this->autoRender = true;
            $this->autoLayout = false;
        } else {
            echo false;
        }
    }
    
    public function admin_edit_tasting_score($id) {
        $this->autoRender = false;
        $score = $this->TastingScore->where(array('id'=>$id))->first();
        if (!$score) {
            echo false;
        } else {
            $this->data['EditTastingScore'.$id] = $score['TastingScore'];
            $this->set('id', $score['TastingScore']['id']);
            $tastingNotes = $this->TastingNotes->where(array('id'=>$score['TastingScore']['tasting_notes_id']))->first();
            $year = date('Y', strtotime($tastingNotes['TastingNotes']['date_time']));
            $this->_setYear($year);
            $this->autoRender = true;
            $this->autoLayout = false;
        }
    }
    
    public function admin_save_tasting_score($id) {
        $this->autoRender = false;
        $tastingScore = $this->data['EditTastingScore'.$id];
        $tastingScore['id'] = $id;
        $tastingScore['wines_id'] = $this->data['Wine']['id'];
        $data = $this->TastingScore->where(array('id <>'=>$id, 'wines_id'=>$tastingScore['wines_id'], 'tasting_notes_id'=>$tastingScore['tasting_notes_id']))->first();
        if ($data) {
            echo false;
            return;
        }
        if ($this->TastingScore->save($tastingScore)) {
            $this->set('score', $tastingScore);
            $this->set('tastingNotes', $this->TastingNotes->getList());
            $this->autoRender = true;
            $this->autoLayout = false;
            $this->render('admin_add_tasting_score');
        } else {
            echo false;
        } 
    }
    
    public function admin_delete_tasting_score($id) {
        $this->autoRender = false;
        if ($this->TastingScore->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_filter_tasting_notes() {
        $this->autoLayout = false;
        $year = $this->params['form']['year'];
        $notes = $this->TastingNotes->where(array('is_display'=>1, 'date_time LIKE'=>$year.'%'))->order('date_time DESC')->lists();
        $this->set('notes', $notes);
    }
    
    public function admin_add_price_monthly() {
        $this->autoRender = false;
        $priceMonthly = $this->data['AddPriceMonthly'];
        $priceMonthly['wines_id'] = $this->data['Wine']['id'];
        $data = $this->PriceMonthly->where(array('wines_id'=>$priceMonthly['wines_id'], 'year'=>$priceMonthly['year'], 'month'=>$priceMonthly['month']))->first();
        if ($data) {
            echo false;
            return;
        }
        if ($this->PriceMonthly->save($priceMonthly)) {
            $priceMonthly['id'] = $this->PriceMonthly->id;
            $this->set('price', $priceMonthly);
            $this->autoRender = true;
            $this->autoLayout = false;
        } else {
            echo false;
        }
    }
    
    public function admin_edit_price_monthly($id) {
        $this->autoRender = false;
        $price = $this->PriceMonthly->where(array('id'=>$id))->first();
        if (!$price) {
            echo false;
        } else {
            $this->data['EditPriceMonthly'.$id] = $price['PriceMonthly'];
            $this->set('id', $price['PriceMonthly']['id']);
            $this->autoRender = true;
            $this->autoLayout = false;
        }
    }
    
    public function admin_save_price_monthly($id) {
        $this->autoRender = false;
        $priceMonthly = $this->data['EditPriceMonthly'.$id];
        $priceMonthly['id'] = $id;
        $priceMonthly['wines_id'] = $this->data['Wine']['id'];
        $data = $this->PriceMonthly->where(array('id <>'=>$id, 'wines_id'=>$priceMonthly['wines_id'], 'year'=>$priceMonthly['year'], 'month'=>$priceMonthly['month']))->first();
        if ($data) {
            echo false;
            return;
        }
        if ($this->PriceMonthly->save($priceMonthly)) {
            $this->set('price', $priceMonthly);
            $this->autoRender = true;
            $this->autoLayout = false;
            $this->render('admin_add_price_monthly');
        } else {
            echo false;
        }
    }
    
    public function admin_delete_price_monthly($id) {
        $this->autoRender = false;
        if ($this->PriceMonthly->delete($id, false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_search_importer() {
        $this->autoLayout = false;
        $query['title'] = $this->params['form']['importer'];
        $importers = $this->Importer->where($this->Importer->buildFilter($query))->select();
        $this->set('importers', $importers);
    }
    
    public function admin_set_importer($id) {
        $this->autoRender = false;
        $wineId = $this->data['Wine']['id'];
        $data = array('id'=>$wineId, 'importer_id'=>$id);
        if ($this->Wine->save($data)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_change_subindex() {
        $this->autoLayout = false;
        $pid = $this->data['Wine']['index_type'];
        $this->_setSubindex($pid);
    }
    
    public function admin_upload() {
        $this->autoRender = false;
        $this->_setAttachmentComponent();
        $data = $this->params['form'];
        $this->_logoAttachment->upload($data, 'wine_logo');
        echo json_encode(array('msg'=>$data));
    }
    
    public function admin_save() {
        $this->autoRender = false;
        $sort = $this->params['form']['sort'];
        for ($i=1; $i<=5; $i++) {
            $data['media_url_'.$i] = isset($sort[$i-1]) ? $sort[$i-1] : '';
        }
        $this->Wine->id = $this->params['form']['id'];
        if ($this->Wine->save($data)) {
            echo true;
        } else {
            echo false;
        }
        
    }
    
    protected function _setDataForWine() {
        $this->set('countries', $this->Country->getList());
        $this->set('regions', $this->Region->getList());
        $this->set('wineries', $this->Winery->getList());
        $this->set('statutoryLevels', $this->StatutoryLevel->getList());
        $this->set('grapeVarieties', $this->GrapeVariety->getList());
        $this->set('tastingNotes', $this->TastingNotes->getList());
    }
    
    protected function _setSubindex($pid) {
        $this->set('subindexes', $this->Subindex->getList($pid));
    }
    
    protected function _setAttachmentComponent() {
        App::import('Component', 'Attachment');
        $this->_logoAttachment = new AttachmentComponent();
        $this->_logoAttachment->initialize($this, array(
        	'rm_tmp_file' => true,
            'origin' => false,
            'images_size' => array(
        		'wine_big' => array(282, 320, 'resize'),
                'wine_logo' => array(88, 100, 'resize'),
        		'wine_thumb' => array(48, 54, 'resize'),
            ),
        ));
    }
}