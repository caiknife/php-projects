<div id="content">
	<h2><?php echo h($newsType[$type])?><!--名字对应菜单名字--> <a href="<?php echo $this->Html->url(array('action'=>'add', 'admin'=>true, 'type'=>$type))?>">添加</a></h2>
	<div class="page">
	    <?php echo $this->Form->create('News', array('type'=>'post', 'url'=>array('controller'=>'news', 'action'=>'index', 'admin'=>true)));?>
		<?php echo $this->element('news/paginate')?>
        <?php echo $this->Form->hidden('type', array('value'=>$type))?>
		<?php echo $this->Form->end();?>
	</div>
	<table class="tab newsList">
		<thead>
			<tr>
				<td class="title">新闻名称</td>
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
				<td class="operate">
					<?php if($news['News']['is_feature']):?>
					<a href="<?php echo $this->Html->url(array('action'=>'unfeature', 'admin'=>true, $news['News']['id']))?>" class="unfeature">取消推荐</a>
					<?php else:?>
					<a href="<?php echo $this->Html->url(array('action'=>'feature', 'admin'=>true, $news['News']['id']))?>" class="feature">推荐</a>
					<?php endif;?>
					<a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $news['News']['id']))?>">编辑</a> 
					<a href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $news['News']['id']))?>" class="delete">删除</a>
				</td>
			</tr>
		    <?php endforeach;?>
		<tbody>
	</table>
	<div class="page">
		<?php echo $this->Form->create('News', array('type'=>'post', 'url'=>array('controller'=>'news', 'action'=>'index', 'admin'=>true)));?>
		<?php echo $this->element('news/paginate')?>
        <?php echo $this->Form->hidden('type', array('value'=>$type))?>
		<?php echo $this->Form->end();?>	
	</div>
</div>
<?php echo $this->Html->script('admin/news/index')?>