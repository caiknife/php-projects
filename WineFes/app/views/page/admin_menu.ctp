<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>上海酒节 网站管理系统</title>
<?php echo $this->Html->meta(array('name'=>'robots', 'content'=>'noindex, nofollow'))?>
<?php echo $this->Html->css('admin/style', 'stylesheet', array('media'=>'screen'));?>
<?php echo $this->Html->script(array('jquery-1.7.2.min', 'jquery-ui-1.8.19.custom.min', 'jquery.tooltip.pack'));?>
<style>
html,body {height:100%}
body {background:#DFE1E3; height:100%; border-right:#ccc 1px solid}
</style>
<script type="text/javascript">
<!--
$(document).ready(function() {
    $('#menu dd,#menu dt').click(function(){
        $('#menu dd,#menu dt').removeClass('curr');
        $(this).addClass('curr');
    });
});
//-->
</script>
</head>
<body>
<div id="menu">
    <dl>
        <dt><span>首页</span></dt>
        <dd><a href="<?php echo $this->Html->url(array('controller'=>'banner', 'action'=>'index', 'admin'=>'true'))?>" target="main">KV</a></dd>
        <dd><a href="<?php echo $this->Html->url(array('controller'=>'guest', 'action'=>'index', 'admin'=>'true'))?>" target="main">应邀嘉宾</a></dd>
        <dd><a href="<?php echo $this->Html->url(array('controller'=>'exhibitor', 'action'=>'index', 'admin'=>'true'))?>" target="main">参展商LOGO</a></dd>
        <dd><a href="<?php echo $this->Html->url(array('controller'=>'article', 'action'=>'index', 'admin'=>'true', 'organization'))?>" target="main">酒节组织机构</a></dd>
    </dl>
    <hr />
    <dl>
        <dt><a href="<?php echo $this->Html->url(array('controller'=>'overview', 'action'=>'index', 'admin'=>'true'))?>" target="main">酒节概述</a></dt>
        <dd><a href="<?php echo $this->Html->url(array('controller'=>'plan', 'action'=>'index', 'admin'=>'true'))?>" target="main">展位平面图</a></dd>
    </dl>
    <hr />
    <dl>
        <dt><a href="<?php echo $this->Html->url(array('controller'=>'news', 'action'=>'add', 'admin'=>true))?>" target="main">写新闻</a></dt>
        <dd><a href="<?php echo $this->Html->url(array('controller'=>'news', 'action'=>'index', 'admin'=>true))?>" target="main">全部新闻</a></dd>
        <?php foreach(Configure::read('News.type') as $key=>$val):?>
        <dd><a href="<?php echo $this->Html->url(array('controller'=>'news', 'action'=>'index', 'admin'=>true, 'type'=>$key))?>" target="main"><?php echo h($val)?></a></dd>
        <?php endforeach;?>
        <dd><a href="<?php echo $this->Html->url(array('controller'=>'news', 'action'=>'review', 'admin'=>true))?>" target="main">历届回顾</a></dd>
    </dl>
    <hr />
    <dl>
        <dt><a href="<?php echo $this->Html->url(array('controller'=>'activity', 'action'=>'add', 'admin'=>'true'))?>" target="main">写活动</a></dt>
        <dd><a href="<?php echo $this->Html->url(array('controller'=>'activity', 'action'=>'index', 'admin'=>'true'))?>" target="main">本届酒节活动</a></dd>
        <dd><a href="<?php echo $this->Html->url(array('controller'=>'activity', 'action'=>'review', 'admin'=>'true'))?>" target="main">历届酒节活动</a></dd>
    </dl>
    <hr />
    <dl>
        <dt><a href="<?php echo $this->Html->url(array('controller'=>'article', 'action'=>'lists', 'admin'=>'true'))?>" target="main">酒节服务</a></dt>
        <dd><a href="<?php echo $this->Html->url(array('controller'=>'apply', 'action'=>'index', 'admin'=>'true'))?>" target="main">参展在线申请</a></dd>
        <dd><a href="<?php echo $this->Html->url(array('controller'=>'partner', 'action'=>'index', 'admin'=>'true'))?>" target="main">合作票务公司及链接</a></dd>
    </dl>
    <dl>
        <dt><a href="<?php echo $this->Html->url(array('controller'=>'article', 'action'=>'index', 'admin'=>'true', 'contactus'))?>" target="main">联系我们</a></dt>
    </dl>
</div>
</body>
</html>