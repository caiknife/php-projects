<?php
class Block extends AppModel {
    public function getLists() {
        return $this->where(array('is_display'=>1))->order('sort ASC, id DESC')->lists();
    }
}