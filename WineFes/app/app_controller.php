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
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
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
    public $components = array(
        'RequestHandler', 'Cookie', 'Email', 'Session',
    );
    
    public $helpers = array(
        'Text', 'Html', 'Session', 'Form', 'Format'
    );
    
    public function beforeFilter() {
        if (isset($this->params['admin']) && $this->params['admin']) {
            $this->_adminBeforeFilter();
        } elseif(isset($this->params['cn']) && $this->params['cn']) {
            $this->_cnFrontendBeforeFilter();
        } else {
            $this->_frontendBeforeFilter();
        }
    }
    
    protected function _adminBeforeFilter() {
        $this->layout = 'admin';
        if (!$this->Session->check('Admin.login')) {
            $this->Session->setFlash('登录超时，请重新登录！');
            //$this->redirect(array('controller'=>'home', 'action'=>'index', 'admin'=>true));
            echo '<script>parent.location="/admin";</script>';
        }
        $admin = $this->Session->read('Admin.login');
        $this->set('admin', $admin);
    }
    
    protected function _cnFrontendBeforeFilter() {
        $this->layout = 'cn_frontend';
        App::import('Model', 'Exhibitor');
        $exhibitorModel = new Exhibitor();
        $exhibitors = $exhibitorModel->order('sort ASC')->select();
        $this->set('exhibitors', $exhibitors);
        
        App::import('Model', 'Block');
        $blockModel = new Block();
        $blocks = $blockModel->getLists();
        $this->set('blocks', $blocks);
        
        App::import('Model', 'Article');
        $articleModel = new Article();
        $articles = $articleModel->getLists();
        $this->set('articles', $articles);
        
        $countdown = Configure::read('Date.countdown');
        $today = date('Y-m-d');
        $countFlg = true;
        if ($countdown > $today) {
            $diff = (int)(strtotime($countdown) - strtotime($today))/3600/24;
            $this->set('diff', $diff);
        } else {
            $countFlg = false;
        }
        $this->set('countFlg', $countFlg);
    }
    
    protected function _frontendBeforeFilter() {
        $this->layout = 'frontend';
    }
    
    protected function _encodeUrlParams($params) {
        $data = base64_encode(serialize($params));
        return str_replace(array('+', '/', '='), array('*', '-', ''), $data);
    }
    
    protected function _decodeUrlParams($params) {
        $data = str_replace(array('*', '-', ''), array('+', '/', '='), $params);
        return unserialize(base64_decode($data));
    }
    
}
