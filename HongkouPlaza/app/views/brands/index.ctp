<div id="content">
	<div id="main">
		<?php echo $this->element('brands/left')?>
		<div id="right">
			<div class="brandSwitch">
				<a class="curr" href="<?php echo $this->Html->url(array('action'=>'index'))?>">新店进驻</a>
				<a href="<?php echo $this->Html->url(array('action'=>'all'))?>">全部</a>
			</div>
			<div class="brandList" id="content">
				<!-- 当前ul为第二页,翻页使用AJAX,左右偏移760px -->
				<ul>
				    <?php foreach($brands as $brand):?>
					<li>
						<a title="<?php echo h($brand['Brand']['title'])?> <?php echo h($brand['Brand']['title_en'])?>" href="<?php echo $this->Html->url(array('action'=>'detail', $brand['Brand']['id']))?>">
							<img src="<?php echo $this->Format->showBrandMainPhoto($brand['Brand']['main_photo'])?>" alt="<?php echo h($brand['Brand']['title'])?> <?php echo h($brand['Brand']['title_en'])?>" />
						</a>
						<?php if (isset($profile) && $profile):?>
						<?php if (in_array($brand['Brand']['id'], $subscribed)):?>
						<a class="subscribed" href="<?php echo $this->Html->url(array('action'=>'unsubscribe', $brand['Brand']['id']))?>">订阅</a>
						<?php else:?>
						<a class="subscribe" href="<?php echo $this->Html->url(array('action'=>'subscribe', $brand['Brand']['id']))?>">订阅</a>
						<?php endif;?>
						<?php endif;?>
						<div class="brandInfo">
							<a title="<?php echo h($brand['Brand']['title'])?> <?php echo h($brand['Brand']['title_en'])?>" href="<?php echo $this->Html->url(array('action'=>'detail', $brand['Brand']['id']))?>">
								<?php if($brand['Brand']['title_en']):?><span class="en"><?php echo h($brand['Brand']['title_en'])?></span><?php endif;?>
								<?php if($brand['Brand']['title']):?><span class="cn"><?php echo h($brand['Brand']['title'])?></span><?php endif;?>
							</a>
							<p><?php echo $this->Text->truncate(strip_tags($brand['Brand']['brief']), 90)?></p>
							<small><?php echo h($brand['Brand']['shop_id'])?></small>
						</div>
					</li>
				    <?php endforeach;?>
				</ul>
			</div>
            <?php echo $this->element('brands/paginate')?>
		</div>
		<br clear="all" />
	</div>
</div>
<?php echo $this->Html->script('frontend/brands/paginate', false)?>
<?php echo $this->Html->script('frontend/brands/index', false)?>
