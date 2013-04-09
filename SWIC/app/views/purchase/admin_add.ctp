<tr data="<?php echo h(sprintf('%.2f', $item['ratio']))?>">
	<td>
		<?php echo h($item['country'])?>
	</td>
	<td>
		<?php echo h(sprintf('%.2f', $item['ratio']))?>%
	</td>
	<td class="operate">
		<a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $item['id']))?>" class="edit">编辑</a>
		<a href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $item['id']))?>" class="delete">删除</a>
	</td>
</tr>