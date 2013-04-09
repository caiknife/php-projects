<tr data="<?php echo h($type['id'])?>">
	<td title="拖动排序" class="title"><?php echo h($type['title'])?></td>
	<td class="operate">
		<a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $type['id']))?>" class="edit">编辑</a>
		<a data="<?php echo $this->Html->url(array('action'=>'count', 'admin'=>true, $type['id']))?>" href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $type['id']))?>" class="delete">删除</a> 
	</td>
</tr>