<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>北京嫣然天使儿童医院 网站管理系统</title>
<?php echo $this->Html->meta(array('name'=>'robots', 'content'=>'noindex, nofollow'))?>
<?php echo $this->Html->css('admin/style', 'stylesheet', array('media'=>'screen'));?>
<?php echo $this->Html->script(array('jquery-1.7.2.min', 'jquery-ui-1.8.19.custom.min', 'jquery.tooltip.pack'));?>
</head>
<body>
<div id="loginBox">
    <?php echo $this->element('flash')?>
    <?php echo $this->Form->create(false, array('method'=>'post', 'url'=>array('controller'=>'login', 'action'=>'signin', 'admin'=>true)))?>
    <p><label for="username">用户名</label><?php echo $this->Form->text('username')?></p>
	<p><label for="password">密码</label><?php echo $this->Form->password('password')?></p>
    <div>
        <a class="loginBtn" href="#">登入</a> 
        <a href="/">返回前台</a>
    </div>
    <?php echo $this->Form->end()?>
</div>
<script>
$(function(){
    $('a.loginBtn').click(function(){
        $('form').submit();
        return false;
    });
});
</script>
</body>
</html>