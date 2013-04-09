<div id="content">
	<div id="main">
		<?php echo $this->element('profile/left')?>
		<div id="right">
			<div class="message" style="display:none">个人信息修改成功！</div>
			<form class="information">
			    <?php if(isset($profile) && $profile['Member']['first_login']):?>
				<h3>你是第一次登入，请完善你的基本信息，以便我们提供更好的服务</h3>
			    <?php endif;?>
				<!-- legend 第一次登入的会员才出现，新注册用户第一次进会员专区直接进这个页面 -->
				<fieldset>
					<p>
						<label for="mail">邮箱</label>
						<?php echo $this->Form->text('Member.email', array('disabled'=>'disabled'))?> 
						<?php if(isset($profile) && !$profile['Member']['actived']):?>
						<a id="btnMail" href="#validBox"><span>立即验证</span></a>
						<?php else:?>
						<span class="correct"></span>
						<?php endif;?>
						</p>
					<p>
						<label for="nickname">昵称</label> 
						<?php echo $this->Form->text('Member.nickname')?>
						<span class="correct" style="display: none;"></span>
						<span class="error" style="display: none">此项不能为空！</span>
						<span class="error" style="display: none">昵称不能为特殊字符！</span>
						<span class="error" style="display: none">昵称已被使用，请换一个！</span>
					</p>
					<p>
						<label for="name">姓名</label> 
						<?php echo $this->Form->text('Member.fullname')?>
						<span class="error" style="display: none">姓名不能为特殊字符！</span>
					</p>
					<p>
						<label>性别</label> 
						<?php echo $this->Form->radio('Member.gender', Configure::read('Member.gender'), array('legend'=>false, 'label'=>false, 'separator'=>'<span></span>'))?>
					</p>
					<p><label>出生年月</label>
						<?php echo $this->Form->text('Member.birthday')?>
						<script type="text/javascript" src="/js/jscal2.js"></script>
						<script type="text/javascript">
							Calendar.setup({inputField : "MemberBirthday", trigger : "MemberBirthday", onSelect : function() {this.hide()}});
						</script></p>
					<p>
						<label>手机</label> 
						<?php echo $this->Form->text('Member.mobile')?>
						<span class="error" style="display: none">手机格式错误！</span>
					</p>
					<p>
						<label>座机</label> 
						<?php echo $this->Form->text('Member.phone')?>
						<span class="error" style="display: none">座机格式错误！</span>
					</p>
					<p style="position:relative"><label>所在地</label>
						<select>
							<option>上海市</option>
						</select>
						<?php echo $this->Form->select('Member.district', Configure::read('Member.district'), null, array('empty'=>false))?>
						<!--[if IE 6]>
						<iframe scrolling="no" frameborder="0" style="width:300px; height:30px; top:0px; left:130px; background-color:transparent; position:absolute; z-index:1;"></iframe>
						<![endif]-->
					</p>
					<p class="address"><label>详细地址</label> <?php echo $this->Form->text('Member.address')?></p>
				</fieldset>
				<div class="infoSumit"><a class="confirm" href="#">确认提交</a></div>
			</form>

		</div>
		<br clear="all" />
	</div>
</div>
<?php echo $this->Html->script('frontend/profile/info')?>