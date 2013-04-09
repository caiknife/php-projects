<?php
class EventsController extends AppController {
    public $uses = array(
        'BrandEvent', 
        'Brand', 
        'Event', 
    );
    
    public $paginate = array(
        'Event' => array(
            'limit' => 12,
            'order' => array('modified'=>'DESC'),
        ),
    );
    
    protected $_imageAttachment;
    protected $_events;
    
    /*
     * frontend goes here
     */
    public function index() {
        if ($this->RequestHandler->isAjax()) {
            $this->autoLayout = false;
        }
        $query = $this->params['named'];
        $year = isset($query['year']) && $query['year'] ? $query['year'] : date('Y');
        $month = isset($query['month']) && $query['month'] ? $query['month'] : date('n'); 
        $range = $month <= 6 ? range(1, 6) : range(7 ,12);
        foreach ($range as &$value) {
            $value = array(
                'year' => $year, 'month' => $value, 'selected' => $value==$month ? true : false,
            );
        }
        $this->set('range', $range);
        $this->_getEventsByMonth($year, $month);
        $this->_setCalendar($year, $month);
    }
    
    public function lists() {
        if ($this->RequestHandler->isAjax()) {
            $this->autoLayout = false;
        }
        $query = $this->params['named'];
        unset($query['page']);
        $this->paginate['Event'] = array('limit'=>9, 'order'=>array('created'=>'DESC'));
        $this->Event->recursive = -1;
        $events = $this->paginate('Event', $this->Event->buildFilter($query));
        $this->set('events', $events);
    }
    
    public function now() {
        if ($this->RequestHandler->isAjax()) {
            $this->autoLayout = false;
        }
        $query = $this->params['named'];
        unset($query['page']);
        if (!isset($query['day'])) {
            $query['day'] = date('Y-m-d');
        }
        $this->paginate['Event'] = array('limit'=>9, 'order'=>array('created'=>'DESC'));
        $this->Event->recursive = -1;
        $events = $this->paginate('Event', $this->Event->buildFilter($query));
        $this->set('events', $events);
    }
    
    public function review() {
        if ($this->RequestHandler->isAjax()) {
            $this->autoLayout = false;
        }
        $query = $this->params['named'];
        $year = isset($query['year']) && $query['year'] ? $query['year'] : date('Y');
        $month = isset($query['month']) && $query['month'] ? $query['month'] : date('n');
        $this->set('year', $year);
        $this->set('month', $month);
        $this->_getEventsByMonth($year, $month); 
        $this->_setCalendar($year, $month);
        $this->_setNeighbours($year, $month);
    }
    
    public function calendar() {
        $this->autoRender = false;
        $this->Event->recursive = -1;
        $events = $this->Event->where(array('deleted'=>0))->select();
        $date = array();
        foreach ($events as $event) {
            $date[] = array(
                date('Ymd', strtotime($event['Event']['start_date'])),
                date('Ymd', strtotime($event['Event']['end_date'])),
            );
        }
        echo json_encode($date);
    }
    
    public function detail($id) {
        $referer = $this->referer('/', true);
        if (strpos($referer, 'http')===false) {            
            $this->layout = 'popup';
            $this->tpl = 'detail';
        } else {
            $this->layout = 'frontend';
            $this->tpl = 'detail_share';
        }
        $this->Event->recursive = -1;
        $event = $this->Event->where(array('id'=>$id, 'deleted'=>0))->first();
        if (!$event) {
            $this->cakeError('error404');
            return;
        }
        $this->params['named']['cat'] = $event['Event']['cat'];
        $this->set('event', $event);
        $this->render($this->tpl);
    }
    
    protected function _getEventsByMonth($year, $month) {
        $this->_events = $this->Event->filter(array('range'=>array('year'=>$year, 'month'=>$month)))->select();
    }
    
