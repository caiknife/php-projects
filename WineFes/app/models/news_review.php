<?php
class NewsReview extends AppModel {
    public $useTable = 'news_reviews';
    
    public function getAllReviews() {
        return $this->order('year DESC, month DESC')->select();
    }
    
    public function getDateRange($year, $month) {
        $item = $this->where(array(
            'OR' => array(
                'AND' => array('year'=>$year, 'month <'=>$month),
                array('year <'=>$year),
            )
        ))->order('year DESC, month DESC')->first();
        if (!$item) {
            $range = array(
                'start' => null,
                'end' => date('Y-m-d', mktime(0, 0, 0, $month, date('t', mktime(0, 0, 0, $month, 1, $year)), $year)),
            );
        } else {
            $range = array(
                'start' => date('Y-m-d', mktime(0, 0, 0, $item['NewsReview']['month']+1, 1, $item['NewsReview']['year'])),
                'end' => date('Y-m-d', mktime(0, 0, 0, $month, date('t', mktime(0, 0, 0, $month, 1, $year)), $year)),
            );
        }
        return $range;
    }
}