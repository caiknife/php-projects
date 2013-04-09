<tr data="<?php echo h($region['id'])?>">
	<td title="拖动排序" class="title"><?php echo h($region['title'])?></td>
	<td class="operate">
		<a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $region['id']))?>" class="edit">编辑</a>
		<a data="<?php echo $this->Html->url(array('action'=>'count', 'admin'=>true, $region['id']))?>" href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $region['id']))?>" class="delete">删除</a> 
	</td>
</tr>