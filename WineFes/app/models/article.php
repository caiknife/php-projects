<?php
class Article extends AppModel {
    public function getLists() {
        return $this->where(array('is_display'=>1, 'is_menu'=>1))->order('sort ASC, id DESC')->lists();
    }
}