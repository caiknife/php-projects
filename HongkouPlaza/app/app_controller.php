<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @subpackage    cake.cake.libs.controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * This is a placeholder class.
 * Create the same file in app/app_controller.php
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @link http://book.cakephp.org/view/957/The-App-Controller
 */
class AppController extends Controller {    
    public $uses = array(
        'Member'
    );
    
    public $components = array(
        'RequestHandler', 'Cookie', 'Email', 'Session',
    );
    
    public $helpers = array(
        'Text', 'Html', 'Session', 'Form', 'Format'
    );
    
    public $pageTitle;

    protected $_profile;
    
    public function afterFilter() {
        if (isset($this->pageTitle) && $this->pageTitle) {
            $this->set('pageTitle', $this->pageTitle);
        }    
    }
    
    public function beforeFilter() {
        if (isset($this->params['admin']) && $this->params['admin']) {
            $this->_adminBeforeFilter();
        } else {
            $this->_frontendBeforeFilter();
        }
    }
    
    /*
     * backend before filter function
     */
    protected function _adminBeforeFilter() {
        $this->layout = 'admin';
        if (!$this->Session->check('Admin.login')) {
            $this->Session->setFlash('登录超时，请重新登录！');
            $this->redirect(array('controller'=>'home', 'action'=>'index', 'admin'=>true));
        }
        $admin = $this->Session->read('Admin.login');
        $this->set('admin', $admin);
    }
    
    /*
     * frontend before filter function
     */
    protected function _frontendBeforeFilter() {
        $this->layout = 'frontend';
        if ($this->Session->check('Member.login')) {
            $member = $this->Session->read('Member.login');
            $this->_profile = $member;
            $this->set('profile', $member);
        } elseif ($this->Cookie->read('Member.login')) {
            $id = $this->Cookie->read('Member.login');
            $this->Member->recursive = -1;
            $member = $this->Member->where(array('id'=>$id, 'deleted'=>0))->first();
            if ($member) {
                $this->Session->write('Member.login', $member);
                $this->_profile = $member;
                $this->set('profile', $member);
            }
        }

        App::import('Model', 'Block');
        $blockModel = new Block();
        $blockList = $blockModel->getList();
        $this->set('blockList', $blockList);
    }
    
    protected function _setAttachmentComponent() {
        
    }
    
    protected function _buildFilter($arr) {
        $query['deleted'] = 0;
        return $query;
    }
    
    protected function _encodeUrlParams($params) {
        $data = base64_encode(serialize($params));
        return str_replace(array('+', '/', '='), array('*', '-', ''), $data);
    }
    
    protected function _decodeUrlParams($params) {
        $data = str_replace(array('*', '-', ''), array('+', '/', '='), $params);
        return unserialize(base64_decode($data));
    }
    
    protected function _getSubscribedBrands() {
        if (!$this->_profile) {
            $this->_subscribed = array();
        } else {
            $this->Member->recursive = 1;
            $this->Member->id = $this->_profile['Member']['id'];
            $member = $this->Member->read();
            foreach ($member['Brand'] as $brand) {
                $this->_subscribed[] = $brand['id'];
            }
        }
        $this->set('subscribed', $this->_subscribed);
    }
}
