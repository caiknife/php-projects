<?php
class UnitsController extends AppController {
    public $uses = array ('Unit');
    
    //frontend goes here
    
    //backend goes here
    
    public function admin_mock() {
        $this->Unit->clearTable();
        $i = 1; $units = array();
        foreach (range('A', 'Z') as $char) {
            foreach (range(1, 100) as $number) {
                $units[] = array(
                    'id' => $i++,
                    'name' => $char.$number,
                );
            }
        }
        $this->Unit->saveAll($units);
    }
}