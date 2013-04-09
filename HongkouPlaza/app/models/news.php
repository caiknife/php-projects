<?php
class News extends AppModel {
    public $useTable = 'news';
    
    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty',
            'message' => '请输入！',
        ),
        'date' => array(
            'rule' => 'notEmpty',
            'message' => '请输入！',
        ),
        'cat' => array(
            'rule' => 'notEmpty',
            'message' => '请输入！',
        ),
        'brief' => array(
            'rule' => 'notEmpty',
            'message' => '请输入！',
        ),
        'content' => array(
            'rule' => 'notEmpty',
            'message' => '请输入！',
        ),
        'image_upload' => array(
        	'validUpload' => array(
            	'rule' => array('_validUpload', 'image_upload', array('jpg', 'jpeg', 'png', 'gif'), array('image/jpeg', 'image/pjpeg', 'image/png', 'image/gif')),
            	'message' => '图片格式不正确！',
            ),
        ),
        'link' => array(
            'rule' => array('url', true),
            'message' => '必须是URL格式！',
            'allowEmpty' => true,
        ),
    );
    
    public function beforeSave() {
        $uploadFields = array('image');
        foreach ($uploadFields as $field) {
            if (isset($this->data[$this->name][$field.'_upload_file_path']) && $this->data[$this->name][$field.'_upload_file_path']) {
                $this->data[$this->name][$field] = $this->data[$this->name][$field.'_upload_file_path'];
            }
            if (isset($this->data[$this->name][$field.'_delete']) && $this->data[$this->name][$field.'_delete']) {
                $this->data[$this->name][$field] = '';
            }
        }
        return true;
    }
    
    public function buildFilter($arr) {
        $query = parent::buildFilter($arr);
        if (isset($arr['title']) && $arr['title']) {
            $query['title LIKE'] = '%'.$arr['title'].'%';
        }
        if (isset($arr['year']) && $arr['year']) {
            $query['date LIKE'] = $arr['year'].'%';
        }
        if (isset($arr['cat']) && $arr['cat']) {
            $query['cat'] = $arr['cat'];
        }
        return $query;
    }
}