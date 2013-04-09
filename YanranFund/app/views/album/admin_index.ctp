<div id="content">
	<h2>相册 <a href="<?php echo $this->Html->url(array('action'=>'add'))?>">添加</a></h2>
	<div class="page"></div>
	<div class="conList albumList">
		<ul>
            <?php foreach($albums as $album):?>
			<li data="<?php echo $album['Album']['id']?>">
                <div><img title="拖动排序" src="<?php echo $this->Format->getAlbumListImage($album['Album'])?>" /></div>
                <strong class="name"><?php echo h($album['Album']['title_cn'])?> | <?php echo h($album['Album']['title_en'])?></strong>
                <a href="<?php echo $this->Html->url(array('action'=>'edit', $album['Album']['id']))?>">编辑</a> 
                <a href="<?php echo $this->Html->url(array('action'=>'delete', $album['Album']['id']))?>" class="delete">删除</a>
            </li>
            <?php endforeach;?>
		</ul>
	</div>
</div>
<?php echo $this->Html->script('admin/album/index')?>