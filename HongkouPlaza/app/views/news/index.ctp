<div id="content">
	<div id="main">
		<?php echo $this->element('news/left')?>
		<div id="right">
			<div class="newsList">
				<ul>
					<?php foreach($news as $item):?>
					<li>
						<a class="img" href="<?php echo $this->Html->url(array('action'=>'detail', $item['News']['id']))?>"><img src="/attachments/photos/news_image/<?php echo $item['News']['image']?>" /></a>
						<div class="des">
							<span><?php if($item['News']['source']):?><a href="<?php echo $item['News']['link']?>" target="_blank"><?php echo h($item['News']['source'])?></a> | <?php endif;?><?php echo $this->Format->toDate($item['News']['date'])?></span>
							<h3><a href="<?php echo $this->Html->url(array('action'=>'detail', $item['News']['id']))?>"><?php echo h($item['News']['title'])?></a></h3>
							<p><?php echo h($item['News']['brief'])?></p>
							<a class="more" href="<?php echo $this->Html->url(array('action'=>'detail', $item['News']['id']))?>">了解更多</a>
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
<?php echo $this->Html->script('frontend/news/paginate', false)?>
