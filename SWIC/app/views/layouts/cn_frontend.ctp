<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>上海酒类消费指数中心 | Shanghai Wine Index Center</title>
<?php echo $this->Html->css('frontend/style_cn', 'stylesheet', array('media'=>'screen'));?>
<?php echo $this->Html->script(array('jquery-1.7.2.min', 'jquery-ui-1.8.19.custom.min', 'jquery.tooltip.pack', 'jquery.colorbox-min'));?>
<?php echo $scripts_for_layout?>
<script type="text/javascript">
$(document).ready(function(){
	//$("#header li.none a, .topLink a").colorbox({inline:true});
	$("a[href=#none]").colorbox({opacity:0.1, inline:true});
	$('#header .menu li').hover(function() {
        $(this).children('div.sub-meun').animate({"opacity": "show"},"fast");
    }, function(){
        $(this).children('div.sub-meun').animate({"opacity": "hide"},"fast");
    });
});
</script>
</head>
<body>
<div style="display:none">
	<div id="none">
		<h3><span>正在改进中...</span>敬请期待!</h3>
	</div>
</div>
<div id="warp">
	<div id="header">
		<div class="topLink">欢迎来到上海酒类消费指数中心！<a href="#none">会员登录</a><a class="language" href="#none">English Version</a></div>
		<h1><a class="logo" href="<?php echo $this->Html->url(array('controller'=>'home', 'action'=>'index', 'cn'=>true))?>" >上海酒类消费指数中心 | Shanghai Wine Index Center</a></h1>
		<div class="menu">
			<ul>
				<li <?php if($this->name=='Home'):?>class="curr"<?php endif;?>>
					<a href="<?php echo $this->Html->url(array('controller'=>'home', 'action'=>'index', 'cn'=>true))?>"><span>首页</span></a>
				</li>
				<li id="subMeun1" <?php if($this->name=='Index'):?>class="curr"<?php endif;?>>
					<a class="sub" href="<?php echo $this->Html->url(array('controller'=>'index', 'action'=>'index', 'cn'=>true))?>"><span>指数中心</span></a>
					<div class="sub-meun">
						<ul>
                            <li>
                                <a href="<?php echo $this->Html->url(array('controller'=>'index', 'action'=>'index', 'cn'=>true))?>">价格指数</a>
    							<?php foreach($wineType as $key=>$wine):?>
    							<span><a href="<?php echo $this->Html->url(array('controller'=>'index', 'action'=>'index', 'cn'=>true, 'type'=>$key))?>"><?php echo h($wine)?>指数</a></span>
    							<?php endforeach;?>
							</li>
							<li><a href="<?php echo $this->Html->url(array('controller'=>'index', 'action'=>'purchase', 'cn'=>true))?>">采购指数</a></li>
						</ul>
						<div class="subNews">
					        <?php foreach($newsIndex as $news):?>
                            <div class="news-list">
                                <div class="pic"><a href="<?php echo $this->Html->url(array('controller'=>'news','action'=>'detail', 'cn'=>true, $news['News']['id']))?>"><img src="<?php echo $this->Format->getNewsLogo($news['News'])?>" /></a><?php echo h($news['News']['article_date'])?></div>
                                <div class="title"><a href="<?php echo $this->Html->url(array('controller'=>'news','action'=>'detail', 'cn'=>true, $news['News']['id']))?>"><?php echo h($news['News']['title'])?></a></div>
                                <p><?php echo $this->Text->truncate(strip_tags($news['News']['intro']), 50)?></p>
                            </div>
                            <?php endforeach;?>
                        </div>
					</div>
				</li>
				<li id="subMeun2" <?php if($this->name=='Rating'):?>class="curr"<?php endif;?>>
				    <a class="sub" href="<?php echo $this->Html->url(array('controller'=>'rating', 'action'=>'index', 'cn'=>true))?>"><span>评级评分</span></a>
					<div class="sub-meun">
						<ul>
							<li><a href="<?php echo $this->Html->url(array('controller'=>'rating', 'action'=>'upcoming', 'cn'=>true))?>">待评预告</a></li>
							<li><a href="<?php echo $this->Html->url(array('controller'=>'rating', 'action'=>'history', 'cn'=>true))?>">酒评历史</a></li>
							<li><a href="<?php echo $this->Html->url(array('controller'=>'rating', 'action'=>'process', 'cn'=>true))?>">申报流程</a></li>
						</ul>
						<div class="subNews">
                            <?php foreach($newsScore as $news):?>
                            <div class="news-list">
                                <div class="pic"><a href="<?php echo $this->Html->url(array('controller'=>'news','action'=>'detail', 'cn'=>true, $news['News']['id']))?>"><img src="<?php echo $this->Format->getNewsLogo($news['News'])?>" /></a><?php echo h($news['News']['article_date'])?></div>
                                <div class="title"><a href="<?php echo $this->Html->url(array('controller'=>'news','action'=>'detail', 'cn'=>true, $news['News']['id']))?>"><?php echo h($news['News']['title'])?></a></div>
                                <p><?php echo $this->Text->truncate(strip_tags($news['News']['intro']), 50)?></p>
                            </div>
                            <?php endforeach;?>
                        </div>
					</div>
				</li>
				<li id="subMeun3" <?php if($this->name=='News'):?>class="curr"<?php endif;?>>
					<a class="sub" href="<?php echo $this->Html->url(array('controller'=>'news', 'action'=>'index', 'cn'=>true))?>"><span>新闻资讯</span></a>					
					<div class="sub-meun">
						<ul>
							<?php foreach($newsType as $key=>$news):?>
							<li><a href="<?php echo $this->Html->url(array('controller'=>'news', 'action'=>'lists', 'cn'=>true, 'type'=>$key))?>"><?php echo h($news)?></a></li>
							<?php endforeach;?>
						</ul>
						<div class="subNews">
                            <?php foreach($newsNews as $news):?>
                            <div class="news-list">
                                <div class="pic"><a href="<?php echo $this->Html->url(array('controller'=>'news','action'=>'detail', 'cn'=>true, $news['News']['id']))?>"><img src="<?php echo $this->Format->getNewsLogo($news['News'])?>" /></a><?php echo h($news['News']['article_date'])?></div>
                                <div class="title"><a href="<?php echo $this->Html->url(array('controller'=>'news','action'=>'detail', 'cn'=>true, $news['News']['id']))?>"><?php echo h($news['News']['title'])?></a></div>
                                <p><?php echo $this->Text->truncate(strip_tags($news['News']['intro']), 50)?></p>
                            </div>
                            <?php endforeach;?>
                        </div>
					</div>
				</li>
				<li <?php if($this->name=='Member'):?>class="curr"<?php endif;?>>
				    <a href="<?php echo $this->Html->url(array('controller'=>'member', 'action'=>'index', 'cn'=>true))?>"><span>会员中心</span></a>
				</li>
                <li id="subMeun4" <?php if($this->name=='About'):?>class="curr"<?php endif;?>><a class="sub" href="<?php echo $this->Html->url(array('controller'=>'about', 'action'=>'index', 'cn'=>true))?>"><span>关于我们</span></a>
                    <div class="sub-meun" style="display: none; ">
                        <ul>
                            <li><a href="<?php echo $this->Html->url(array('controller'=>'about', 'action'=>'index', 'cn'=>true))?>">中心简介</a></li>
                            <li><a href="<?php echo $this->Html->url(array('controller'=>'about', 'action'=>'department', 'cn'=>true))?>">评审团队</a></li>
                            <li><a href="<?php echo $this->Html->url(array('controller'=>'about', 'action'=>'partners', 'cn'=>true))?>">指导及合作单位</a></li>
                        </ul>
                        <div class="subNews">
                            <?php foreach($aboutNews as $news):?>
                            <div class="news-list">
                                <div class="pic"><a href="<?php echo $this->Html->url(array('controller'=>'news','action'=>'detail', 'cn'=>true, $news['News']['id']))?>"><img src="<?php echo $this->Format->getNewsLogo($news['News'])?>" /></a><?php echo h($news['News']['article_date'])?></div>
                                <div class="title"><a href="<?php echo $this->Html->url(array('controller'=>'news','action'=>'detail', 'cn'=>true, $news['News']['id']))?>"><?php echo h($news['News']['title'])?></a></div>
                                <p><?php echo $this->Text->truncate(strip_tags($news['News']['intro']), 50)?></p>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </li>
			</ul>
		</div>
	</div>
	<?php echo $content_for_layout?>
</div>
<div id="footer">
	<div>
		<a class="fLogo" href=<?php echo $this->Html->url(array('controller'=>'home', 'action'=>'index', 'cn'=>true))?>>上海酒类消费指数中心 | Shanghai Wine Index Center</a>
		<ul>
            <?php foreach($links as $link):?>
			<li><a href="<?php echo $this->Html->url(array('controller'=>'link', 'action'=>'view', 'cn'=>true, $link['Link']['id']))?>"><?php echo h($link['Link']['title'])?></a></li>
			<?php endforeach;?>            
		</ul>
		<small>Copyright &copy; 2011-2012 <strong>SWIC</strong> All rights reserved.</small>
	</div>
</div>
<?php echo $this->element('sql_dump'); ?>
</body>
</html>
