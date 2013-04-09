<div id="content">
	<div id="main">
		<?php echo $this->element('profile/left')?>
		<div id="right">
			<div class="brandSwitch">
				<a href="<?php echo $this->Html->url(array('action'=>'subscribe'))?>">推荐订阅</a>
				<a class="curr" href="<?php echo $this->Html->url(array('action'=>'subscribed'))?>">已订阅</a>
			</div>
			<!--[if IE 6]>
			<script type="text/javascript">DD_belatedPNG.fix('.logoList i')</script>
			<![endif]-->
			<div class="logoList">
				<ul>
					<?php foreach($brands as $brand):?>
					<li>
						<a title="<?php echo h($brand['title'])?> <?php echo h($brand['title_en'])?>" href="<?php echo $this->Html->url(array('controller'=>'brands', 'action'=>'detail', $brand['id']))?>">
							<img src="/attachments/photos/brand_logo/<?php echo $brand['logo']?>" alt="<?php echo h($brand['title'])?> <?php echo h($brand['title_en'])?>"/><i></i>
						</a><strong><?php echo h($brand['title'])?></strong><span><?php echo h($brand['guide_id'])?></span>
						<a href="<?php echo $this->Html->url(array('action'=>'disconnect', $brand['id']))?>" class="braDel" title="删除" /></a>
					</li>
					<?php endforeach;?>
				</ul>
			</div>			
		</div>
		<br clear="all" />
	</div>
</div>
<?php echo $this->Html->script('frontend/profile/subscribed')?>