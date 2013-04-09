<div id="content">
	<h2>产区管理 <span>(可拖动列表排序)</span></h2>
	<div class="page"></div>
	<!-- 删除类型之前需要确认此类型下是否有产品，若类型下有产品则无法删除，需要弹出JS框提示 -->
	<form>
	<table class="tab regionList">
		<thead>
			<tr>
				<td class="title">产区名称</td>
				<td class="operate">操作</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach($regions as $region):?>
			<tr data="<?php echo h($region['Region']['id'])?>">
				<td title="拖动排序" class="title"><?php echo h($region['Region']['title'])?></td>
				<td class="operate">
					<a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $region['Region']['id']))?>" class="edit">编辑</a>
					<a data="<?php echo $this->Html->url(array('action'=>'count', 'admin'=>true, $region['Region']['id']))?>" href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $region['Region']['id']))?>" class="delete">删除</a> 
				</td>
			</tr>
			<?php endforeach;?>
			<tr class="add">
				<td class="title"><?php echo $this->Form->text('AddRegion.title', array('title'=>'产区名称'))?></td>
				<td class="operate"><a href="#" class="add">增加</a></td>
			</tr>
		</tbody>
	</table>
	</form>
</div>
<?php echo $this->Html->script('admin/region/index')?>