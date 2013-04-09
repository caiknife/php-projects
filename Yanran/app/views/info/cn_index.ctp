<div id="content">
    <div class="mainPoster"><img src="<?php echo $this->Format->getBoard($board['Board'])?>" /><span class="tInformation"></span></div>
    <div class="main newsPage">
        <h2>健康资讯</h2>
        <ul class="newsList">
            <!-- 7天内的新闻拥有NEW标签 -->
            <?php foreach($infos as $info):?>
            <li>
                <a href="<?php echo $this->Html->url(array('action'=>'view', $lang=>true, $info['Info']['id']))?>"><?php echo h($info['Info']['title'])?></a><?php if($this->Format->isNew($info['Info']['news_date'])):?><em>NEW</em><?php endif;?> 
                <span><?php echo $this->Format->toDate($info['Info']['news_date'], 'Y.m.d')?></span>
            </li>
            <?php endforeach;?>
        </ul>
        <div class="pageFlip">
            <?php echo $this->element('info/'.$lang.'_paginate')?>
        </div>
    </div>
    <div class="sidebar">
        <ul class="sideNav">
            <li class="curr"><a href="<?php echo $this->Html->url(array($lang=>true))?>">健康资讯</a></li>
        </ul>
        <div class="qLink"></div>
    </div>
</div>