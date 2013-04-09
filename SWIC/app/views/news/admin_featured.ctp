<div id="content">
	<h2>新闻首页推荐 <span>(可拖动列表排序,只显示前5篇)</span><!--名字对应菜单名字--></h2>
	<div class="page"></div>
	<table class="tab newsList newsRecommend">
		<thead>
			<tr>
				<td class="title">新闻名称</td>
				<td width="100" align="center">类别</td>
				<td class="operate">操作</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach($newses as $news):?>
			<tr data="<?php echo $news['News']['id']?>">
				<td class="title">
					<a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $news['News']['id']))?>"><img src="<?php echo $this->Format->getNewsLogo($news['News'])?>" /></a>
					<a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $news['News']['id']))?>"><?php echo h($news['News']['title'])?></a>
					<p><?php echo $this->Text->truncate(strip_tags($news['News']['intro']), 200)?></p>
				</td>
				<td align="center"><?php echo h($newsType[$news['News']['type_id']])?></td>
				<td class="operate">
					<a href="<?php echo $this->Html->url(array('action'=>'unfeature', 'admin'=>true, $news['News']['id']))?>" class="unfeature">取消推荐</a> 
					<a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $news['News']['id']))?>">编辑</a>
				</td>
			</tr>
			<?php endforeach;?>
		<tbody>
	</table>	
	<div class="page"></div>
</div>
<?php echo $this->Html->script('admin/news/featured')?>