<div id="content">
	<div id="main">
		<?php echo $this->element('profile/left')?>
		<div id="right">
			<div class="message" style="display:none">密码修改成功！</div>
			<form class="information">
				<fieldset>
					<p>
					   <label for="password1">旧密码</label> 
					   <?php echo $this->Form->password('Member.old_password')?>
					   <span class="correct" style="display: none"></span>
                       <span class="error" style="display: none">此项不能为空！</span>
                       <span class="error" style="display: none">密码不正确！</span>
					</p>
					<p>
					   <label for="password2">新密码</label> 
					   <?php echo $this->Form->password('Member.new_password')?>密码长度必须在6-14个字符之间						
					   <span class="correct" style="display: none"></span>
					   <span class="error" style="display: none">此项不能为空！</span>
					   <span class="error" style="display: none">密码长度必须大于6个字符！</span>
					   <span class="error" style="display: none">密码长度必须小于14个字符！</span>
					</p>
					<p>
					   <label for="password3">确认密码</label> 
					   <?php echo $this->Form->password('Member.new_password_confirm')?>
					   <span class="correct" style="display: none"></span>
					   <span class="error" style="display: none">此项不能为空！</span>
					   <span class="error" style="display: none">2次输入的密码不一致！</span>
					</p>
				</fieldset>
				<div class="infoSumit"><a class="confirm" href="#">确认提交</a></div>
			</form>			
		</div>
		<br clear="all" />
	</div>
</div>
<?php echo $this->Html->script('frontend/profile/password')?>