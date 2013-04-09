<tr data="<?php echo $subindex['id']?>">
	<td title="拖动排序" class="title">
	    <?php echo $subindex['title']?>
		<p><?php echo h($subindex['desc'])?></p>
	</td>
	<td><?php echo h($wineType[$subindex['pid']])?></td>
	<td class="operate">
		<a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $subindex['id']))?>" class="edit">编辑</a>
		<a data="<?php echo $this->Html->url(array('action'=>'count', 'admin'=>true, $subindex['id']))?>" href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $subindex['id']))?>" class="delete">删除</a> 
	</td>
</tr>