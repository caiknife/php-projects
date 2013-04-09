<?php
class PriceMonthly extends AppModel {
    public $useTable = 'price_monthly';
    
    public $reservedKeys = array(
    	'year', 
    	'month',
    	'wines_id',        
    );
    
    public function buildFilter($query) {
        foreach ($this->reservedKeys as $key) {
            if (isset($query[$key]) && $query[$key]) {
                $search[$this->name.'.'.$key] = $query[$key];
            }
        }
        return $search;
    }
    
    public function getYearPricesByWineId($id) {
        $results = $this->where(array('wines_id'=>$id, 'year'=>date('Y')))->order('month ASC')->select();
        $data = array(null, null, null, null, null, null, null, null, null, null, null, null, );
        if (!$results) {
            return $data;
        }
        foreach ($results as $result) {
            $data[$result['PriceMonthly']['month'] - 1] = (float)$result['PriceMonthly']['price']; 
        }
        return $data;
    }
}