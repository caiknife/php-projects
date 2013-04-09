<h1 class="logo"><a href="/en">嫣然天使基金</a></h1>
<ul>
    <li <?php if($this->name == 'Info'):?>class="curr"<?php endif;?>><a class="BgColor_1" href="<?php echo $this->Html->url(array('controller'=>'info', 'action'=>'index'));?>">News</a></li>
    <li <?php if($this->name == 'Project'):?>class="curr"<?php endif;?>><a class="BgColor_2" href="<?php echo $this->Html->url(array('controller'=>'project', 'action'=>'index'));?>">Projects</a></li>
    <li <?php if($this->name == 'Donation'):?>class="curr"<?php endif;?>><a class="BgColor_3" href="<?php echo $this->Html->url(array('controller'=>'donation', 'action'=>'index'));?>">Donate Center</a></li>
    <li <?php if($this->name == 'Volunteer'):?>class="curr"<?php endif;?>><a class="BgColor_4" href="<?php echo $this->Html->url(array('controller'=>'volunteer', 'action'=>'index'));?>">Volunteer Center</a></li>
    <li <?php if($this->name == 'Help'):?>class="curr"<?php endif;?>><a class="BgColor_5" href="<?php echo $this->Html->url(array('controller'=>'help', 'action'=>'index'));?>">Need Help</a></li>
    <li <?php if($this->name == 'Hospital'):?>class="curr"<?php endif;?>><a class="BgColor_6" href="<?php echo $this->Html->url(array('controller'=>'hospital', 'action'=>'index'));?>">Smileangel Hospital</a></li>
    <li <?php if($this->name == 'Plan'):?>class="curr"<?php endif;?>><a class="BgColor_7" href="<?php echo $this->Html->url(array('controller'=>'plan', 'action'=>'index'));?>">Smileangel Design</a></li>
    <li <?php if($this->name == 'Partner'):?>class="curr"<?php endif;?>><a class="BgColor_8" href="<?php echo $this->Html->url(array('controller'=>'partner', 'action'=>'index'));?>">Smileangel Friends</a></li>
    <li <?php if($this->name == 'About'):?>class="curr"<?php endif;?>><a class="BgColor_9" href="<?php echo $this->Html->url(array('controller'=>'about', 'action'=>'index'));?>">About</a></li>
</ul>
<div class="qLink">
	<a class="link_1">Hotline<strong>400 810 2727</strong></a>
	<a class="link_2" href="<?php echo $this->Html->url(array('controller'=>'donation', 'action'=>'index'));?>"><strong>Help Children!</strong></a>
</div>
<div class="followUs">
	<h3>Follow us</h3>
	<a class="qqWeibo" title="腾讯微博" href="http://t.qq.com/yanrantianshijijin" target="_blank">腾讯微博</a>
	<a class="sinaWeibo" title="新浪微博" href="http://weibo.com/yanrantianshi" target="_blank">新浪微博</a>
</div>