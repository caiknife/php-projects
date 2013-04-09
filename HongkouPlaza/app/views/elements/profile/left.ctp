<!--[if IE 6]>
<script type="text/javascript">DD_belatedPNG.fix('#main h2')</script>
<![endif]-->
<div id="left">
	<h2 class="tMember">会员专区</h2>
	<ul class="submenu">
		<li <?php if($this->action=='subscribe' || $this->action=='subscribed'):?>class="curr"<?php endif;?>><a href="<?php echo $this->Html->url(array('action'=>'subscribe'))?>">品牌订阅 <span>(<?php echo sizeof($brands)?>)</span></a></li>
		<li class="splitLine"></li>
		<li <?php if($this->action=='info'):?>class="curr"<?php endif;?>><a href="<?php echo $this->Html->url(array('action'=>'info'))?>">个人信息</a></li>
		<li <?php if($this->action=='password'):?>class="curr"<?php endif;?>><a href="<?php echo $this->Html->url(array('action'=>'password'))?>">修改密码</a></li>
	</ul>
</div>