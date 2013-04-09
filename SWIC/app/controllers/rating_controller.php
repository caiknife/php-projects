<?php
class RatingController extends AppController {
    public $uses = array(
        'TastingNotes',
    );
    
    // frontend goes here
    
    // cn frontend goes here
    public function cn_index() {
        $this->_setYear();
        
        $unrating = $this->TastingNotes->where(array('status'=>0, 'deleted'=>0, 'is_display'=>1))->order('TastingNotes.id ASC')->first();
        $this->set('unrating', $unrating);
    }
    
    public function cn_lists() {
        $year = $this->params['named']['year'];
        $this->set('year', $year);
        App::import('Model', 'TastingNotes');
        $tastingNotesModel = new TastingNotes();
        $results = $tastingNotesModel->where(array('status'=>1, 'deleted'=>0, 'is_display'=>1, 'date_time LIKE'=>$year.'%'))->order('date_time DESC')->select();
        $this->set('results', $results);
        if ($this->RequestHandler->isAjax()) {
            $this->autoLayout = false;
        } else {
            $this->_setYear();
            $this->render('cn_lists_no_ajax');
        }
    }
    
    public function cn_history() {
        $this->_setYear();
    }
    
    public function cn_detail($id) {
        $this->_setYear();
        
        $note = $this->TastingNotes->where(array('id'=>$id))->first();
        if (!$note) {
            $this->cakeError('error404');
            return;
        }
        $this->set('note', $note);
        $this->set('year', date('Y', strtotime($note['TastingNotes']['date_time'])));
        
        $wines = $this->TastingNotes->getWinesByNoteId($id);
        $this->set('wines', $wines);
    }
    
    public function cn_upcoming() {
        $this->_setYear();
        
        $unrating = $this->TastingNotes->where(array('status'=>0, 'deleted'=>0, 'is_display'=>1))->order('TastingNotes.id ASC')->first();
        $this->set('unrating', $unrating);
        
        $wines = $this->TastingNotes->getWinesByNoteId($unrating['TastingNotes']['id']);
        $this->set('wines', $wines);
    }
    
    public function cn_process() {
        $this->_setYear();
    }
    
    protected function _setYear() {
        App::import('Model', 'TastingNotes');
        $tastingNotesModel = new TastingNotes();
        $results = $tastingNotesModel->where(array('status'=>1, 'is_display'=>1))->order('date_time DESC')->select();
        $years = array();
        foreach ($results as $note) {
            $year = date('Y', strtotime($note['TastingNotes']['date_time']));
            if (!in_array($year, $years)) {
                $years[] = $year;
            }
        }
        $this->set('years', $years);
    }
    
    // backend goes here
}