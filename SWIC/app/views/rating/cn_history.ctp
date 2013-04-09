<div id="content">
    <div class="sidebar">
        <?php echo $this->element('rating/menu')?>
        <div class="AdBox"><a href="#"><img src="/images/cn/ad_1.png" width="300" height="200" /></a></div>
    </div>
    <div class="main">
        <div class="globalnav">
            <a class="home" href="<?php echo $this->Html->url(array('controller'=>'home', 'action'=>'index', 'cn'=>true))?>">首页</a>
            <a href="<?php echo $this->Html->url(array('controller'=>'rating', 'action'=>'index', 'cn'=>true))?>">评级评分</a>
            <strong>酒评历史</strong>
        </div>
        <ul class="historyBox">
        </ul>
    </div>
    <br clear="all" />
</div>
<?php echo $this->Html->script('frontend/rating/history')?>