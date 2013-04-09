<?php
class Block extends AppModel {
    public function getList() {
        return $this->order('sort ASC, id DESC')->lists();
    }
}