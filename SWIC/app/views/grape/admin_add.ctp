<tr data="<?php echo h($grape['id'])?>">
	<td title="拖动排序" class="title"><?php echo h($grape['title_cn'])?> | <?php echo h($grape['title_en'])?> | <?php echo h($grape['title_other'])?></td>
	<td class="operate">
		<a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $grape['id']))?>" class="edit">编辑</a>
		<a data="<?php echo $this->Html->url(array('action'=>'count', 'admin'=>true, $grape['id']))?>" href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $grape['id']))?>" class="delete">删除</a> 
	</td>
</tr>