<?php
define('SINA_APPKEY','2441368367');
define('SINA_APPSECRET','45aa8f993c2df95f6ca7f6bcffeafc9b');

define('SINA_ACCECSS_TOKEN','6f485ff1fffaae077712c7cb326506cc');
define('SINA_ACCECSS_TOKEN_SECRET','3e5676b9a1d94722909f3826afd6c827');

class WeiboComponent extends Object {
    public $controller;
    
    public function initialize(&$controller, $config=array()) {
        App::import('vendor', 'sinaapi/libweibo/weibooauth');
        $this->controller = $controller;
    }
    
    protected function _parseWeibo($t) {
        // link URLs
        $t = ' '.preg_replace('/(([[:alnum:]]+:\/\/)|www\.)([^[:space:]]*)'.
            '([[:alnum:]#?\/&=])/i', "<a href=\"\\1\\3\\4\" target=\"_blank\">".
            "\\1\\3\\4</a>", $t);
        //link Sina users
        $t = preg_replace( "/ *@([\x{4e00}-\x{9fa5}A-Za-z0-9_]*) ?/u", " <a href=\"http://t.sina.com.cn/n/\\1\" target=\"_blank\">@\\1</a> ", $t);
        
        //link sina hot topics
        $t = preg_replace( "/ *#([\x{4e00}-\x{9fa5}A-Za-z0-9_]*)# ?/u", " <a href=\"http://t.sina.com.cn/k/\\1\" target=\"_blank\">#\\1#</a> ", $t);
    
        // truncates long urls that can cause display problems (optional)
        $t = preg_replace('/>(([[:alnum:]]+:\/\/)|www\.)([^[:space:]]'.
                '{30,40})([^[:space:]]*)([^[:space:]]{10,20})([[:alnum:]#?\/&=])'.
                '</', ">\\3...\\5\\6<", $t);
        return trim($t);
    }
    
    public function getSinaWeibo() {
        $data = array();
        $w = new WeiboClient(SINA_APPKEY, SINA_APPSECRET, SINA_ACCECSS_TOKEN, SINA_ACCECSS_TOKEN_SECRET);
        $msg  = $w->mentions();
        if($msg === false || $msg === null) {
            echo "error occured";
            return false;
        }
        if (isset($msg['error_code']) && isset($msg['error'])){
            echo ('Error_code: '.$msg['error_code'].';  Error: '.$msg['error'] );
            return false;
        }
        
        foreach ($msg as $v){
            $data[] = array(
                'created_at'     => date('Y-m-d H:i:s',strtotime($v['created_at'])),
                'text'           => $this->_parseWeibo($v['text']),
                'text_url'       => 'http://api.t.sina.com.cn/'.$v['user']['id'].'/statuses/'.$v['id'],
                'retweeted_text' => isset($v['retweeted_status']['text']) ? $this->_parseWeibo($v['retweeted_status']['text']) : '',
                'user_name'      => $v['user']['name'],
                'user_url'       => 'http://t.sina.com.cn/'.$v['user']['id'],
                'user_image'     => $v['user']['profile_image_url'], //str_replace('/50/','/30/',$v['user']['profile_image_url']),
            );
        }
        return $data;
    }
}