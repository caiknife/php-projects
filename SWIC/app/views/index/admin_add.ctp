<tr>
	<td class="title"><?php echo h($index['year'])?>年/<?php echo h($index['month'])?>月</td>
	<td align="center">￥<?php echo sprintf('%.2f', $index['price_monthly'])?></td>
	<td align="center">￥<?php echo sprintf('%.2f', $index['price_benchmark'])?></td>
	<td class="operate">
		<a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $index['id']))?>" class="edit">编辑</a>
		<a href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $index['id']))?>" class="delete">删除</a> 
	</td>
</tr>