<?php
class Event extends AppModel {
    public $hasAndBelongsToMany = array(
        'Brand' => array(
            'className' => 'Brand',
            'joinTable' => 'brand_event',
            'foreignKey' => 'event_id',
            'associationForeignKey'  => 'brand_id',                
            'unique' => true,                
            'conditions' => 'Brand.deleted = 0 AND Brand.is_display = 1',
        )
    );
    
    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty',
            'message' => '请输入！',
        ),
        'title_sub' => array(
            'rule' => 'notEmpty',
            'message' => '请输入！',
        ),
        'intro' => array(
            'rule' => 'notEmpty',
            'message' => '请输入！',
        ),
        'start_date' => array(
            'rule' => 'notEmpty',
            'message' => '请输入！',
        ),
        'end_date' => array(
            'rule' => 'notEmpty',
            'message' => '请输入！',
        ),
        'image_upload' => array(
            'isUpload' => array(
                'rule' => array('_isUpload', 'image_upload'),
                'message' => '请上传图片！',
                'on' => 'create',
            ),
        	'validUpload' => array(
            	'rule' => array('_validUpload', 'image_upload', array('jpg', 'jpeg', 'png', 'gif'), array('image/jpeg', 'image/pjpeg', 'image/png', 'image/gif')),
            	'message' => '图片格式不正确！',
            ),
        ),
        'link1' => array(
            'rule' => array('url', true),
            'message' => '必须是URL格式！',
            'allowEmpty' => true,
        ),
        'link2' => array(
            'rule' => array('url', true),
            'message' => '必须是URL格式！',
            'allowEmpty' => true,
        ),
        'link3' => array(
            'rule' => array('url', true),
            'message' => '必须是URL格式！',
            'allowEmpty' => true,
        ),
        'link4' => array(
            'rule' => array('url', true),
            'message' => '必须是URL格式！',
            'allowEmpty' => true,
        ),
        'link5' => array(
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
            $query[]['OR'] = array(
                'title LIKE' => '%'.$arr['title'].'%',
                'title_sub LIKE' => '%'.$arr['title'].'%',
            );
        }
        if (isset($arr['date']) && $arr['date']) {
            if ($arr['date'] == 1) {
                $start = date("Y-m-d",strtotime("Monday"));        //本周开始  
                $end = date("Y-m-d",strtotime("Sunday"));        //本周结束
            } elseif ($arr['date'] == 2) {
                $start = date("Y-m-01");        //本月开始  
                $end = date("Y-m-t");        //本月结束
            }
            $query[]['OR'] = array(
                'start_date <=' => $end,
                'end_date >=' => $start,
            );
        }
        if (isset($arr['day']) && $arr['day']) {
            $now = $arr['day'];
            $query[]['AND'] = array(
                'start_date <=' => $now,
                'end_date >=' => $now,
            );
        }
        if (isset($arr['cat']) && $arr['cat']) {
            $query['cat'] = $arr['cat'];
        }
        if (isset($arr['range']) && $arr['range']) {
            $date1 = date('Y-m-d', mktime(0, 0, 0, $arr['range']['month'], 1, $arr['range']['year']));
            $date2 = date('Y-m-d', mktime(0, 0, 0, $arr['range']['month'], date('t', mktime(0, 0, 0, $arr['range']['month'], 1, $arr['range']['year'])), $arr['range']['year']));
            $query[]['OR'] = array(
                'start_date <=' => $date1,
                'end_date >=' => $date2,
            );
        }
        return $query;
    }
    
    public function getRandomEvents($limit=3) {
        return $this->where(array('deleted'=>0))->order('RAND()')->limit($limit)->select();
    }
}