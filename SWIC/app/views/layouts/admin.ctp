<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo $this->Html->css('admin/style', 'stylesheet', array('media'=>'screen'));?>
<?php echo $this->Html->script(array('jquery-1.7.2.min', 'jquery-ui-1.8.19.custom.min', 'jquery.tooltip.pack'));?>
<?php echo $scripts_for_layout?>
<title>上海酒类消费指数中心 后台管理系统</title>
</head>
<body>
<?php echo $this->element('flash')?>
<?php echo $content_for_layout;?>
<?php echo $this->element('sql_dump'); ?>
</body>
</html>
