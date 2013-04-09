<?php
class ReservationController extends AppController {
    public $uses = array(
        'Reservation', 'Board'
    );
    
    public $paginate = array(
        'Reservation' => array(
            'limit' => 15,
            'order' => array('Reservation.created'=>'DESC'),
        ),
    );
    
    // cn frontend goes here
    public function cn_index() {
        $this->index('cn');
    }
    
    public function en_index() {
        $this->index('en');
    }
    
    public function index($lang) {
        // board
        $board = $this->Board->where(array('type'=>'reservation'))->first();
        $this->set('board', $board);
    }
    
    public function cn_post() {
        $this->Session->setFlash('预约已提交！');
        $this->post('cn');
    }
    
    public function en_post() {
        $this->Session->setFlash('Reservation Submitted!');
        $this->post('en');
    }
    
    public function post($lang) {
        $data = $this->data['Reservation'];
        $via = array();
        $vias = Configure::read('Reservation.via');
        for ($i=1; $i<=7; $i++) {
            if ($data['via_'.$i]) {
                $via[] = $vias[$lang][$i];
            }
        }
        $data['via'] = implode('/', $via);
        $this->Reservation->save($data);
        $this->redirect(array('action'=>'index', $lang=>'true'));
    }
    // en fronend goes here
    public function admin_index() {
        // post
        if ($this->RequestHandler->isPost()) {
            $url = array('action'=>'index', 'admin'=>true);
            isset($this->data['Page']['page']) && is_numeric($this->data['Page']['page']) ? $url['page'] = $this->data['Page']['page'] : null;
            $this->redirect($url);
        }
        
        $reservations = $this->paginate('Reservation');
        $this->set('reservations', $reservations);
    }
    
    public function admin_view($id) {
        $reservation = $this->Reservation->where(array('id'=>$id))->first();
        if (!$reservation) {
            $this->Session->setFlash('数据不存在！');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
        $this->set('item', $reservation);
    }
    
    public function admin_csv() {
        $this->autoRender = false;
        $data = $this->Reservation->getCsvFormatData();
        $this->header('Content-Type: text/csv; charset=UTF8');        
        $this->header('Content-Disposition: attachment;filename=reservations_'.date('YmdHis').'.csv');
        $buffer = fopen('php://output', 'r+');
        fwrite($buffer, "\xEF\xBB\xBF");
        foreach ($data as $row) {
            fputcsv($buffer, $row);
        }
        fclose($buffer);
    }
}