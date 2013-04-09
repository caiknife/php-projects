<div class="score" id="content">
    <div class="left">
        <?php if($unrating):?>
        <div class="plateBox upcoming">
            <h3><span><a href="<?php echo $this->Html->url(array('action'=>'upcoming', 'cn'=>true))?>"><?php echo h($unrating['TastingNotes']['title'])?> 待评预告</a></span></h3>
            <a class="more" href="<?php echo $this->Html->url(array('action'=>'upcoming', 'cn'=>true))?>">更多</a>
            <div class="overview">
                <ul>
                    <li>评审日期：<?php echo $this->Format->toDate($unrating['TastingNotes']['date_time'], 'Y年m月d日')?></li>
                    <li>评审场地：<?php echo h($unrating['TastingNotes']['address'])?></li>
                    <li>品酒数量：<?php echo sizeof($unrating['TastingScore'])?>款</li>
                </ul>
                <p><?php echo $this->Text->truncate(strip_tags($unrating['TastingNotes']['content']), 100)?></p>
            </div>
        </div>
        <?php endif;?>
        <div class="plateBox">
            <h3><span>酒评历史</span></h3>
            <a class="more" href="<?php echo $this->Html->url(array('action'=>'history', 'cn'=>true))?>">更多</a>
            <div class="switchYear">
                <?php foreach($years as $key=>$val):?>
                <a data="<?php echo $this->Html->url(array('action'=>'lists', 'cn'=>true, 'year'=>$val))?>" href="#"><?php echo h($val)?>年</a>
                <?php endforeach;?>
            </div>
            <ul class="historyBox">
                
            </ul>
        </div>
    </div>
    <div class="right">
        <div class="AdBox"><a href="#"><img src="/images/cn/ad_1.png" width="300" height="200" /></a></div>
        <div class="plateBox AdLink">
            <h3><span>上海酒类消费指数中心</span></h3>
            <ul>
                <li><a href="<?php echo $this->Html->url(array('controller'=>'about', 'action'=>'partners', 'cn'=>true, '#'=>'part3'))?>">指导部门</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller'=>'member', 'action'=>'index', 'cn'=>true, '#'=>'part1'))?>">常务理事会员</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller'=>'member', 'action'=>'index', 'cn'=>true, '#'=>'part2'))?>">理事会员</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller'=>'about', 'action'=>'department', 'cn'=>true, '#'=>'part1'))?>">顾问组</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller'=>'about', 'action'=>'department', 'cn'=>true, '#'=>'part2'))?>">专家组</a></li>
            </ul>
        </div>
    </div>
    <br clear="all" />
</div>
<?php echo $this->Html->script('frontend/rating/index')?>