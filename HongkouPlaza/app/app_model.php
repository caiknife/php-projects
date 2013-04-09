<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Application model for Cake.
 *
 * This is a placeholder class.
 * Create the same file in app/app_model.php
 * Add your application-wide methods to the class, your models will inherit them.
 *
 * @package       cake
 * @subpackage    cake.cake.libs.model
 */
class AppModel extends Model {
    
    protected $_paras = array();
    protected $_csvFields = array();
    
    public function save($data=null, $validate=true, $fieldList=array()) {
        if (isset($this->data) && isset($this->data[$this->name])) {
            unset($this->data[$this->name]['modified']);
        }
        if (isset($data) && isset($data[$this->name])) {
            unset($data[$this->name]['modified']);
        }
        return parent::save($data, $validate, $fieldList);
    }
    
    public function filter($arr) {
        $this->where($this->buildFilter($arr));
        return $this;
    }
    
    public function buildFilter($arr) {
        $query['deleted'] = 0;
        return $query;
    }
    
    public function searchByKeyword($keyword) {
        
    }
    
    /*
     * custom data query method goes here
     */
    public function relation($arr) {
        $this->_paras['recursive'] = $arr;
        return $this;
    }
    
    public function where($arr) {
        $this->_paras['conditions'] = $arr;
        return $this;
    }
    
    public function order($arr) {
        $this->_paras['order'] = $arr;
        return $this;
    }
    
    public function fields($arr) {
        $this->_paras['fields'] = $arr;
        return $this;
    }
    
    public function page($arr) {
        $this->_paras['page'] = $arr;
        return $this;
    }
    
    public function limit($arr) {
        $this->_paras['limit'] = $arr;
        return $this;
    }
    
    public function joins($arr) {
        $this->_paras['joins'] = $arr;
        return $this;
    }
    
    public function offset($arr) {
        $this->_paras['offset'] = $arr;
        return $this;
    }
    
    public function count() {
        $r = $this->find('count', $this->_paras);
        $this->_paras = array();
        return $r;
    }
    
    public function first() {
        $r = $this->find('first', $this->_paras);
        $this->_paras = array();
        return $r;
    }
    
    public function select() {
        $r = $this->find('all', $this->_paras);
        $this->_paras = array();
        return $r;
    }
    
    public function lists() {
        $r = $this->find('list', $this->_paras);
        $this->_paras = array();
        return $r;
    }
    
    public function drop($cascade=false) {
        if (!empty($this->_paras['conditions'])) {
            $r = $this->deleteAll($this->_paras['conditions'], $cascade);
        } else {
            $r = array();
        }
        $this->_paras = array();
        return $r;
    }
    
    public function getCsvFormatData() {
        $r = $this->fields(array_keys($this->_csvFields))->select();
        foreach ($r as &$value) {
            $value = $value[$this->name];
        }
        return $r;
    }
    
    /*
     * custom validaton method goes here
     */
    protected function _validUpload($data, $field, $type, $mime) {
        // do not validate when there is no image uploading
        if ($data[$field]['error'] > 0) {
            return true;
        }
        $extension = strtolower(pathinfo($data[$field]['name'], PATHINFO_EXTENSION));
        if (in_array($extension, $type) && in_array($data[$field]['type'], $mime)) {
            return true;
        }
        return false;
    }
    
    protected function _isUpload($data, $field) {
        // error > 0, no file uploaded
        if (isset($data[$field]['error']) && $data[$field]['error'] > 0) {
            return false;
        }
        return true;
    }
}
