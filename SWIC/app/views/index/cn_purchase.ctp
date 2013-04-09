<div id="content" class="indexCenter">
    <div class="sidebar">
        <?php echo $this->element('index/menu')?>
        <div class="AdBox"><a href="#"><img src="/images/cn/ad_1.png" width="300" height="200" /></a></div>  
    </div>
    <div class="main">
        <div class="globalnav">
            <a class="home" href="<?php echo $this->Html->url(array('controller'=>'home', 'action'=>'index', 'cn'=>true))?>">首页</a>
            <a href="<?php echo $this->Html->url(array('action'=>'index', 'cn'=>true))?>">指数中心</a>
            <strong>采购指数</strong>
            <span class="updateTime"><?php echo date('Y')?>年<?php echo date('n')?>月<?php echo date('j')?>日更新</span>
        </div>
        <div class="exponentBig" width="645" height="428" id="container">
        </div>
    </div>
    <br clear="all" />
</div>
<?php echo $this->Html->script('highcharts/highcharts')?>
<?php echo $this->Html->script('frontend/index/purchase')?>