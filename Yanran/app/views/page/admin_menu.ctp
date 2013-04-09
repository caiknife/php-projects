<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>北京嫣然天使儿童医院 网站管理系统</title>
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
		<dt><a href="<?php echo $this->Html->url(array('controller'=>'news', 'admin'=>true, 'action'=>'add'))?>" target="main">添新闻</a></dt>
        <?php foreach($newsTypes as $key=>$type):?>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'news', 'admin'=>true, 'type'=>$key))?>" target="main"><?php echo h($type)?></a></dd>
        <?php endforeach;?>
		<dd><hr /></dd>
		<dt><a href="<?php echo $this->Html->url(array('controller'=>'info', 'admin'=>true, 'action'=>'add'))?>" target="main">添资讯</a></dt>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'info', 'admin'=>true))?>" target="main">健康资讯</a></dd><!--健康资讯不是新闻类型,固定不可编辑-->
	</dl>
	<hr />
	<dl>
		<dt><span>首页</span></dt>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'banner', 'admin'=>true))?>" target="main">服务科室</a></dd>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'partner', 'admin'=>true))?>" target="main">合作伙伴</a></dd>
	</dl>
	<hr />
	<dl>
		<dt><span>板块编辑</span></dt>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'block', 'admin'=>true, 'type'=>'about'))?>" target="main">关于我们</a></dd>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'service', 'admin'=>true))?>" target="main">服务项目</a></dd>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'block', 'admin'=>true, 'type'=>'center'))?>" target="main">颅颜中心</a></dd>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'team', 'admin'=>true))?>" target="main">医疗团队</a></dd>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'equip', 'admin'=>true))?>" target="main">环境设施</a></dd>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'reservation', 'admin'=>true))?>" target="main">在线预约</a></dd>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'article', 'action'=>'edit', 'admin'=>true, 'recruiting'))?>" target="main">招贤纳才</a></dd>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'article', 'action'=>'edit', 'admin'=>true, 'insurance'))?>" target="main">保险与付款</a></dd>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'article', 'action'=>'edit', 'admin'=>true, 'contact'))?>" target="main">联系我们</a></dd>
	</dl>
	<dl>
		<dt><span>其他设置</span></dt>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'board', 'admin'=>true))?>" target="main">各板块KV</a></dd>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'newstype', 'admin'=>true))?>" target="main">新闻分类</a></dd>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'equiptype', 'admin'=>true))?>" target="main">环境设施分类</a></dd>
	</dl>
</div>
</body>
</html>