<?php
class IndexCenter extends AppModel {
    public $useTable = 'index_center';
    
    public $reservedKeys = array(
    	'index_type', 
    	'index_sub_id',
        'year',
    );
    
    public function buildFilter($query) {
        $search = parent::buildFilter(array());
        if (isset($query['type']) && $query['type']) {
            $search['index_type'] = $query['type'];
        }
        foreach ($this->reservedKeys as $key) {
            if (isset($query[$key]) && $query[$key]) {
                $search[$this->name.'.'.$key] = $query[$key];
            }
        }
        return $search;
    }
    
    public function getMonthlyPriceTotalAndBenchmarkPriceTotal($query) {
        $monthlyPriceTotal = $this->getMonthlyPriceTotal($query);
        $benchmarkPriceTotal = $this->getBenchmarkPriceTotal($query);
        return array(
            'price_monthly' => sprintf('%.2f', $monthlyPriceTotal),
            'price_benchmark' => sprintf('%.2f', $benchmarkPriceTotal),
        );
    }
    
    public function getBenchmarkPriceTotal($query) {
		App::import('Model', 'Wine');
        $wine = new Wine();
        $wine->recursive = -1;
        $search = array(
            'index_type' => $query['index_type'],
            'index_sub_id' => $query['index_sub_id'],
            'is_display' => 1,
        );
        $wines = $wine->where($wine->buildFilter($search))->select();
        if (!$wines) {
            return 0;
        } else {
            $wineIds = array();
            foreach($wines as $item) {
                $wineIds[] = $item['Wine']['id'];
            }
            $search = array(
                'wines_id' => $wineIds,
                'year' => $query['year'],
                'month' => $query['month'],
            );
            App::import('Model', 'PriceMonthly');
            $priceMonthly = new PriceMonthly();
            $prices = $priceMonthly->where($priceMonthly->buildFilter($search))->select();
            if (!$prices) {
                return 0;
            } else {
                $wineIds = array();
                foreach ($prices as $item) {
                     $wineIds[] = $item['PriceMonthly']['wines_id'];
                }
				$search = array(
					'id' => $wineIds,
				    'deleted' => 0,
				    'is_display' => 1,
				);
				$wines = $wine->where($search)->select();
                $total = 0;
				foreach($wines as $item) {
					if(!empty($item['Wine']['benchmark_price'])) {
						$total += $item['Wine']['benchmark_price'];
					}
				}
				return $total;
            }
        }
    }
    
    public function getMonthlyPriceTotal($query) {
        App::import('Model', 'Wine');
        $wine = new Wine();
        $wine->recursive = -1;
        $search = array(
            'index_type' => $query['index_type'],
            'index_sub_id' => $query['index_sub_id'],
            'is_display' => 1,
        );
        $wines = $wine->where($wine->buildFilter($search))->select();
        if (!$wines) {
            return 0;
        } else {
            $wineIds = array();
            foreach($wines as $item) {
                $wineIds[] = $item['Wine']['id'];
            }
            $search = array(
                'wines_id' => $wineIds,
                'year' => $query['year'],
                'month' => $query['month'],
            );
            App::import('Model', 'PriceMonthly');
            $priceMonthly = new PriceMonthly();
            $prices = $priceMonthly->where($priceMonthly->buildFilter($search))->select();
            if (!$prices) {
                return 0;
            } else {
                $total = 0;
                foreach ($prices as $item) {
                    $total += $item['PriceMonthly']['price'];
                }
                return $total;
            }
        }
    }
    
    public function getIndex($type, $subtype, $year=null) {
        if (!$year) {
            $year = date('Y');
        }
        $indexes = $this->where($this->buildFilter(array('index_type'=>$type, 'index_sub_id'=>$subtype, 'year'=>$year)))->select();
        if (!$indexes) {
            return array(null,null,null,null,null,null,null,null,null,null,null,null);
        }
        $prices = array();
        foreach ($indexes as $index) {
            $prices[$index['IndexCenter']['month']] = $index['IndexCenter'];
        }
        $data = array();
        for ($i=1; $i<=12; $i++) {
            if (isset($prices[$i]) && !empty($prices[$i]['price_monthly']) && !empty($prices[$i]['price_benchmark'])) {
                $data[] = round($prices[$i]['price_monthly'] / $prices[$i]['price_benchmark'] * 100,2);
            } else {
                $data[] = null;
            }
        }
        return $data;
    }
    
    public function getYears($type, $subtype) {
        $indexes = $this->where(array('index_type'=>$type, 'index_sub_id'=>$subtype))->order('year DESC')->select();
        $result = array();
        foreach ($indexes as $index) {
            if (!in_array($index['IndexCenter']['year'], $result)) {
                $result[] = $index['IndexCenter']['year'];
            }
        }
        return $result;
    }
}