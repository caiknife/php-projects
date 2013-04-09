<?php
// @filename   template.php
// @version    0.0.3
// @author     xwk
// @contact    soft@pop4u.net
// @update     2008-6-9
// @comment    PHP template for Editplus4PHP

//这2个是龙之梦的key
define('SINA_APPKEY','2441368367');
define('SINA_APPSECRET','45aa8f993c2df95f6ca7f6bcffeafc9b');


//下面2个是我的key,等龙之梦帐号来了,我去申请他们的key
define('SINA_ACCECSS_TOKEN','d34ac53024e0f5790c6cbe58c42d7b34');
define('SINA_ACCECSS_TOKEN_SECRET','05bf40d91e9b241c77f4fdb3cbadc1f6');


get_sina_weibo();
/**
 * 得到新浪微博信息
 */
function get_sina_weibo(){
    $data = array();
    $data['SinaMessage'] = array();
    $param_name = 'top_index_sinamessage';
    include('vendors\sinaapi\libweibo\weibooauth.php');
    $w = new WeiboClient(SINA_APPKEY,SINA_APPSECRET,SINA_ACCECSS_TOKEN,SINA_ACCECSS_TOKEN_SECRET);
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
        $data['SinaMessage'][] = array(
            'created_at'=>date('Y-m-d H:i:s',strtotime($v['created_at'])),
            'text'=>parse_weibo($v['text']),
            'text_url'=>'http://api.t.sina.com.cn/'.$v['user']['id'].'/statuses/'.$v['id'],
            'retweeted_text'=>isset($v['retweeted_status']['text'])?parse_weibo($v['retweeted_status']['text']):'',
            'user_name'=>$v['user']['name'],
            'user_url'=>'http://t.sina.com.cn/'.$v['user']['id'],
            'user_image'=>str_replace('/50/','/30/',$v['user']['profile_image_url']),
        );
    }
    print_r($data);
}
function parse_weibo($t){
    // link URLs
    $t = " ".preg_replace( "/(([[:alnum:]]+:\/\/)|www\.)([^[:space:]]*)".
        "([[:alnum:]#?\/&=])/i", "<a href=\"\\1\\3\\4\" target=\"_blank\">".
        "\\1\\3\\4</a>", $t);
    //link Sina users
    $t = preg_replace( "/ *@([\x{4e00}-\x{9fa5}A-Za-z0-9_]*) ?/u", " <a href=\"http://t.sina.com.cn/n/\\1\" target=\"_blank\">@\\1</a> ", $t);
    
    //link sina hot topics
    $t = preg_replace( "/ *#([\x{4e00}-\x{9fa5}A-Za-z0-9_]*)# ?/u", " <a href=\"http://t.sina.com.cn/k/\\1\" target=\"_blank\">#\\1#</a> ", $t);

    // truncates long urls that can cause display problems (optional)
    $t = preg_replace("/>(([[:alnum:]]+:\/\/)|www\.)([^[:space:]]".
            "{30,40})([^[:space:]]*)([^[:space:]]{10,20})([[:alnum:]#?\/&=])".
            "</", ">\\3...\\5\\6<", $t);
    return trim($t);
}
?>