    protected function _setCalendar($year, $month) {
        $calendar = array();
        foreach (range(1, date('t', mktime(0, 0, 0, $month, 1, $year))) as $day) {
            $calendar[] = array(
                'year' => $year, 'month' => $month, 'day' => $day, 
                'weekday' => date('N', mktime(0, 0, 0, $month, $day, $year)), 'date' => date('Y-m-d', mktime(0, 0, 0, $month, $day, $year)),
                'available' => true,
                'events' => $this->_getEvents(date('Y-m-d', mktime(0, 0, 0, $month, $day, $year))),
                'today' => date('Y-m-d', mktime(0, 0, 0, $month, $day, $year)) == date('Y-m-d') ? true : false,      
            );
        }
        $first = $calendar[0];
        $last = end($calendar);
        for ($i=$first['weekday']-1, $n=1; $i>=0; $i--) {
            $thatDay = strtotime('-'.$n++.' days', strtotime($first['date']));
            $date = array(
                'year' => date('Y', $thatDay), 'month' => date('n', $thatDay), 'day' => date('j', $thatDay), 
                'weekday' => date('N', $thatDay), 'date' => date('Y-m-d', $thatDay),
                'available' => false,
                'events' => array(),
                'today' => false,
            );
            array_unshift($calendar, $date);
        }
        for ($i=$last['weekday']+1, $n=1; $i<=6; $i++) {
            $thatDay = strtotime('+'.$n++.' days', strtotime($last['date']));
            $date = array(
                'year' => date('Y', $thatDay), 'month' => date('n', $thatDay), 'day' => date('j', $thatDay), 
                'weekday' => date('N', $thatDay), 'date' => date('Y-m-d', $thatDay),
                'available' => false,
                'events' => array(),
                'today' => false,
            );
            array_push($calendar, $date);
        }
        $this->set('calendar', $calendar);
    }
    
    protected function _setNeighbours($year, $month) {
        $nowYear = date('Y'); $nowMonth = date('n');
        $nextMonthAvailable = $nowYear <= $year && $nowMonth <= $month ? false : true;
        $thatMonth = strtotime('-1 month', mktime(0, 0, 0, $month, 1, $year));
        $prevMonth = array(
            'year' => date('Y', $thatMonth), 'month' => date('n', $thatMonth), 'available' => true,
        );
        $thatMonth = strtotime('+1 month', mktime(0, 0, 0, $month, 1, $year));
        $nextMonth = array(
            'year' => date('Y', $thatMonth), 'month' => date('n', $thatMonth), 'available' => $nextMonthAvailable,
        );
        $this->set('prev_month', $prevMonth);
        $this->set('next_month', $nextMonth);
    }
    
    protected function _getEvents($date) {
        $events = array();
        $i = 0;
        foreach ($this->_events as $event) {
            if ($event['Event']['start_date'] <= $date && $date <= $event['Event']['end_date']) {
                $events[] = $event;
                if (++$i >= 3) {
                    break;    
                }
            }
        }
        
        return $events;
    }
    
    /*
     * backend goes here
     */
    
    public function admin_index() {
        if ($this->RequestHandler->isPost()) {
            $this->redirect(array('action'=>'search', 'admin'=>true, 'query'=>($this->_encodeUrlParams($this->data['Event']))));
        }
        $this->Event->recursive = -1;
        $events = $this->paginate('Event', array('deleted'=>0));
        $this->set('events', $events);
    }
    
    public function admin_search() {
        $query = $this->_decodeUrlParams($this->params['named']['query']);
        $this->data['Event'] = $query;
        $this->Event->recursive = -1;
        $events = $this->paginate('Event', $this->Event->buildFilter($query));
        $this->set('events', $events);
        $this->render('admin_index');
    }
    
    public function admin_new() {
        
    }
    
