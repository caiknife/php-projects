<div id="content">
	<h2>法定级别管理 <span>(可拖动列表排序)</span></h2>
	<div class="page"></div>
	<!-- 删除类型之前需要确认此类型下是否有产品，若类型下有产品则无法删除，需要弹出JS框提示 -->
	<form>
	<table class="tab typeList">
		<thead>
			<tr>
				<td class="title">法定级别名称</td>
				<td class="operate">操作</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach($levels as $level):?>
			<tr data="<?php echo h($level['StatutoryLevel']['id'])?>">
				<td title="拖动排序" class="title"><?php echo h($level['StatutoryLevel']['title'])?></td>
				<td class="operate">
					<a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $level['StatutoryLevel']['id']))?>" class="edit">编辑</a>
					<a data="<?php echo $this->Html->url(array('action'=>'count', 'admin'=>true, $level['StatutoryLevel']['id']))?>" href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $level['StatutoryLevel']['id']))?>" class="delete">删除</a> 
				</td>
			</tr>
			<?php endforeach;?>
			<tr>
				<td class="title"><?php echo $this->Form->text('AddLevel.title', array('title'=>'法定级别名称'))?></td>
				<td class="operate"><a href="#" class="add">增加</a></td>
			</tr>
		</tbody>
	</table>
	</form>
</div>
<?php echo $this->Html->script('admin/level/index')?>