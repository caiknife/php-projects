<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>上海酒节 网站管理系统</title>
<?php echo $this->Html->meta(array('name'=>'robots', 'content'=>'noindex, nofollow'))?>
<?php echo $this->Html->css('admin/style', 'stylesheet', array('media'=>'screen'));?>
<style type="text/css">
#tooltip {color:#000; background-color:#fff}
#tooltip h3 {color:#000}
</style>
</head>
<body>
<div id="header">
    <h1>珠海润莱酒业有限公司 后台管理系统</h1>
        欢迎你, <strong><?php echo h($admin['Administrator']['username'])?></strong> | <a class="logoutBtn" href="/" target="_blank">查看网站</a> | <a class="logoutBtn" href="<?php echo $this->Html->url(array('controller'=>'login', 'action'=>'signout', 'admin'=>true))?>">退出登录</a>
</div>
</body>
</html>