<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo $this->Html->meta(array('name'=>'robots', 'content'=>'noindex, nofollow'))?>
<title>凯德龙之梦-虹口 网站管理系统 V1.0</title>
<?php echo $this->Html->css('admin/transdmin', 'stylesheet', array('media'=>'screen'));?>
<?php echo $this->Html->css('ui-lightness/jquery-ui-1.8.16.custom', 'stylesheet', array('media'=>'screen'));?>
<!--[if IE 6]><?php echo $this->Html->css('admin/ie6', 'stylesheet', array('media'=>'screen'));?><![endif]-->
<!--[if IE 7]><?php echo $this->Html->css('admin/ie7', 'stylesheet', array('media'=>'screen'));?><![endif]-->
<?php echo $this->Html->script(array('jquery', 'jnice', 'jquery_ui'));?>
<?php echo $scripts_for_layout?>
</head>
<body>
    <div id="wrapper">
        <h1><a href="<?php echo $this->Html->url(array('controller'=>'home', 'action'=>'index', 'admin'=>true));?>" title="后台管理"><span>凯德龙之梦-虹口网站管理系统 V1.0</span></a></h1>
        <?php echo $this->element('flash')?>
        <div id="mainNav">
            <ul>
                <li><a href="<?php echo $this->Html->url(array('controller'=>'top', 'action'=>'index', 'admin'=>true))?>" <?php if ($this->name == 'Top'):?>class="active"<?php endif;?> title="首页管理">首页管理</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller'=>'brands', 'action'=>'index', 'admin'=>true))?>" <?php if ($this->name == 'Brands'):?>class="active"<?php endif;?> title="商铺管理">商铺管理</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller'=>'events', 'action'=>'index', 'admin'=>true))?>" <?php if ($this->name == 'Events'):?>class="active"<?php endif;?> title="活动管理">活动管理</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller'=>'news', 'action'=>'index', 'admin'=>true))?>" <?php if ($this->name == 'News'):?>class="active"<?php endif;?> title="新闻管理">新闻管理</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller'=>'members', 'action'=>'index', 'admin'=>true))?>" <?php if ($this->name == 'Members'):?>class="active"<?php endif;?> title="会员管理">会员管理</a></li>
                 <li><a href="<?php echo $this->Html->url(array('controller'=>'footer', 'action'=>'index', 'admin'=>true))?>" <?php if ($this->name == 'Footer'):?>class="active"<?php endif;?> title="底部信息管理">底部信息管理</a></li>
                <li class="logout"><a href="<?php echo $this->Html->url(array('controller'=>'login', 'action'=>'signout', 'admin'=>true))?>" title="退出登入"><?php echo $admin['Administrator']['username']?> | 退出登入</a></li>
            </ul>
        </div>
        <!-- // #end mainNav -->
        <?php echo $content_for_layout;?>
        <!-- // #containerHolder -->
        <p id="footer">凯德龙之梦-虹口网站管理系统 V1.0</p>
    </div>
    <!-- // #wrapper -->
    <?php echo $this->element('sql_dump'); ?>
</body>
</html>
