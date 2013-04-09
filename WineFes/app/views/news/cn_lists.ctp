<div id="content">
    <div class="newsList">
        <div class="mainbav"><a class="home" href="/">首页</a><span>酒节新闻</span><strong><?php if($type):?><?php echo h($newsType[$type])?><?php else:?>最新新闻<?php endif;?></strong></div>
        <?php echo $this->element('news/cn_switch')?>
        <!--<div class="switchBtn"><a class="curr" href="#">新闻回顾标题1</a> <a href="#">新闻回顾标题2</a> <a href="#">新闻回顾标题3</a></div>-->
        <!-- 每页15条新闻 -->
        <?php foreach($groupedNews as $key=>$group):?>
        <div class="newsTime"><i class="r1"></i><i class="r2"></i><strong><?php echo h($key)?></strong></div>
        <ul class="newsListCon">
            <?php foreach($group as $news):?>
            <li>
                <a class="pic" href="<?php echo $this->Html->url(array('action'=>'detail', 'cn'=>true, $news['id']))?>"><?php if($news['type_id']==2):?><i class="iconVideo"></i><?php endif;?><img src="<?php echo $this->Format->getNewsLogo($news)?>" /></a>
                <a class="title" href="<?php echo $this->Html->url(array('action'=>'detail', 'cn'=>true, $news['id']))?>"><?php echo h($news['title'])?></a>
                <span><?php echo $this->Format->toDate($news['news_date'], 'Y年m月d日')?> | 来源：<?php echo h($news['source'])?></span>
                <p><?php echo h($news['intro'])?></p>
            </li>
            <?php endforeach;?>
        </ul>
        <?php endforeach;?>
        <div class="pageFlip">
            <?php echo $this->element('news/cn_paginate')?>
        </div>
    </div>
</div>