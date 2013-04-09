<?php
class BrandUnit extends AppModel {
    public $useTable = 'brand_unit';
    
    public function getBrandIdsWithUnitName($unitName) {
        App::import('Model', 'Unit');
        $unit = new Unit();
        $data = $unit->where(array('name LIKE'=>'%'.$unitName.'%', 'deleted'=>0))->select();
        $result = array();
        foreach ($data as $item) {
            $result[] = $item['Unit']['id'];
        }
        return $this->getBrandIdsWithUnitId($result);
    }
    
    public function getBrandIdsWithUnitId($unitId) {
        $data = $this->where(array('unit_id'=>$unitId))->select();
        $result = array();
        foreach ($data as $item) {
            $result[] = $item['BrandUnit']['brand_id'];
        }
        return $result;
    }
}