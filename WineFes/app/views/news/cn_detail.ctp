<div id="content">
    <div class="sidebar hotLsit">
        <dl>
            <dt>热门新闻</dt>
            <?php foreach($hotNewses as $hotNews):?>
            <dd><a href="<?php echo $this->Html->url(array('action'=>'detail', 'cn'=>true, $hotNews['News']['id']))?>"><?php echo h($hotNews['News']['title'])?></a> <span><?php echo $this->Format->toDate($hotNews['News']['news_date'], 'Y.m.d')?></span></dd>
            <?php endforeach;?>
        </dl>
        <?php echo $this->element('cn_quicklink')?>
    </div>
    <div class="main2">
        <div class="mainbav"><a class="home" href="/">首页</a><span>酒节新闻</span><strong><?php echo h($newsType[$news['News']['type_id']])?></strong></div>
        <h2 class="title"><?php echo h($news['News']['title'])?></h2>
        <div class="artInfo"><?php echo $this->Format->toDate($news['News']['news_date'], 'Y年m月d日')?> | 来源：<?php echo h($news['News']['source'])?></div>
        <div id="Cms">
            <?php echo $news['News']['content']?>
        </div>
    </div>
</div>