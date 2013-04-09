<div id="content">
	<form method="post">
	<h2><?php echo h($wineType[$type])?> <?php echo $this->Form->select('IndexCenter.index_sub_id', $subindexes, null, array('empty'=>'请选择指数'))?></h2>
	<div class="page"></div>
	<!--table 对应 h2里下拉菜单 应该是3张表切换-->
	<?php echo $this->Form->hidden('IndexCenter.index_type', array('value'=>$type))?>
	<table class="tab exponentList">
		<thead>
			<tr>
				<td class="title">年份/月份</td>
				<td align="center">当月总计</td>
				<td align="center">基准总计</td>
				<td class="operate">操作</td>
			</tr>
		</thead>
		<?php if($subtype):?>
		<tbody>
			<tr>
				<td class="title">
					<?php echo $this->Form->select('AddIndexCenter.year', $this->Format->setYearRange(), null, array('empty'=>'年份'))?>
					<?php echo $this->Form->select('AddIndexCenter.month', $this->Format->setMonthRange(), null, array('empty'=>'月份'))?>
				</td>
				<td align="center"><?php echo $this->Form->text('AddIndexCenter.price_monthly')?><span>参考当月总计：￥<label></label></span></td>
				<td align="center"><?php echo $this->Form->text('AddIndexCenter.price_benchmark')?><span>参考基准总计：￥<label></label></span></td>
				<td class="operate"><a href="#" class="calculate">计算</a> <a href="#" class="add">增加</a></td>
			</tr>
			<?php foreach($indexes as $index):?>
			<tr>
				<td class="title"><?php echo h($index['IndexCenter']['year'])?>年/<?php echo h($index['IndexCenter']['month'])?>月</td>
				<td align="center">￥<?php echo h($index['IndexCenter']['price_monthly'])?></td>
				<td align="center">￥<?php echo h($index['IndexCenter']['price_benchmark'])?></td>
				<td class="operate">
					<a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $index['IndexCenter']['id']))?>" class="edit">编辑</a>
					<a href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $index['IndexCenter']['id']))?>" class="delete">删除</a> 
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
		<?php endif;?>
	</table>
	</form>
</div>
<?php echo $this->Html->script('admin/index/index')?>