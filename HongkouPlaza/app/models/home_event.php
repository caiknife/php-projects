<?php
class HomeEvent extends AppModel {
    public $validate = array(
        'upload' => array(
            'isUpload' => array(
                'rule' => array('_isUpload', 'upload'),
                'message' => '请上传图片！',
                'on' => 'create',
            ),
        	'validUpload' => array(
            	'rule' => array('_validUpload', 'upload', array('jpg', 'jpeg', 'png', 'gif'), array('image/jpeg', 'image/pjpeg', 'image/png', 'image/gif')),
            	'message' => '图片格式不正确！',
            ),
        ),
    	'url' => array(
            'rule' => array('url', true),
            'message' => '必须是URL格式！',
            'allowEmpty' => true,
        ),
    );
    
    public function beforeSave() {
        if (isset($this->data[$this->name]['upload_file_path']) && $this->data[$this->name]['upload_file_path']) {
            $this->data[$this->name]['image'] = $this->data[$this->name]['upload_file_path'];
        }
        return true;
    }
    
    public function getAllHomeEvents($limit=0) {
        $data = $this->where(array('deleted'=>0))->order('order ASC')->select();
        if ($limit > 0) {
            return array_slice($data, 0, $limit);
        } else {
            return $data;
        }  
    }
}