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
			<strong>评审团队</strong>
		</div>
		<?php foreach($results as $key=>$result):?>
        <h4 id="part<?php echo $key?>"><strong><?php echo h($teamType[$key])?></strong></h4>
        <ul class="departmentList">
            <!--LOGO切图尺寸 高不等于120 宽等于100 先缩放宽度更具高度等比缩放高度如果大于120则切去垂直顶部裁切-->
            <?php foreach($result as $team):?>
            <li>
                <img src="<?php echo $this->Format->getTeamAvatar($team['ReviewTeam'])?>" />
                <p><strong><?php echo h($team['ReviewTeam']['title'])?></strong><?php echo nl2br(h($team['ReviewTeam']['content']))?></p>
            </li>
            <?php endforeach;?>
        </ul>
		<?php endforeach;?>
	</div>
	<br clear="all" />
</div>