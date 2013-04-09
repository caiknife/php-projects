<div id="content">
	<h2>酒评管理 <a href="<?php echo $this->Html->url(array('action'=>'add', 'admin'=>true))?>">添加</a></h2>
	<div class="page">
		<?php echo $this->Form->create('TastingNotes', array('type'=>'post', 'url'=>array('controller'=>'note', 'action'=>'index', 'admin'=>true)));?>
		<?php echo $this->element('note/paginate')?>
		<?php echo $this->Form->select('year', $this->Format->setWineAge(), null, array('empty'=>'年份'))?>
		<?php echo $this->Form->end();?>
	</div>
	<table class="tab productList">
		<thead>
			<tr>
				<td class="title">期号</td>
				<td>日期</td>
				<td>场地</td>
				<td>状态</td>
				<td>品酒数量</td>
				<td class="operate">操作</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach($notes as $note):?>
			<tr>
				<td class="title"><?php echo h($note['TastingNotes']['title'])?></td>
				<td class="title"><?php echo $this->Format->toDate($note['TastingNotes']['date_time'], 'Y年m月d日')?></td>
				<td><?php echo h($note['TastingNotes']['address'])?></td>
				<td><?php echo h($status[$note['TastingNotes']['status']])?></td>
				<td><?php echo sizeof($note['TastingScore'])?></td>
				<td class="operate">
					<a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $note['TastingNotes']['id']))?>">编辑</a> 
					<a data="<?php echo sizeof($note['TastingScore'])?>" href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $note['TastingNotes']['id']))?>" class="delete">删除</a>
				</td>
			</tr>
			<?php endforeach;?>
		<tbody>
	</table>
	<div class="page">
		<?php echo $this->Form->create('TastingNotes', array('type'=>'post', 'url'=>array('controller'=>'note', 'action'=>'index', 'admin'=>true)));?>
		<?php echo $this->element('note/paginate')?>
		<?php echo $this->Form->select('year', $this->Format->setWineAge(), null, array('empty'=>'年份'))?>
		<?php echo $this->Form->end();?>
	</div>
</div>
<?php echo $this->Html->script('admin/note/index')?>