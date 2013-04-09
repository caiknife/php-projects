<li data="<?php echo $member['id']?>">
	<strong><?php echo h($member['title'])?></strong>
	<a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $member['id']))?>" class="edit">编辑</a> 
	<a href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $member['id']))?>" class="delete">删除</a>
</li>