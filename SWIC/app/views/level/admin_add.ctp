<tr data="<?php echo h($level['id'])?>">
	<td title="拖动排序" class="title"><?php echo h($level['title'])?></td>
	<td class="operate">
		<a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $level['id']))?>" class="edit">编辑</a>
		<a data="<?php echo $this->Html->url(array('action'=>'count', 'admin'=>true, $level['id']))?>" href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $level['id']))?>" class="delete">删除</a> 
	</td>
</tr>