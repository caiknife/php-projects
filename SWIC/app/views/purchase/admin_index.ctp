<div id="content">
	<form>
	<h2>采购指数</h2>
	<div class="page"></div>
	<table class="tab exponentList">
		<thead>
			<tr>
				<td>国家</td>
				<td>比率</td>
				<td class="operate">操作</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach($purchases as $item):?>
			<tr data="<?php echo h($item['IndexPurchase']['ratio'])?>">
				<td>
					<?php echo h($item['IndexPurchase']['country'])?>
				</td>
				<td>
					<?php echo h($item['IndexPurchase']['ratio'])?>%
				</td>
				<td class="operate">
					<a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $item['IndexPurchase']['id']))?>" class="edit">编辑</a>
					<a href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $item['IndexPurchase']['id']))?>" class="delete">删除</a>
				</td>
			</tr>
			<?php endforeach;?>
			<tr>
				<td>
					<?php echo $this->Form->text('AddIndex.country', array('title'=>'国家'))?> 
				</td>
				<td>
					<?php echo $this->Form->text('AddIndex.ratio', array('title'=>'比率', 'class'=>'short'))?>
				</td>
				<td class="operate"><a href="#" class="add">添加</a></td>
			</tr>
		</tbody>
	</table>
	</form>
</div>
<?php echo $this->Html->script('admin/purchase/index')?>