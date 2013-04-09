<li data="<?php echo $partner['Partner']['id']?>">
    <div><img title="拖动排序" src="<?php echo $this->Format->getPartner($partner['Partner'])?>" /></div>
    <strong><?php echo h($partner['Partner']['title'])?></strong>
    <span><a href="<?php echo $partner['Partner']['url']?>" target="_blank"><?php echo $partner['Partner']['url']?></a></span>
    <a href="<?php echo $this->Html->url(array('action'=>'edit', $partner['Partner']['id']))?>" class="edit">编辑</a> 
    <a href="<?php echo $this->Html->url(array('action'=>'delete', $partner['Partner']['id']))?>" class="delete">删除</a>
</li>