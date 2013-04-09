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
            <?php foreach($results as $note):?>
            <li class="historyList">
                <h4><a href="<?php echo $this->Html->url(array('action'=>'detail', 'cn'=>true, $note['TastingNotes']['id']))?>"><?php echo h($note['TastingNotes']['title'])?></a></h4>
                <div class="overview">
                    <ul>
                        <li>评审日期：<?php echo $this->Format->toDate($note['TastingNotes']['date_time'], 'Y年m月d日')?></li>
                        <li>评审场地：<?php echo h($note['TastingNotes']['address'])?></li>
                        <li>品酒数量：<?php echo sizeof($note['TastingScore'])?>款</li>
                    </ul>
                    <p><?php echo $this->Text->truncate(strip_tags($note['TastingNotes']['content']), 100)?></p>
                </div>
            </li>
            <?php endforeach;?>
        </ul>
    </div>
    <br clear="all" />
</div>
<script>
$(function(){

$('li.historyList').live('click', function(){
    var url = $(this).find('a').attr('href');
    self.location = url;
});
    
});
</script>