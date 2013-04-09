<style>
html,body {height:100%}
body {background:#DFE1E3; height:100%; border-right:#ccc 1px solid}
</style>
<script type="text/javascript">
$(document).ready(function() {
	$('#menu dd,#menu dt').click(function(){
		$('#menu dd,#menu dt').removeClass('curr');
		$(this).addClass('curr');
	});
});
</script>
<div id="menu">
	<dl>
		<dt><span>酒库</span></dt>
		<?php foreach($wineType as $key => $value):?>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'products', 'action'=>'index', 'admin'=>true, 'type'=>$key))?>" target="main"><?php echo h($value)?></a></dd>
		<?php endforeach;?>
		<dd><hr /></dd>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'winetype', 'action'=>'index', 'admin'=>true))?>" target="main">酒分类管理</a></dd>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'region', 'action'=>'index', 'admin'=>true))?>" target="main">产区管理</a></dd>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'winery', 'action'=>'index', 'admin'=>true))?>" target="main">酒庄管理</a></dd>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'level', 'action'=>'index', 'admin'=>true))?>" target="main">法定级别管理</a></dd>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'importer', 'action'=>'index', 'admin'=>true))?>" target="main">进口商管理</a></dd>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'grape', 'action'=>'index', 'admin'=>true))?>" target="main">葡萄品种管理</a></dd>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'subindex', 'action'=>'index', 'admin'=>true))?>" target="main">指数分类管理</a></dd>
	</dl>
	<hr />
	<dl>
		<dt><span>新闻中心</span>
			<ul>
				<?php foreach($newsType as $key=>$type):?>
				<li><a href="<?php echo $this->Html->url(array('controller'=>'news', 'action'=>'add', 'admin'=>'true', 'type'=>$key))?>" target="main">添加<?php echo h($type)?></a></li>
				<?php endforeach;?>
			</ul>
		</dt>
		<?php foreach($newsType as $key=>$type):?>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'news', 'action'=>'index', 'admin'=>'true', 'type'=>$key))?>" target="main"><?php echo h($type)?></a></dd>
		<?php endforeach;?>
		<dd><hr /></dd>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'news', 'action'=>'featured', 'admin'=>'true'))?>" target="main">新闻首页推荐</a></dd>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'newstype', 'action'=>'index', 'admin'=>'true'))?>" target="main">新闻分类管理</a></dd>
	</dl>
	<hr />
	<dl>
		<dt><span>指数中心</span></dt>
		<?php foreach($wineType as $key => $value):?>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'index', 'action'=>'index', 'admin'=>true, 'type'=>$key))?>" target="main"><?php echo h($value)?>指数</a></dd>
		<?php endforeach;?>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'purchase', 'action'=>'index', 'admin'=>true))?>" target="main">采购指数</a></dd>
	</dl>
	<hr />
	<dl>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'banner', 'action'=>'index', 'admin'=>true))?>" target="main">首页KV管理</a></dd>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'note', 'action'=>'index', 'admin'=>true))?>" target="main">酒评管理</a></dd>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'team', 'action'=>'index', 'admin'=>true))?>" target="main">中国酒类商品评审委员会</a></dd>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'partners', 'action'=>'index', 'admin'=>true))?>" target="main">合作方管理</a></dd>
		<dd><a href="<?php echo $this->Html->url(array('controller'=>'member', 'action'=>'index', 'admin'=>true))?>" target="main">会员管理</a></dd>
        <dd><a href="<?php echo $this->Html->url(array('controller'=>'link', 'action'=>'index', 'admin'=>true))?>" target="main">网站底部链接管理</a></dd>
	</dl>
</div>
