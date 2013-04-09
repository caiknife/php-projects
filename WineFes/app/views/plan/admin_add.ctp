<li data="<?php echo $plan['Plan']['id']?>">
    <img title="拖动排序" src="<?php echo $this->Format->getPlan($plan['Plan'])?>" />
    <strong class="name"><?php echo h($plan['Plan']['title'])?></strong>
    <a href="<?php echo $this->Html->url(array('action'=>'edit', $plan['Plan']['id']))?>" class="edit">编辑</a> 
    <a href="<?php echo $this->Html->url(array('action'=>'delete', $plan['Plan']['id']))?>" class="delete">删除</a>
</li>