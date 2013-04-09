<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo $this->Html->meta(array('name'=>'robots', 'content'=>'noindex, nofollow'))?>
<title>凯德龙之梦-虹口 网站管理系统 V1.0</title>
<?php echo $this->Html->css('admin/transdmin', 'stylesheet', array('media'=>'screen'));?>
<!--[if IE 6]><?php echo $this->Html->css('admin/ie6', 'stylesheet', array('media'=>'screen'));?><![endif]-->
<!--[if IE 7]><?php echo $this->Html->css('admin/ie7', 'stylesheet', array('media'=>'screen'));?><![endif]-->
<?php echo $this->Html->script(array('jquery', 'jnice'));?>
</head>
<body>
<div id="wrapper">
    <div id="main" class="login">
        <h1><a href="<?php echo $this->Html->url(array('controller'=>'home', 'action'=>'index', 'admin'=>true));?>" title="后台管理"><span>凯德龙之梦-虹口网站管理系统 v1.0</span></a></h1>
        <?php echo $this->element('flash')?>
        <?php echo $this->Form->create(false, array('class'=>'jNice', 'method'=>'post', 'url'=>array('controller'=>'login', 'action'=>'signin', 'admin'=>true)))?>
            <fieldset>
                <p>
                    <label>用户名</label>
                    <?php echo $this->Form->text('username', array('class'=>'text-long'))?>
                </p>
                <p>
                    <label>密码</label>
                    <?php echo $this->Form->password('password', array('class'=>'text-long'))?>
                </p>
            </fieldset>
            <input type="submit" value=" 登入后台 " />
        <?php echo $this->Form->end()?>
    </div>
</div>
<!-- // #wrapper -->
</body>
</html>
