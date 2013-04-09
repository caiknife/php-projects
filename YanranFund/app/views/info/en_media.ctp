<div id="main">
    <div class="subNav">
        <?php echo $this->element('info/'.$lang.'_menu')?>
    </div>
    <ul class="newsList_02">
        <?php foreach($medias as $media):?>
        <li>
            <a target="_blank" class="downloadType <?php echo $this->Format->getFileType($media['Media']['banner_file_path'])?>" href="<?php echo $this->Html->url(array('controller'=>'resource', 'action'=>'download', $media['Media']['banner_file_path']))?>">Download<br /><?php echo $media['Media']['banner_file_size']?></a>
            <strong><?php echo h($media['Media']['title'])?></strong>
            <span><em><?php echo $this->Format->toDate($media['Media']['media_date'], 'Y.m.d')?></em> <?php echo h($media['Media']['source'])?></span>
        </li>
        <?php endforeach;?>
    </ul>
    <div class="clear"></div>
    <div class="pageBar">
        <?php echo $this->element('info/'.$lang.'_paginate')?>
    </div>
</div>