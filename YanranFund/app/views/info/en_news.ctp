<div id="main">
    <div class="subNav">
        <?php echo $this->element('info/'.$lang.'_menu')?>
    </div>
    <ul class="newsList_01">
        <?php foreach($newses as $news):?>
        <li>
            <a href="<?php echo $this->Html->url(array('action'=>'viewnews', $news['News']['id']))?>">
                <?php if($news['News']['has_video']):?>
                <i class="video"></i>
                <?php endif;?>
                <img src="<?php echo $this->Format->getNewsListImage($news['News'])?>" />
                <strong><?php echo h($news['News']['title'])?></strong>
                <em><?php echo $this->Format->toDate($news['News']['public_date'], 'Y.m.d')?></em>
            </a>
        </li>
        <?php endforeach;?>        
    </ul>
    <div class="clear"></div>
    <div class="pageBar">
        <?php echo $this->element('info/'.$lang.'_paginate')?>
    </div>
</div>