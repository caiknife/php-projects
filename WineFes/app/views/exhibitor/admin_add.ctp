<li data="<?php echo $exhibitor['Exhibitor']['id']?>">
    <img src="<?php echo $this->Format->getExhibitor($exhibitor['Exhibitor'])?>" />
    <strong class="name"><?php echo h($exhibitor['Exhibitor']['title'])?></strong>
    <a href="<?php echo $this->Html->url(array('action'=>'edit', $exhibitor['Exhibitor']['id']))?>" class="edit">编辑</a> 
    <a href="<?php echo $this->Html->url(array('action'=>'delete', $exhibitor['Exhibitor']['id']))?>" class="delete">删除</a>
</li>