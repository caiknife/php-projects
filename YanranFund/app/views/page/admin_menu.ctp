<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>嫣然天使基金 网站管理系统</title>
<?php echo $this->Html->meta(array('name'=>'robots', 'content'=>'noindex, nofollow'))?>
<?php echo $this->Html->css('admin/style', 'stylesheet', array('media'=>'screen'));?>
<?php echo $this->Html->script(array('jquery-1.7.2.min', 'jquery-ui-1.8.19.custom.min', 'jquery.tooltip.pack'));?>
<style>
html,body {height:100%}
body {background:#DFE1E3; height:100%; border-right:#ccc 1px solid}
</style>
<script type="text/javascript">
$(document).ready(function() {
    $('#menu dd,#menu dt').click(function(){
        $('#menu dd,#menu dt').removeClass('curr');
        $(this).addClass('curr');
    });
});
</script>
</head>
<body>
<div id="menu">
    <dl>
        <dt><span>动态列表</span></dt>
        <dd class="curr"><a href="<?php echo $this->Html->url(array('controller'=>'news', 'admin'=>true))?>" target="main">新闻中心</a></dd>
        <dd><a href="<?php echo $this->Html->url(array('controller'=>'media', 'admin'=>true))?>" target="main">媒体剪报</a></dd>
        <dd><a href="<?php echo $this->Html->url(array('controller'=>'topic', 'admin'=>true))?>" target="main">新闻下载中心</a></dd>
        <dd><a href="<?php echo $this->Html->url(array('controller'=>'album', 'admin'=>true))?>" target="main">相册</a></dd>
        <dd><a href="<?php echo $this->Html->url(array('controller'=>'project', 'admin'=>true))?>" target="main">慈善项目</a></dd>
        <dd><a href="<?php echo $this->Html->url(array('controller'=>'plan', 'admin'=>true))?>" target="main">嫣设计<!-- 样式同新闻 --></a></dd>
        <dd><a href="<?php echo $this->Html->url(array('controller'=>'volunteer', 'admin'=>true))?>" target="main">志愿者名单</a></dd>
        <dd><a href="<?php echo $this->Html->url(array('controller'=>'hospital', 'admin'=>true))?>" target="main">定点医院</a></dd>
        <dd><a href="<?php echo $this->Html->url(array('controller'=>'enterprise', 'admin'=>true))?>" target="main">企业伙伴</a></dd>
        <dd><a href="<?php echo $this->Html->url(array('controller'=>'personal', 'admin'=>true))?>" target="main">个人伙伴</a></dd>
        <dd><a href="<?php echo $this->Html->url(array('controller'=>'team', 'admin'=>true))?>" target="main">嫣然团队<!-- 样式同个人伙伴 --></a></dd>
    </dl>
    <hr />
    <dl>
        <dt><span>静态单页</span></dt>
        <dd><a href="<?php echo $this->Html->url(array('controller'=>'donation', 'admin'=>true))?>" target="main">捐赠中心</a></dd>
        <dd><a href="<?php echo $this->Html->url(array('controller'=>'vblock', 'admin'=>true))?>" target="main">志愿者</a></dd>
        <dd><a href="<?php echo $this->Html->url(array('controller'=>'hblock', 'admin'=>true))?>" target="main">申请救助</a></dd>
        <dd><a href="<?php echo $this->Html->url(array('controller'=>'sblock', 'admin'=>true))?>" target="main">嫣然天使儿童医院</a></dd>
        <dd><a href="<?php echo $this->Html->url(array('controller'=>'pblock', 'admin'=>true))?>" target="main">天使伙伴</a></dd>
        <dd><a href="<?php echo $this->Html->url(array('controller'=>'ablock', 'admin'=>true))?>" target="main">关于我们</a></dd>
    </dl>
    <hr />
    <dl>
        <dt><span>表单提交</span></dt>
        <dd><a href="<?php echo $this->Html->url(array('controller'=>'form', 'action'=>'help', 'admin'=>true))?>" target="main">申请救助</a></dd>
        <dd><a href="<?php echo $this->Html->url(array('controller'=>'form', 'action'=>'volunteer', 'admin'=>true))?>" target="main">志愿者申请</a></dd>
        <dd><a href="<?php echo $this->Html->url(array('controller'=>'form', 'action'=>'hospital', 'admin'=>true))?>" target="main">医院网上申报</a></dd>
    </dl>
</div>
</body>
</html>