<?php
class BrandCategory extends AppModel {
    public $useTable = 'brand_category';
    
    public function getBrandIdsWithCategoryId($categoryId) {
        $data = $this->where(array('category_id'=>$categoryId))->select();
        $result = array();
        foreach ($data as $item) {
            $result[] = $item['BrandCategory']['brand_id'];
        }
        return $result;
    }
}