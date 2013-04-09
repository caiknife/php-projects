<?php
class EquipType extends AppModel {
    public $useTable = 'equip_type';
    
    public function getList($lang='') {
        if (!empty($lang)) {
            $this->displayField = 'title_'.$lang;
        } else {
            $this->displayField = 'title';
        }
        return $this->order('sort ASC, id DESC')->lists();
    }
}