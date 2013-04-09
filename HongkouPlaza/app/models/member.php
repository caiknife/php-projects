<?php
class Member extends AppModel {
    public $hasAndBelongsToMany = array(
        'Brand' => array(
            'className' => 'Brand',
            'joinTable' => 'member_brand',
            'foreignKey' => 'member_id',
            'associationForeignKey'  => 'brand_id',                
            'unique' => true,                
            'conditions' => 'Brand.deleted = 0',
        )
    );
        
    protected $_csvFields = array(
        'id' => 'ID',
        'email' => '电子邮件',
        'nickname' => '昵称',
        'fullname' => '姓名',
        'gender' => '性别',
        'birthday' => '生日',
        'mobile' => '手机',
        'phone' => '座机',
        'district' => '地区',
        'address' => '地址',
        'actived' => '是否激活', 
        'last_login_time' => '最后登录时间',
        'last_login_ip' => '最后登录IP',
    );
    
    public function getMember($email, $password) {
        return $this->where(array(
            'email' => $email,
            'password' => md5($password),
            'deleted' => 0,
        ))->first();
    }
    
    public function beforeSave() {
        if (isset($this->data[$this->name]['password'])) {
            $this->data[$this->name]['password'] = md5($this->data[$this->name]['password']);
        }
        return true;
    }
    
    public function getCsvFormatData() {
        $data = parent::getCsvFormatData();
        $gender = Configure::read('Member.gender');
        $district = Configure::read('Member.district');
        foreach ($data as &$value) {
            $value['gender'] = $value['gender'] ? $gender[$value['gender']] : '';
            $value['district'] = $value['district'] ? $district[$value['district']] : '';
            $value['actived'] = $value['actived'] ? '是' : '否';
        }
        array_unshift($data, $this->_csvFields);
        return $data;
    }
    
    public function buildFilter($arr) {
        $query = parent::buildFilter($arr);
        if (isset($arr['email']) && $arr['email']) {
            $query['email LIKE'] = '%'.$arr['email'].'%';
        }
        if (isset($arr['nickname']) && $arr['nickname']) {
            $query['nickname LIKE'] = '%'.$arr['nickname'].'%';
        }
        if (isset($arr['gender']) && $arr['gender']) {
            $query['gender'] = $arr['gender'];
        }
        if (isset($arr['age']) && $arr['age']) {
            if ($arr['age'] == '<18') {
                $end_date = date('Y-m-d', strtotime('-18 years'));
                $query['birthday >='] = $end_date; 
            } elseif ($arr['age'] == '18-25') {
                $start_date = date('Y-m-d', strtotime('-25 years'));
                $end_date = date('Y-m-d', strtotime('-18 years'));
                $query['birthday BETWEEN ? AND ?'] = array($start_date, $end_date);
            } elseif ($arr['age'] == '25-35') {
                $start_date = date('Y-m-d', strtotime('-35 years'));
                $end_date = date('Y-m-d', strtotime('-25 years'));
                $query['birthday BETWEEN ? AND ?'] = array($start_date, $end_date);
            } elseif ($arr['age'] == '35-55') {
                $start_date = date('Y-m-d', strtotime('-55 years'));
                $end_date = date('Y-m-d', strtotime('-35 years'));
                $query['birthday BETWEEN ? AND ?'] = array($start_date, $end_date);
            } elseif ($arr['age'] == '>55') {
                $end_date = date('Y-m-d', strtotime('-55 years'));
                $query['birthday <='] = $end_date; 
            }
        }
        if (isset($arr['district']) && $arr['district']) {
            $query['district'] = $arr['district'];
        }
        if (isset($arr['last_login_time']) && $arr['last_login_time']) {
            if ($arr['last_login_time'] == 'today') {
                $end_date = date('Y-m-d H:i:s', strtotime('-1 day'));
            } elseif ($arr['last_login_time'] == 'week') {
                $end_date = date('Y-m-d H:i:s', strtotime('-1 week'));
            } elseif ($arr['last_login_time'] == 'month') {
                $end_date = date('Y-m-d H:i:s', strtotime('-1 month'));
            } elseif ($arr['last_login_time'] == '3months') {
                $end_date = date('Y-m-d H:i:s', strtotime('-3 months'));
            }
            $query['last_login_time >='] = $end_date;
        }
        if (isset($arr['subscribe']) && $arr['subscribe']) {            
            
        }
        return $query;
    }
}