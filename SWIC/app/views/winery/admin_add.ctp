<tr data="<?php echo h($winery['id'])?>">
	<td title="拖动排序" class="title"><?php echo h($winery['title'])?></td>
	<td class="operate">
		<a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $winery['id']))?>" class="edit">编辑</a>
		<a data="<?php echo $this->Html->url(array('action'=>'count', 'admin'=>true, $winery['id']))?>" href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $winery['id']))?>" class="delete">删除</a> 
	</td>
</tr>