<div id="main">
    <div class="subNav">
        <?php echo $this->element('info/'.$lang.'_menu')?>
    </div>
    <ul class="newsList_02">
        <?php foreach($topics as $topic):?>
        <li>
            <a target="_blank" class="downloadType <?php echo $this->Format->getFileType($topic['Topic']['banner_file_path'])?>" href="<?php echo $this->Html->url(array('controller'=>'resource', 'action'=>'download', $topic['Topic']['banner_file_path']))?>">Download<br /><?php echo $topic['Topic']['banner_file_size']?></a>
            <strong><?php echo h($topic['Topic']['title'])?></strong>
            <span><em><?php echo $this->Format->toDate($topic['Topic']['topic_date'], 'Y.m.d')?></em></span>
            <p><?php echo h($topic['Topic']['desc'])?></p>
        </li>
        <?php endforeach;?>
    </ul>
    <div class="clear"></div>
    <div class="pageBar">
        <?php echo $this->element('info/'.$lang.'_paginate')?>
    </div>
</div>