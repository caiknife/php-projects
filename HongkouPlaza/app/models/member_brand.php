<?php
class MemberBrand extends AppModel {
    public $useTable = 'member_brand';
    
    public function connectMemberWithBrands($data) {
        $sql = "INSERT INTO {$this->useTable} VALUES %s ON DUPLICATE KEY UPDATE id=id;";
        $save = array();
        foreach ($data as $item) {
            $save[] = sprintf("(null, %d, %d)", $item['member_id'], $item['brand_id']);
        }
        $sql = sprintf($sql, implode(', ', $save));
        return $this->query($sql);
    }
}