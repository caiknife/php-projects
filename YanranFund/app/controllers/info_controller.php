<?php
class InfoController extends AppController {
    public $uses = array(
        'News', 
        'Album', 'Photo', 
        'Media', 
        'Topic',
    );
    
    public $paginate = array(
        'News' => array(
            'limit' => 15,
            'order' => array('News.public_date'=>'DESC', 'News.created'=>'DESC'),
        ),
        'Media' => array(
            'limit' => 15,
            'order' => array('Media.media_date'=>'DESC', 'Media.created'=>'DESC'),
        ),
        'Topic' => array(
            'limit' => 15,
            'order' => array('Topic.topic_date'=>'DESC', 'Topic.created'=>'DESC'),
        ),
    );
    
	public function cn_index() {
		$this->index('cn');
	}
	
	public function en_index() {
		$this->index('en');
	}
	
	public function index($lang) {
		$this->redirect(array('action'=>'news'));
	}
	
    public function cn_news() {
        $this->news('cn');
    }
    
    public function en_news() {
        $this->news('en');
    }
    
    public function news($lang) {
        $this->News->recursive = -1;
        $newses = $this->paginate('News', $this->News->buildFilter(array('is_display'=>1, 'is_public'=>1, 'lang'=>$lang)));
        $this->set('newses', $newses);
    }
    
    public function cn_viewnews($id) {
        $this->viewnews('cn', $id);
    }
    
    public function en_viewnews($id) {
        $this->viewnews('en', $id);
    }
    
    public function viewnews($lang, $id) {
        $news = $this->News->where(array('id'=>$id, 'lang'=>$lang, 'is_public'=>1))->first();
        if (!$news) {
            $this->cakeError('error404');
            return; 
        }
        $this->set('news', $news);
        $relativeNews = $this->News->getRelativeNews($id, $lang, $news['Project']);
        $this->set('relativeNews', $relativeNews);
    }
    
    public function cn_media() {
        $this->media('cn');
    }
    
    public function en_media() {
        $this->media('en');
    }
    
    public function media($lang) {
        $medias = $this->paginate('Media', $this->Media->buildFilter(array('is_display'=>1, 'lang'=>$lang)));
        $this->set('medias', $medias);
    }
    
    public function cn_topic() {
        $this->topic('cn');
    }
    
    public function en_topic() {
        $this->topic('en');
    }
    
    public function topic($lang) {
        $topics = $this->paginate('Topic', $this->Topic->buildFilter(array('is_display'=>1, 'lang'=>$lang)));
        $this->set('topics', $topics);
    }
    
    public function cn_album() {
        $this->album('cn');
    }
    
    public function en_album() {
        $this->album('en');
    }
    
    public function album($lang) {
        $this->Album->recursive = -1;
        $albums = $this->Album->where(array('is_display'=>1))->order('sort ASC, id DESC')->select();
        $this->set('albums', $albums);
    }
    
    public function cn_viewalbum($id) {
        $this->viewalbum('cn', $id);
    }
    
    public function en_viewalbum($id) {
        $this->viewalbum('en', $id);
    }
    
    public function viewalbum($lang, $id) {
        $album = $this->Album->where(array('id'=>$id))->first();
        if (!$album) {
           $this->cakeError('error404');
           return;
        }
        $this->set('album', $album);
    }
 }