<div id="content">
	<div id="main">
		<?php echo $this->element('search/left')?>
		<div id="right">
			<h2 class="advancedSearch">搜索 “<?php echo $keyword?>”共产生 <?php echo $this->Paginator->counter(array('format'=>'%count%'))?> 条结果</h2>
			<!--搜索结果格式HTML 品牌参考：brand.html； 活动参考：activities_list.html-->
			<div class="brandList" id="result_content">
				<ul>
				 <?php foreach($brands as $brand):?>
					<li>
						<a title="<?php echo h($brand['Brand']['title'])?>" href="<?php echo $this->Html->url(array('controller'=>'brands', 'action'=>'detail', $brand['Brand']['id']))?>">
							<img src="/attachments/photos/brand_main_photo/<?php echo $brand['Brand']['main_photo']?>" alt="<?php echo h($brand['Brand']['title'])?>" />
						</a>
						<?php if (isset($profile) && $profile):?>
						<?php if (in_array($brand['Brand']['id'], $subscribed)):?>
						<a class="subscribed" href="<?php echo $this->Html->url(array('controller'=>'brands', 'action'=>'unsubscribe', $brand['Brand']['id']))?>">订阅</a>
						<?php else:?>
						<a class="subscribe" href="<?php echo $this->Html->url(array('controller'=>'brands', 'action'=>'subscribe', $brand['Brand']['id']))?>">订阅</a>
						<?php endif;?>
						<?php endif;?>
						<div class="brandInfo">
							<a title="<?php echo h($brand['Brand']['title'])?>" href="<?php echo $this->Html->url(array('controller'=>'brands', 'action'=>'detail', $brand['Brand']['id']))?>"><span class="en"><?php echo h($brand['Brand']['title_en'])?></span><span class="cn"><?php echo h($brand['Brand']['title'])?></span></a>
							<p><?php echo $this->Text->truncate(strip_tags($brand['Brand']['brief']), 90)?></p>
							<small><?php echo h($brand['Brand']['floor'])?>-<?php echo h($brand['Brand']['guide_id'])?></small>
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