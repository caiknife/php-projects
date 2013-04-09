<?php
class BrandEvent extends AppModel {
    public $useTable = 'brand_event';
    
    public function connectEventWithBrands($data) {
        $sql = "INSERT INTO {$this->useTable} VALUES %s ON DUPLICATE KEY UPDATE id=id;";
        $save = array();
        foreach ($data as $item) {
            $save[] = sprintf("(null, %d, %d)", $item['brand_id'], $item['event_id']);
        }
        $sql = sprintf($sql, implode(', ', $save));
        return $this->query($sql);
    }
    
}