<li data="<?php echo $banner['Banner']['id']?>">
	<img title="拖动排序" src="<?php echo $this->Format->getBanner($banner['Banner'])?>" />
	<strong><?php echo h($banner['Banner']['title'])?></strong>
	<?php if($banner['Banner']['url']):?>
	<span><a href="<?php echo $banner['Banner']['url']?>" target="_blank"><?php echo $banner['Banner']['url']?></a></span>
	<?php endif?>
	<a href="<?php echo $this->Html->url(array('action'=>'edit', $banner['Banner']['id']))?>" class="edit">编辑</a> 
	<a href="<?php echo $this->Html->url(array('action'=>'delete', $banner['Banner']['id']))?>" class="delete">删除</a>
</li>