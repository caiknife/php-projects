<?php
class TopController extends AppController {
    public $uses = array(
        'HomeBanner', 'HomeEvent', 'Brand', 'Category'
    );
    
    public $components = array(
        'Attachment' => array(
        	'rm_tmp_file' => true,
            'origin' => true,
        ), 
    );
    
    /*
     * frontend goes here
     */
    
    /*
     * backend goes here
     */
    public function admin_index() {
        $this->set('home_banners', $this->HomeBanner->getAllHomeBanners());
    }
    
    public function admin_newbanner() {
        $homeBanners = $this->HomeBanner->getAllHomeBanners();
        if (sizeof($homeBanners) >= Configure::read('HomeBanner.max')) {
            $this->Session->setFlash('不能添加！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
    }
    
    public function admin_createbanner() {
        $this->HomeBanner->set($this->data['HomeBanner']);
        if ($this->HomeBanner->validates()) {
            $this->Attachment->upload($this->data['HomeBanner'], 'upload');
            $this->HomeBanner->save($this->data['HomeBanner'], false);
        } else {
            $this->render('admin_newbanner');
            return;
        }
        $this->Session->setFlash('创建成功！');
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_editbanner($id) {
        $banner =  $this->HomeBanner->where(array('id'=>$id, 'deleted'=>0))->first();
        if (!$banner) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->data = $banner;
    }
    
    public function admin_updatebanner() {
        $this->HomeBanner->set($this->data['HomeBanner']);
        if ($this->HomeBanner->validates()) {
            if ($this->data['HomeBanner']['upload']['error'] == 0) {
                $this->Attachment->upload($this->data['HomeBanner'], 'upload');
            }
            $this->HomeBanner->save($this->data['HomeBanner'], false);
        } else {
            $this->render('admin_editbanner');
            return;
        }
        $this->Session->setFlash('更新成功！');
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_deletebanner($id) {
        $this->autoRender = false;
        $this->HomeBanner->id = $id;
        if ($this->HomeBanner->saveField('deleted', true)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_sortbanner() {
        $this->autoRender = false;
        foreach($this->params['form']['sort'] as $i => $o) {
            $this->HomeBanner->id = $o;
            $this->HomeBanner->saveField('order', $i);
        }
        echo true;
    }
    
    public function admin_brands() {
        $this->Brand->recursive = -1;
        $brands = $this->Brand->where(array('deleted'=>0, 'featured'=>1))->select();
        $this->set('brands', $brands);
        
        $categories = $this->Category->getCategoriesList();
        $this->set('categories', $categories);
    }
    
    public function admin_searchbrands() {
        $this->layout = 'ajax';
        $this->Brand->recursive = -1;        
        $brands = $this->Brand->filter($this->data)->select();
        $this->set('brands', $brands);
    } 
    
    public function admin_featuredbrands($catId) {
        $this->layout = 'ajax';
        $query = array('deleted'=>0, 'featured'=>1);
        $catId ? $query['cate'] = $catId : null;
        $this->Brand->recursive = -1;
        $brands = $this->Brand->where($this->Brand->buildFilter($query))->select();
        $this->set('brands', $brands);
    }
    
    public function admin_feature() {
        //$this->autoRender = false;
        $data = $this->params['form'];
        if (isset($data['brands']) && $data['brands']) {            
            $this->Brand->feature($data['brands']);
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_unfeature($id) {
        $this->autoRender = false;
        $this->Brand->id = $id;
        if ($this->Brand->saveField('featured', false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_calendar() {
        $this->set('home_events', $this->HomeEvent->getAllHomeEvents());
    }
    
    public function admin_newevent() {
        $homeEvents = $this->HomeEvent->getAllHomeEvents();
        if (sizeof($homeEvents) >= Configure::read('HomeEvent.max')) {
            $this->Session->setFlash('不能添加！');
            $this->redirect(array('action'=>'calendar', 'admin'=>true));
        }
    }
    
    public function admin_createevent() {
        $this->HomeEvent->set($this->data['HomeEvent']);
        if ($this->HomeEvent->validates()) {
            $this->Attachment->upload($this->data['HomeEvent'], 'upload');
            $this->HomeEvent->save($this->data['HomeEvent'], false);
        } else {
            $this->render('admin_newevent');
            return;
        }
        $this->Session->setFlash('创建成功！');
        $this->redirect(array('action'=>'calendar', 'admin'=>true));
    }
    
    public function admin_editevent($id) {
        $event = $this->HomeEvent->where(array('id'=>$id, 'deleted'=>0))->first();
        if (!$event) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'calendar', 'admin'=>true));
        }
        $this->data = $event;
    }
    
    public function admin_updateevent() {
        $this->HomeEvent->set($this->data['HomeEvent']);
        if ($this->HomeEvent->validates()) {
            if ($this->data['HomeEvent']['upload']['error'] == 0) {
                $this->Attachment->upload($this->data['HomeEvent'], 'upload');
            }
            $this->HomeEvent->save($this->data['HomeEvent'], false);
        } else {
            $this->render('admin_editevent');
            return;
        }
        $this->Session->setFlash('更新成功！');
        $this->redirect(array('action'=>'calendar ', 'admin'=>true));
    }
    
    public function admin_deleteevent($id) {
        $this->autoRender = false;
        $this->HomeEvent->id = $id;
        if ($this->HomeEvent->saveField('deleted', true)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_sortevent() {
        $this->autoRender = false;
        foreach($this->params['form']['sort'] as $i => $o) {
            $this->HomeEvent->id = $o;
            $this->HomeEvent->saveField('order', $i);
        }
        echo true;
    }
    
}