    public function admin_create() {
        $this->Event->set($this->data);
        if ($this->Event->validates()) {
            $this->_setAttachmentComponent();
            $this->_imageAttachment->upload($this->data['Event'], 'image_upload');
            $this->Event->save($this->data, false);
        } else {
            $this->render('admin_new');
            return;
        }
        $this->Session->setFlash('创建成功！');
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_edit($id) {
        $this->Event->hasAndBelongsToMany['Brand']['conditions'] = 'Brand.deleted = 0';
        $event = $this->Event->where(array('id'=>$id, 'deleted'=>0))->first();
        if (!$event) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->data = $event;
        $this->set('event_id', $event['Event']['id']);
        $this->set('brands', $event['Brand']);
    }
    
    public function admin_update() {
        $this->Event->set($this->data);
        if ($this->Event->validates()) {
            $this->_setAttachmentComponent();
            $this->_imageAttachment->upload($this->data['Event'], 'image_upload');
            $this->Event->save($this->data, false);
        } else {
            $this->render('admin_new');
            return;
        }
        $this->Session->setFlash('更新成功！');
        $this->redirect(array('action'=>'index', 'admin'=>true));
    }
    
    public function admin_delete($id) {
        $this->autoRender = false;
        $this->Event->id = $id;
        if ($this->Event->saveField('deleted', true)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    public function admin_searchbrands() {
        $this->layout = 'ajax';
        $this->Brand->recursive = -1;
        $eventId = $this->data['Event']['id'];
        $this->_setBrandsForEvent($eventId);
        $brands = $this->Brand->filter($this->data['Brand'])->select();
        $this->set('brands', $brands);
    }
    
    protected function _setBrandsForEvent($eventId) {
        $event = $this->Event->read(null, $eventId);
        $relatedBrands = array();
        foreach ($event['Brand'] as $brand) {
            $relatedBrands[] = $brand['id'];
        }   
        $this->set('related_brands', $relatedBrands);
    }
    
    public function admin_connect() {
        $this->layout = 'ajax';
        $data = $this->params['form'];
        $eventId = $data['event'];
        if (isset($data['brands']) && $data['brands']) {
            $save = array();
            foreach ($data['brands'] as $brandId) {                
                $save[] = array('brand_id'=>$brandId, 'event_id'=>$eventId);
            }
            $this->BrandEvent->connectEventWithBrands($save);
        }
        $this->set('event_id', $eventId);
        $this->set('brands', $this->_getBrandsForEvent($eventId));
    }
    
    public function admin_deleterelation($brandId, $eventId) {
        $this->autoRender = false;
        if (!$brandId || !$eventId) {
            echo false;
        }
        $data = $this->BrandEvent->where(array('brand_id'=>$brandId, 'event_id'=>$eventId))->first();
        if ($this->BrandEvent->delete($data['BrandEvent']['id'], false)) {
            echo true;
        } else {
            echo false;
        }
    }
    
    protected function _getBrandsForEvent($eventId) {
        $this->Event->id = $eventId;
        $event = $this->Event->read();
        return $event['Brand'];
    }
    
    protected function _getSearhBrandsQuery($arr) {
        $query = array('deleted'=>0);
        if ($arr['title']) {
            $query[]['OR'] = array(
                'title LIKE' => '%'.$arr['title'].'%',
                'title_en LIKE' => '%'.$arr['title'].'%',
            );
        }
        if ($arr['cate']) {
            $query[]['OR'] = array(
                'cat_main' => $arr['cate'],
                'cat_sub' => $arr['cate'],
            );
        }
        if ($arr['floor']) {
            $query['floor'] = $arr['floor'];
        }
        if ($arr['guide_id']) {
            $query['guide_id LIKE'] = '%'.$arr['guide_id'].'%';
        }
        return $query;
    }
    
    protected function _setAttachmentComponent() {
        App::import('Component', 'Attachment');
        $this->_imageAttachment = new AttachmentComponent();
        $this->_imageAttachment->initialize($this, array(
            'rm_tmp_file' => true,
            'origin' => false,
            'images_size' => array(
                'event_image' => array(670, 315, 'resizeCrop'),
        		'event_image_thumb' => array(225, 105, 'resizeCrop'),
            ),
        ));
    }
}