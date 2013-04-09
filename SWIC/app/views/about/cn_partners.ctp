<div id="content" class="indexCenter">
	<div class="sidebar">
		<dl>
			<dt>关于我们</dt>
			<dd>
				<ul>
					<?php echo $this->element('about/menu')?>
				</ul>
			</dd>
		</dl>
		<div class="AdBox"><a href="#"><img src="/images/cn/ad_1.png" width="300" height="200" /></a></div>	
	</div>
	<div class="main">
		<div class="globalnav">
			<a class="home" href="<?php echo $this->Html->url(array('controller'=>'home', 'action'=>'index', 'cn'=>'true'))?>">首页</a>
			<span>关于我们</span>
			<strong>指导及合作单位</strong>
		</div>
        <?php foreach($results as $key=>$result):?>
        <h4 id="part<?php echo $key?>"><strong><?php echo h($teamType[$key])?></strong></h4>
        <ul class="partnersList">
            <?php foreach($result as $partner):?>
            <li><img src="<?php echo $this->Format->getPartnerLogo($partner['Partner'])?>" /><?php echo h($partner['Partner']['title'])?></li>
            <?php endforeach;?>
        </ul>
        <?php endforeach;?>
	</div>
	<br clear="all" />
</div>