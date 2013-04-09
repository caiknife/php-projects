<?php
class Block extends AppModel {
    public function getList($lang='') {
        if (!empty($lang)) {
            $this->displayField = 'title_'.$lang;
        } else {
            $this->displayField = 'title';
        }
        return $this->order('sort ASC, id DESC')->lists();
    }
}