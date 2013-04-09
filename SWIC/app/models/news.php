<?php
class News extends AppModel {
    public $useTable = 'news';
    
    public $reservedKeys = array(
        'is_display', 
        'type_id',
        'is_feature'
    );
    
    public function buildFilter($query) {
        $search = parent::buildFilter();
        foreach ($this->reservedKeys as $key) {
            if (isset($query[$key]) && $query[$key]) {
                $search[$this->name.'.'.$key] = $query[$key];
            }
        }
        return $search;
    }
    
    public function beforeSave() {
        if (isset($this->data[$this->name]['article_date']) && empty($this->data[$this->name]['article_date'])) {
            $this->data[$this->name]['article_date'] = date('Y-m-d');
        }
        if (isset($this->data[$this->name]['news_logo_file_path']) && !empty($this->data[$this->name]['news_logo_file_path'])) {
            $this->data[$this->name]['media_url_list'] = $this->data[$this->name]['news_logo_file_path'];
        }
        if (isset($this->data[$this->name]['news_big_file_path']) && !empty($this->data[$this->name]['news_big_file_path'])) {
            $this->data[$this->name]['media_url_big'] = $this->data[$this->name]['news_big_file_path'];
        }
        return true;
    }
}