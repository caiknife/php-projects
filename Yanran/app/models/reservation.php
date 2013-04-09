<?php
class Reservation extends AppModel {
    protected $_csvFields = array(
        'id' => 'ID',
        'gender' => '性别',
        'name' => '姓名',
        'birthday' => '生日',
        'city' => '城市',
        'address' => '地址',
        'post' => '邮编',
        'tel' => '座机',
        'email' => '电子邮件',
        'department' => '科室',
        'doctor' => '医生',
        'reserved_date' => '预约日期',
        'reserved_time' => '预约时间',
        'comment' => '备注',
        'via' => '途径',
        'created' => '提交时间',
    );
    
    public function getCsvFormatData() {
        $r = $this->fields(array_keys($this->_csvFields))->select();
        foreach ($r as &$value) {
            $value = $value[$this->name];
            $value['created'] = date('Y年m月d日 H:i', strtotime($value['created']));
            $value['reserved_date'] = date('Y年m月d日', strtotime($value['reserved_date']));
        }
        array_unshift($r, $this->_csvFields);
        return $r;
    }
}