<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if (isset($pageTitle)):?><?php echo $pageTitle?> - <?php endif;?>凯德龙之梦 - 虹口 | HONGKOU PLAZA</title>
<?php echo $this->Html->css('frontend/style', 'stylesheet', array('media'=>'screen'));?>
<?php echo $this->Html->script(array('jquery', 'jquery_colorbox', 'frontend/popup'));?>
<?php echo $scripts_for_layout?>
<!--[if IE 6]>
<?php echo $this->Html->css('frontend/ie6', 'stylesheet', array('media'=>'screen'));?>
<?php echo $this->Html->script('dd_belated_png');?>
<![endif]-->
</head>
<body>
<div style="display:none">
	<!-- 会员登入 OPEN -->
	<div id="loginBox">
		<form name="login">
		<h3>会员登入</h3>
		<p><label for="LoginEmail">E-mail</label> <?php echo $this->Form->text('Login.email')?> <a class="reg" href="<?php echo $this->Html->url(array('controller'=>'login', 'action'=>'signup'))?>">注册新用户</a></p>
		<p><label for="LoginPassword">密码</label> <?php echo $this->Form->password('Login.password')?> <a  class="forgotPassword" href="#forgotPassword">忘记密码？</a></p>
		<label class="saveInfo"><?php echo $this->Form->checkbox('Login.live')?>保存当前使用的用户名</label>
		<a class="btnLogin" href="#promptBox">会员登入</a>
		<a class="cancel" href="javascript:$.fn.colorbox.close()">取消登入</a>
		</form>
	</div>
	<!-- 会员登入 END -->
	<!-- 找回密码 OPEN -->
	<div id="forgotPassword">
		<form name="forgot">
		<h3>找回密码</h3>
		<p><label for="email">E-mail</label> <?php echo $this->Form->text('Forgot.email')?></p>
		<a class="aLogin" href="#passwordBox"><span>提交</span></a>
		<a class="cancel" href="javascript:$.fn.colorbox.close()">取消</a>
		</form>
	</div>
	<!-- 找回密码 END -->
	<!-- 提示信息 OPEN -->
	<!-- 用户登入失败 -->
	<div id="promptBox">
		<h3>提示信息</h3>
		<h4>登入失败，您输入的E-mail或密码错误</h4>
		<a class="aLogin" href="#loginBox"><span>重新登入</span></a>
		<a href="javascript:$.fn.colorbox.close()">取消</a>
	</div>
	<!-- 提交登入提示 END -->
	<div id="validBox">
		<h3>提示信息</h3>
		<h4>已经发送激活邮件至你的邮箱</h4>
		<a class="promptBtn" href="http://mail.163.com" target="_blank" onclick="javascript:$.fn.colorbox.close()"><span>查收邮件</span></a>
		<a href="javascript:$.fn.colorbox.close()">取消</a>
	</div>
	<div id="passwordBox">
		<h3>提示信息</h3>
		<h4>提交成功，已将密码发送至您的邮箱</h4>
		<a class="aLogin" href="#loginBox"><span>重新登入</span></a>
		<a href="javascript:$.fn.colorbox.close()">取消</a>
	</div>
	<div id="successBox">
		<h3>提示信息</h3>
		<h4>登入成功，您可以继续浏览网站</h4>
		<a class="promptBtn" href="javascript:$.fn.colorbox.close();location.reload();"><span>确定</span></a>
		<a href="<?php echo $this->Html->url(array('controller'=>'profile', 'action'=>'index'))?>">进入会员专区</a>
	</div>
