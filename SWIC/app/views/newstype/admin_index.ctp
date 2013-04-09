<div id="content">
	<h2>新闻分类管理 <span>(可拖动列表排序)</span></h2>
	<?php echo $this->Form->create('NewsType', array('type'=>'file', 'url'=>array('controller'=>'newstype', 'action'=>'add', 'admin'=>true)))?>
	<div class="page"></div>
	<!-- 删除类型之前需要确认此类型下是否有产品，若类型下有产品则无法删除，需要弹出JS框提示 -->
	<table class="tab productTypeList">
		<thead>
			<tr>
				<td class="title">新闻分类名称</td>
				<td class="operate">操作</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach($newsTypes as $type):?>
			<tr data="<?php echo $type['NewsType']['id']?>">
				<td title="拖动排序" class="title"><img src="<?php echo $this->Format->getNewstypeLogo($type['NewsType'])?>" /><?php echo h($type['NewsType']['title'])?></td>
				<td class="operate">
					<a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $type['NewsType']['id']))?>" class="edit">编辑</a> 
					<a data="<?php echo $this->Html->url(array('action'=>'count', 'admin'=>true, $type['NewsType']['id']))?>" href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $type['NewsType']['id']))?>" class="delete">删除</a>
				</td>
			</tr>
			<?php endforeach;?>
			<tr>
				<td class="title">
					<input title="上传图片" type="file" style="width:250px" id="newstype_logo" name="newstype_logo"/> 
					<input title="新闻分类" type="text" id="newstype_title" name="newstype_title"/> 
				</td>
				<td class="operate"><a href="#" class="add">增加</a></td>
			</tr>
		</tbody>
	</table>	
	<?php echo $this->Form->end()?>
</div>
<?php echo $this->Html->script('ajaxfileupload')?>
<?php echo $this->Html->script('admin/newstype/index')?>