<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>北京嫣然天使儿童医院 网站管理系统</title>
</head>
<frameset rows="70,*"  frameborder="NO" framespacing="0">
    <frame src="<?php echo $this->Html->url(array('controller'=>'page', 'action'=>'header', 'admin'=>true))?>" framespacing="0" border="0" />
    <frameset cols="200,*" framespacing="0" border="0">
        <frame src="<?php echo $this->Html->url(array('controller'=>'page', 'action'=>'menu', 'admin'=>true))?>" name="menu" frameborder="no" scrolling="no" target="main" />
        <frame src="<?php echo $this->Html->url(array('controller'=>'banner', 'action'=>'index', 'admin'=>true))?>" name="main" frameborder="no" scrolling="yes" target="_self" />
    </frameset>
</frameset>
<noframes></noframes>
</html>
