<?php
class AboutController extends AppController {
    public $uses = array(
        'Partner', 'ReviewTeam',
    );
    
    // frontend goes here
    
    // cn frontend goes here
    public function cn_index() {
        
    }
    
    public function cn_department() {
        $teamType = Configure::read('ReviewTeam.type');
        $this->set('teamType', $teamType);
        $results = array();
        foreach ($teamType as $key=>$val) {
            $results[$key] = $this->ReviewTeam->where(array('is_display'=>1, 'type_id'=>$key))->order('sort ASC')->select();
        }
        $this->set('results', $results);
    }
    
    public function cn_partners() {
        $teamType = Configure::read('Partner.type');
        $this->set('teamType', $teamType);
        $results = array();
        foreach ($teamType as $key=>$val) {
            $results[$key] = $this->Partner->where(array('is_display'=>1, 'type_id'=>$key))->order('sort ASC')->select();
        }
        $this->set('results', $results);
    }
}