</div>
<div id="wrap">
	<!-- 头部 OPEN -->
	<div id="header">
		<h1 class="logo"><a href="/">凯德龙之梦 - 虹口 | HONGKOU PLAZA</a></h1>
		<ul class="topnav">
			<li <?php if ($this->name == 'Home'):?>class="curr"<?php endif;?>><a class="a_01" href="/">首页</a></li>
			<li><a class="a_02" href="http://t.sina.com.cn/hongkouplaza" target="_blank">官方微博</a></li>
			<li <?php if ($this->name == 'News'):?>class="curr"<?php endif;?>><a class="a_03" href="<?php echo $this->Html->url(array('controller'=>'news', 'action'=>'index'))?>">新闻中心</a></li>
			<li <?php if ($this->action == 'contact'):?>class="curr"<?php endif;?>><a class="a_04" href="<?php echo $this->Html->url(array('controller'=>'pages', 'action'=>'contact'))?>">联系我们</a></li>
			<?php if(isset($profile) && $profile):?>
			<li class="member">您好, <strong><?php echo h($profile['Member']['nickname'])?></strong> 
			<a class="area curr" href="<?php echo $this->Html->url(array('controller'=>'profile', 'action'=>'index'))?>">会员专区</a> 
			<a class="logout" href="<?php echo $this->Html->url(array('controller'=>'login', 'action'=>'signout'))?>">退出</a></li>
			<?php else:?>
			<li class="login"><a class="aLogin" href="#loginBox">会员登入</a></li>
			<li class="reg"><a href="<?php echo $this->Html->url(array('controller'=>'login', 'action'=>'signup'))?>">注册</a></li>
			<?php endif;?>
		</ul>
		<div class="tips">
			<div class="weather"><iframe src="http://m.weather.com.cn/m/pn4/weather.htm?id=101020100T " width="160" height="25" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no"></iframe><i></i></div>
			<script type="text/javascript">
				$(document).ready(function(){
					$("#header .btnMap, #footer .link01").colorbox({iframe:true, width:'925', height:'580'});
                    $('#footer .link02, #footer .link03').colorbox({iframe:true, width:'860', height:'690'});
				});
			</script>
			<a class="btnMap" href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'map'))?>">楼层向导</a>
		</div>
		<div class="menu">
			<ul class="nav">
				<li <?php if ($this->name == 'Brands'):?>class="curr"<?php endif;?>><a class="a_01" href="<?php echo $this->Html->url(array('controller'=>'brands', 'action'=>'index'))?>">品牌介绍</a></li>
				<li <?php if ($this->name == 'Events'):?>class="curr"<?php endif;?>><a class="a_02" href="<?php echo $this->Html->url(array('controller'=>'events', 'action'=>'index'))?>">最新活动</a></li>
				<li <?php if ($this->action == 'reach'):?>class="curr"<?php endif;?>><a class="a_03" href="<?php echo $this->Html->url(array('controller'=>'pages', 'action'=>'reach'))?>">如何到达</a></li>
				<li <?php if ($this->action == 'office' || $this->action == 'officemoreinfo'):?>class="curr"<?php endif;?>><a class="a_04" href="<?php echo $this->Html->url(array('controller'=>'pages', 'action'=>'office'))?>">办公楼宇</a></li>
				<li <?php if ($this->action == 'about'):?>class="curr"<?php endif;?>><a class="a_05" href="<?php echo $this->Html->url(array('controller'=>'pages', 'action'=>'about'))?>">关于凯德龙之梦</a></li>
			</ul>
			<div class="search">
				<form name="search">
				<?php echo $this->Form->text('Search.keyword')?><span style="display:none" class="loading"></span><a class="btnAsearch" href="<?php echo $this->Html->url(array('controller'=>'search', 'action'=>'index'))?>">高级搜索</a>
				<!-- 搜索结果 OPEN -->
				<div class="result">
					<!--[if IE 6]>
					<script type="text/javascript">DD_belatedPNG.fix('.search .result h3,.search .result ul,.search .result i')</script>
					<![endif]-->
					<h3>快速搜索</h3>
					<ul></ul>
				</div>
				<!-- 搜索结果 END -->
				</form>				
			</div>
		</div>
	</div>
	<!-- 头部 END -->
	
	<?php echo $content_for_layout?>
	
	<!-- 底部 OPEN -->
	<div id="footer">
		<div class="fBanner">
			<a class="link01" href="<?php echo $this->Html->url(array('controller'=>'pages', 'action'=>'map'))?>"></a>
			<a class="link02" href="<?php echo $this->Html->url(array('controller'=>'footer', 'action'=>'view', 'movie'))?>"></a>
			<a class="link03" href="<?php echo $this->Html->url(array('controller'=>'footer', 'action'=>'view', 'park'))?>"></a>
		</div>
		<div class="fInfo">
			<ul>
				<li class="noBorder"><a href="<?php echo $this->Html->url(array('controller'=>'pages', 'action'=>'sitemap'))?>">网站地图</a></li>
                <?php foreach($blockList as $key=>$val):?>
				<li><a href="<?php echo $this->Html->url(array('controller'=>'pages', 'action'=>'view', $key))?>"><?php echo h($val)?></a></li>
                <?php endforeach;?>				
			</ul>
			服务台电话：+86 021 26019088 / 办公楼租赁：+86 021 26019111、26019112 / 营业时间：10:00 – 22:00
			<small>Copyright &copy; 2010-2012 <strong>CapitaMalls</strong> All rights reserved.</small>
		</div>
	</div>
	<!-- 底部 END -->
</div>
<?php echo $this->element('sql_dump'); ?>
</body>
</html>