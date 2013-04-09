<div id="content">
	<h2>进口商管理 <a href="<?php echo $this->Html->url(array('action'=>'add', 'admin'=>true))?>">添加</a></h2>
	<div class="page">
	    <?php echo $this->Form->create('Importer', array('type'=>'post', 'url'=>array('controller'=>'importer', 'action'=>'index', 'admin'=>true)));?>
		<?php echo $this->element('importer/paginate')?>
		<?php echo $this->Form->end();?>
	</div>
	<!-- 删除类型之前需要确认此类型下是否有产品，若类型下有产品则无法删除，需要弹出JS框提示 -->
	<table class="tab importerList">
		<thead>
			<tr>
				<td class="title">进口商名称</td>
				<td>国家 | 地区</td>
				<td class="operate">操作</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach($importers as $importer):?>
			<tr>
				<td class="title"><a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $importer['Importer']['id']))?>"><?php echo h($importer['Importer']['title_cn'])?> | <?php echo h($importer['Importer']['title_en'])?></a></td>
				<td><?php echo h($importer['Importer']['country'])?> | <?php echo h($importer['Importer']['province'])?></td>
				<td class="operate">
					<a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $importer['Importer']['id']))?>">编辑</a>
					<a data="<?php echo $this->Html->url(array('action'=>'count', 'admin'=>true, $importer['Importer']['id']))?>" href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $importer['Importer']['id']))?>" class="delete">删除</a> 
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
	<div class="page">
		<?php echo $this->Form->create('Importer', array('type'=>'post', 'url'=>array('controller'=>'importer', 'action'=>'index', 'admin'=>true)));?>
		<?php echo $this->element('importer/paginate')?>
		<?php echo $this->Form->end();?>
	</div>
</div>
<?php echo $this->Html->script('admin/importer/index')?>