<li data="<?php echo $guest['Guest']['id']?>">
    <img src="<?php echo $this->Format->getGuest($guest['Guest'])?>" />
    <strong class="name"><?php echo h($guest['Guest']['title'])?></strong>
    <a href="<?php echo $this->Html->url(array('action'=>'edit', $guest['Guest']['id']))?>" class="edit">编辑</a> 
    <a href="<?php echo $this->Html->url(array('action'=>'delete', $guest['Guest']['id']))?>" class="delete">删除</a>
</li>