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
    public $uses = array(
        'WineType', 'NewsType', 'News'
    );
    
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
        $this->setWineTypes();
        $this->setNewsTypes();
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
    
    protected function _frontendBeforeFilter() {
        $this->layout = 'frontend';
    }
    
    protected function _cnFrontendBeforeFilter() {
        $this->layout = 'cn_frontend';
        App::import('Model', 'News');
        $newsModel = new News();
        $hotNewes = $newsModel->where(array('deleted'=>0, 'is_display'=>1, 'is_feature'=>1))->order('News.sort DESC')->limit(5)->select();        
        //pr(sizeof($hotNewes));
        if (empty($hotNewes)) {
            $this->set('newsIndex', null);
            $this->set('newsScore', null);
            $this->set('newsNews', null);
        } else {
            shuffle($hotNewes);
            $newsIndex = array(
                $hotNewes[0],
                $hotNewes[1],
            );
            shuffle($hotNewes);
            $newsScore = array(
                $hotNewes[0],
                $hotNewes[1],
            );
            shuffle($hotNewes);
            $newsNews = array(
                $hotNewes[0],
                $hotNewes[1],
            );
            shuffle($hotNewes);
            $aboutNews = array(
                $hotNewes[0],
                $hotNewes[1],
            );
            $this->set('newsIndex', $newsIndex);
            $this->set('newsScore', $newsScore);
            $this->set('newsNews', $newsNews);
            $this->set('aboutNews', $aboutNews);
        }
        
        App::import('Model', 'Link');
        $linkModel = new Link();
        $links = $linkModel->where(array('is_display'=>1))->order('sort ASC, id DESC')->select();
        $this->set('links', $links);
    }
    
    protected function _encodeUrlParams($params) {
        $data = base64_encode(serialize($params));
        return str_replace(array('+', '/', '='), array('*', '-', ''), $data);
    }
    
    protected function _decodeUrlParams($params) {
        $data = str_replace(array('*', '-', ''), array('+', '/', '='), $params);
        return unserialize(base64_decode($data));
    }
    
    public function setWineTypes() {
        $this->set('wineType', $this->WineType->getList());
    }
    
    public function setNewsTypes() {
        $this->set('newsType', $this->NewsType->getList());
    }
}
