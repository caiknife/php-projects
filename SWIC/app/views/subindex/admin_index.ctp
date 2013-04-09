<div id="content">
	<h2>指数分类管理 <span>(可拖动列表排序)</span><a href="#">添加</a></h2>
	<div class="page"></div>
	<!-- 删除类型之前需要确认此类型下是否有产品，若类型下有产品则无法删除，需要弹出JS框提示 -->
	<form>
	<table class="tab estatesList">
		<thead>
			<tr>
				<td class="title">指数分类名称</td>
				<td>所属指数</td>
				<td class="operate">操作</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach($subindexes as $subindex):?>
			<tr data="<?php echo $subindex['Subindex']['id']?>">
				<td title="拖动排序" class="title">
				    <?php echo h($subindex['Subindex']['title'])?>
					<p><?php echo h($subindex['Subindex']['desc'])?></p>
				</td>
				<td><?php echo h($wineType[$subindex['Subindex']['pid']])?></td>
				<td class="operate">
					<a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $subindex['Subindex']['id']))?>" class="edit">编辑</a>
					<a data="<?php echo $this->Html->url(array('action'=>'count', 'admin'=>true, $subindex['Subindex']['id']))?>" href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $subindex['Subindex']['id']))?>" class="delete">删除</a> 
				</td>
			</tr>
			<?php endforeach;?>
			<tr>
				<td class="title">
				    <?php echo $this->Form->text('AddSubindex.title', array('title'=>'指数分类名称'))?>
				    <?php echo $this->Form->textarea('AddSubindex.desc', array('title'=>'指数简介'))?>
				</td>
				<td><?php echo $this->Form->select('AddSubindex.pid', $wineType, null, array('empty'=>false))?></td>
				<td class="operate"><a href="#" class="add">增加</a></td>
			</tr>
		</tbody>
	</table>	
	</form>
</div>
<?php echo $this->Html->script('admin/subindex/index')?>
