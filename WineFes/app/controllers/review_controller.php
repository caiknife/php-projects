<?php
class ReviewController extends AppController {
    public $uses = array(
        'News', 'NewsReview',
        'Activity', 'ActivityReview',
    );
    
    public $paginate = array(
        'News' => array(
            'limit' => 15,
            'order' => array('News.news_date'=>'DESC', 'News.created'=>'DESC'),
        ),
        'Activity' => array(
            'limit' => 8,
            'order' => array('Activity.activity_date'=>'DESC', 'Activity.created'=>'DESC'),
        ),
    );
    
    protected function _groupNewsByMonth($newses) {
        $groupedNews = array();
        foreach ($newses as $news) {
            $key = date('Y年m月', strtotime($news['News']['news_date']));
            $groupedNews[$key][] = $news['News'];
        }
        return $groupedNews;
    }
    
    public function cn_index() {
        $this->redirect(array('action'=>'news', 'cn'=>true));
    }
    
    public function cn_news($id=null) {
        $reviews = $this->NewsReview->getAllReviews();
        $this->set('reviews', $reviews);
        
        if (!$id) {
            $firstReview = $reviews[0];
            $id = $firstReview['NewsReview']['id'];        
        }
        $this->set('id', $id);
        
        foreach ($reviews as $review) {
            if ($id == $review['NewsReview']['id']) {
                $currentReview = $review['NewsReview'];
                break;
            }
        }
        $range = $this->NewsReview->getDateRange($currentReview['year'], $currentReview['month']);
        
        $newses = $this->paginate('News', $this->News->buildFilter(array_merge($range, array('is_display'=>1))));
        $groupedNews = $this->_groupNewsByMonth($newses);
        $this->set('groupedNews', $groupedNews);
        
    }
    
    public function cn_activity($id=null) {
        $reviews = $this->ActivityReview->getAllReviews();
        $this->set('reviews', $reviews);
        
        if (!$id) {
            $firstReview = $reviews[0];
            $id = $firstReview['ActivityReview']['id'];        
        }
        $this->set('id', $id);
        
        foreach ($reviews as $review) {
            if ($id == $review['ActivityReview']['id']) {
                $currentReview = $review['ActivityReview'];
                break;
            }
        }
        $range = $this->ActivityReview->getDateRange($currentReview['year'], $currentReview['month']);
        
        $activities = $this->paginate('Activity', $this->Activity->buildFilter(array_merge($range, array('is_display'=>1))));
        $this->set('activities', $activities);
    }
}