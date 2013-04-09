<div id="content" class="regContent">
	<h2>欢迎注册凯德龙之梦虹口广场 提供丰富的生活服务。让你的生活多彩每一天！</h2>
	<form name="signup">
	<div class="regSubmit">
		<fieldset>
			<label for="mail">电子邮箱</label>
			<?php echo $this->Form->text('Member.email')?>
			<!--输入您常用的邮箱，不区分大小写--> 			
			<span class="correct" style="display: none;"></span>
			<span class="error" style="display: none;">此项不能为空！</span>
			<span class="error" style="display: none;">邮件地址格式不正确！</span>
			<span class="error" style="display: none;">邮箱已被使用，请换一个！</span>		
		</fieldset>
		<fieldset>
			<label for="nickname">昵称</label>
			<?php echo $this->Form->text('Member.nickname')?>
			<span class="correct" style="display: none;"></span>
			<span class="error" style="display: none;">此项不能为空！</span>
			<span class="error" style="display: none;">昵称不能为特殊字符！</span>
			<span class="error" style="display: none;">昵称已被使用，请换一个！</span>
		</fieldset>
		<fieldset>
			<label for="password1">登入密码</label>
			<?php echo $this->Form->password('Member.password')?>
			密码长度必须在6-14个字符之间
			<span class="correct" style="display: none;"></span>
			<span class="error" style="display: none;">此项不能为空！</span>
			<span class="error" style="display: none;">密码长度必须大于6个字符！</span>
			<span class="error" style="display: none;">密码长度必须小于14个字符！</span>
		</fieldset>
		<fieldset>
			<label for="password2">密码确认</label>
			<?php echo $this->Form->password('Member.password_confirm')?>
			<span class="correct" style="display: none;"></span>
			<span class="error" style="display: none;">此项不能为空！</span>
			<span class="error" style="display: none;">2次输入的密码不一致！</span>
		</fieldset>
		<fieldset>
			<label for="verification">验证码</label>
			<?php echo $this->Form->text('Member.captcha')?>
			<span class="correct" style="display: none;"></span>
			<span class="error" style="display: none;">验证码错误！</span>
		</fieldset>
		<p class="verification"><img src="<?php echo $this->Html->url(array('controller'=>'captcha', 'action'=>'index'))?>" width="118" height="55" /> <a href="#">看不清？换张图</a></p>
		<p class="service"><label><input type="checkbox" name="agree" /> 我已阅读并同意凯德龙之梦虹口广场的</label> <a href="<?php echo $this->Html->url(array('controller'=>'pages', 'action'=>'service'))?>">《服务协议》</a></p>
		<p><a class="btnSumit" href="#validBox">提交注册</a></p>
	</div>
	</form>
	<div class="regLogin">
		<h3>已经有龙之梦的账号？</h3>
		<a class="aLogin" href="#loginBox">会员登入</a>
	</div>
</div>
<?php echo $this->Html->script('frontend/login/signup', false)?>