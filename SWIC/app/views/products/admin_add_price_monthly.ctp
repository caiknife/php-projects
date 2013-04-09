<li>
	<strong><?php echo h(sprintf('%.2f', $price['price']))?></strong> / <?php echo h($price['year'])?>年<?php echo h($price['month'])?>月 
	<a href="<?php echo $this->Html->url(array('action'=>'edit_price_monthly', 'admin'=>true, $price['id']))?>" class="edit_price_monthly">编辑</a> <a href="<?php echo $this->Html->url(array('action'=>'delete_price_monthly', 'admin'=>true, $price['id']))?>" class="delete_price_monthly">删除</a>
</li>