<?php
class NewsType extends AppModel {
    public $useTable = 'news_type';
    
    public function getList($lang='cn') {
        if (!empty($lang)) {
            $this->displayField = 'title_'.$lang;
        } else {
            $this->displayField = 'title';
        }
        return $this->order('sort ASC, id DESC')->lists();
    }
}