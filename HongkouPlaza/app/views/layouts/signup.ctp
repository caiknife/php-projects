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
		<a class="aLogin" href="#promptBox"><span>提交</span></a>
		<a class="cancel" href="javascript:$.fn.colorbox.close()">取消</a>
		</form>
	</div>
	<!-- 找回密码 END -->	
	<!-- 注册成功提示 OPEN -->
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
		<a class="promptBtn" href="http://mail.163.com" target="_blank" onclick="javascript:$.fn.colorbox.close();location.reload();"><span>查收邮件</span></a>
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
	</div>
	<!-- 头部 END -->
	<?php echo $content_for_layout?>
	<!-- 底部 OPEN -->
	<div id="footer">
		<div class="fInfo">
			<ul>
				<li class="noBorder"><a href="#">相关链接</a></li>
				<li><a href="#">网站地图</a></li>
				<li><a href="#">隐私政策</a></li>
				<li><a href="#">免责条款</a></li>
			</ul>
			客服电话：+86 021 25519958 / 招商服务：+86 021 25519958 / 客服信箱：webservice@capitamalls.com / 营业时间：10:00 – 22:00
			<small>Copyright &copy; 2010-2011 <strong>CapitaMalls</strong> All rights reserved.</small>
		</div>
	</div>
	<!-- 底部 END -->
</div>
</body>
</html>