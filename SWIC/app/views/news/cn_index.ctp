<div id="content" class="newsCenter">
	<div class="hotNews">
		<!-- 图片上下滑动，滑动距离为360px -->
		<div class="hotNewsImg">
			<ul>
				<?php foreach($hotNewes as $key =>  $news):?>
				<li style="margin-top:<?php echo 360*$key?>px"><a href="<?php echo $this->Html->url(array('action'=>'detail', 'cn'=>true, $news['News']['id']))?>"><img src="<?php echo $this->Format->getNewsBig($news['News'])?>" /></a></li>
				<?php endforeach;?>
			</ul>
		</div>
		<!-- 鼠标hover到对应新闻，滑动图片-->
		<ul class="hotNewsText">
			<?php foreach($hotNewes as $key => $news):?>
			<li <?php if($key==0):?>class="curr"<?php endif;?>><a href="<?php echo $this->Html->url(array('action'=>'detail', 'cn'=>true, $news['News']['id']))?>"><strong><?php echo h($news['News']['title'])?></strong><?php echo $this->Text->truncate(strip_tags($news['News']['intro']), 40)?></a></li>
			<?php endforeach;?>
		</ul>
	</div>
	<?php $classType = array('1'=>'left', '2'=>'center', '0'=>'right')?>
	<?php $n=1;?>
	<?php foreach($results as $i => $result):?>
	<?php if($n%3==1):?>
	<div class="plateBox newsCenterBox">
	<?php endif;?>
		<div class="<?php echo $classType[$n%3]?>">
			<h3><span><?php echo $newsType[$i]?></span></h3>
			<a class="more" href="<?php echo $this->Html->url(array('action'=>'lists', 'cn'=>true, 'type'=>$i))?>">更多</a>
			<?php if($result):?>
		    <?php $topNews = array_pop($result)?>
			<div class="topNews">
				<a class="pic" href="<?php echo $this->Html->url(array('action'=>'detail', 'cn'=>true, $topNews['News']['id']))?>"><img src="<?php echo $this->Format->getNewstypeLogo(array('media_url'=>$logoType[$i]))?>" /></a>
				<h4><a href="<?php echo $this->Html->url(array('action'=>'detail', 'cn'=>true, $topNews['News']['id']))?>"><?php echo h($topNews['News']['title'])?></a></h4>
				<p><?php echo $this->Text->truncate(strip_tags($topNews['News']['intro']), 50)?></p>
			</div>
			<ul>
				<?php foreach($result as $news):?>
				<li><a href="<?php echo $this->Html->url(array('action'=>'detail', 'cn'=>true, $news['News']['id']))?>"><?php echo h($news['News']['title'])?></a> <span><?php echo h($news['News']['article_date'])?></span></li>
				<?php endforeach;?>
			</ul>
			<?php endif;?>
		</div>
	<?php if($n%3==0 || $n==sizeof($results)):?>
	</div>
	<?php endif;?>
	<?php $n+=1;?>
	<?php endforeach;?>
</div>
<?php echo $this->Html->script('frontend/news/index')?>