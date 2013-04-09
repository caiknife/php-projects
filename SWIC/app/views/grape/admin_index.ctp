<div id="content">
	<h2>葡萄品种管理 <span>(可拖动列表排序)</span><a href="#">添加</a></h2>
	<div class="page"></div>
	<!-- 删除类型之前需要确认此类型下是否有产品，若类型下有产品则无法删除，需要弹出JS框提示 -->
	<form>
	<table class="tab typeList">
		<thead>
			<tr>
				<td title="拖动排序" class="title">名称中文 | 名称英文 | 原国家名称</td>
				<td class="operate">操作</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach($grapes as $grape):?>
			<tr data="<?php echo h($grape['GrapeVariety']['id'])?>">
				<td title="拖动排序" class="title"><?php echo h($grape['GrapeVariety']['title_cn'])?> | <?php echo h($grape['GrapeVariety']['title_en'])?> | <?php echo h($grape['GrapeVariety']['title_other'])?></td>
				<td class="operate">
					<a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $grape['GrapeVariety']['id']))?>" class="edit">编辑</a>
					<a data="<?php echo $this->Html->url(array('action'=>'count', 'admin'=>true, $grape['GrapeVariety']['id']))?>" href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $grape['GrapeVariety']['id']))?>" class="delete">删除</a> 
				</td>
			</tr>
			<?php endforeach;?>
			<tr>
				<td class="title">
					<?php echo $this->Form->text('AddGrape.title_cn', array('title'=>'名称中文'))?>
					<?php echo $this->Form->text('AddGrape.title_en', array('title'=>'名称英文'))?>
					<?php echo $this->Form->text('AddGrape.title_other', array('title'=>'原国家名称'))?>
				</td>
				<td class="operate"><a href="#" class="add">增加</a></td>
			</tr>
		</tbody>
	</table>
	</form>
</div>
<?php echo $this->Html->script('admin/grape/index')?>