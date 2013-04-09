<div id="content">
    <div class="mainPoster"><img src="<?php echo $this->Format->getBoard($board['Board'])?>" /><span class="tNews"></span></div>
    <div class="main newsPage">
        <h2><?php echo h($newsTypes[$type])?></h2>
        <ul class="newsList">
            <!-- 7天内的新闻拥有NEW标签 -->
            <?php foreach($newses as $news):?>
            <li>
                <a href="<?php echo $this->Html->url(array('action'=>'view', $lang=>true, $news['News']['id']))?>"><?php echo h($news['News']['title'])?></a><?php if($this->Format->isNew($news['News']['news_date'])):?><em>NEW</em><?php endif;?> 
                <span><?php echo $this->Format->toDate($news['News']['news_date'], 'Y.m.d')?></span>
            </li>
            <?php endforeach;?>
        </ul>
        <div class="pageFlip">
            <?php echo $this->element('news/'.$lang.'_paginate')?>
        </div>
    </div>
    <div class="sidebar">
        <ul class="sideNav">
            <?php foreach($newsTypes as $key=>$val):?>
            <li <?php if($key==$type):?>class="curr"<?php endif;?>><a href="<?php echo $this->Html->url(array($lang=>true, 'type'=>$key))?>"><?php echo h($val)?></a></li>
            <?php endforeach;?>
        </ul>
        <div class="qLink"></div>
    </div>
</div>