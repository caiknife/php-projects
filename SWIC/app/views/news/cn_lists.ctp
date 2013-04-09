<div id="content">
	<div class="sidebar">
		<dl>
			<dt>新闻资讯</dt>
			<dd>
				<ul>
					<?php echo $this->element('news/cn_menu')?>
				</ul>
			</dd>
		</dl>
		<div class="AdBox"><a href="#"><img src="/images/cn/ad_1.png" width="300" height="200" /></a></div>
		<?php $types = $newsType; unset($types[$type])?>
		<?php foreach($types as $key=>$val):?>
		<div class="plateNews">
			<h3><?php echo h($val)?></h3>
			<a class="more" href="<?php echo $this->Html->url(array('action'=>'lists', 'cn'=>true, 'type'=>$key))?>">更多</a>
			<?php 
			    App::import('Model', 'News');
			    $newsModel = new News();
			    $otherNewes = $newsModel->where($newsModel->buildFilter(array('is_display'=>1, 'type_id'=>$key)))->limit(8)->order('News.created DESC')->select();
			?>
			<ul>
				<?php foreach($otherNewes as $onews):?>
				<li><a href="<?php echo $this->Html->url(array('action'=>'detail', 'cn'=>true, $onews['News']['id']))?>"><?php echo h($onews['News']['title'])?></a> <span><?php echo h($onews['News']['article_date'])?></span></li>
				<?php endforeach;?>
			</ul>
		</div>
		<?php endforeach;?>
	</div>
	<div class="main">
		<div class="globalnav">
			<a class="home" href="<?php echo $this->Html->url(array('controller'=>'home', 'action'=>'index', 'cn'=>true))?>">首页</a>
			<a href="<?php echo $this->Html->url(array('controller'=>'news', 'action'=>'index', 'cn'=>true))?>">新闻资讯</a>
			<strong><?php echo h($newsType[$type])?></strong>
		</div>
		<div class="newsList">
			<ul class="textList">
				<?php foreach($newes as $news):?>
				<li>
					<a class="pic" href="<?php echo $this->Html->url(array('action'=>'detail', 'cn'=>true, $news['News']['id']))?>">
						<img src="<?php echo $this->Format->getNewsLogo($news['News'])?>" />
					</a>
					<h4>
						<a href="<?php echo $this->Html->url(array('action'=>'detail', 'cn'=>true, $news['News']['id']))?>"><?php echo h($news['News']['title'])?></a>
						<span><?php echo h($news['News']['article_date'])?></span>
					</h4>
					<p><?php echo $this->Text->truncate(strip_tags($news['News']['intro']), 200)?></p>
				</li>
				<?php endforeach;?>
			</ul>
			<?php echo $this->element('news/cn_paginate')?>
		</div>
	</div>
	<br clear="all" />
</div>