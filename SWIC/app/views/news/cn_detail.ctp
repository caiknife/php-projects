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
			<a href="<?php echo $this->Html->url(array('controller'=>'news', 'action'=>'index', 'cn'=>true, 'type'=>$type))?>"><?php echo h($newsType[$type])?></a>
			<strong>正文</strong>
		</div>
		<div class="newsD">
			<h2><?php echo h($news['News']['title'])?></h2>
			<div class="top"><span class="fontSize">字号：<small>T</small> <big class="curr">T</big></span><span><?php echo h($news['News']['article_date'])?></span> <!-- <span>中国青年报</span> --></div>
			<div class="cms big">
				<?php echo $news['News']['content']?>
			</div>
			<!-- Baidu Button BEGIN -->
			<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
				<span class="bds_more">分享到：</span>
				<a class="bds_qzone"></a>
				<a class="bds_tsina"></a>
				<a class="bds_tqq"></a>
				<a class="bds_renren"></a>
				<a class="bds_kaixin001"></a>
				<a class="bds_douban"></a>
				<a class="bds_ty"></a>
				<a class="shareCount"></a>
			</div>
			<script type="text/javascript" id="bdshare_js" data="type=tools" ></script>
			<script type="text/javascript" id="bdshell_js"></script>
			<script type="text/javascript">
				var bds_config = {'bdText':'【“天价”拉菲炒作降温 红酒投资趋向多元化】 上海酒类消费指数中心'};
				document.getElementById('bdshell_js').src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
			</script>
			<!-- Baidu Button END -->
			<div class="plateBox relatedNews">
				<h3><span>相关新闻</span></h3>
				<ul>
                    <?php foreach($relatedNews as $news):?>
					<li><a href="<?php echo $this->Html->url(array('action'=>'detail', 'cn'=>true, $news['News']['id']))?>"><?php echo h($news['News']['title'])?></a> <span><?php echo h($news['News']['article_date'])?></span></li>
					<?php endforeach;?>
				</ul>
			</div>
		</div>
	</div>
	<br clear="all" />
</div>
<?php echo $this->Html->script('frontend/news/detail')?>