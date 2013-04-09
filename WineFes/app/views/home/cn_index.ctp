<div id="content">
    <div class="indexAbout">
        <h2>2012上海酒节，呈现上海滩最盛大的美酒嘉年华</h2>
        <p>2012年9月19日，“第八届上海酒节”将在上海虹口足球场隆重揭幕。本届酒节以“酒品世界，美好人生”为主题，汇聚来自25个国家和地区的上千种佳酿，各类地道中西美食，以及美妙曼动流淌的音乐、缤纷奇幻的演出、异域风情的人文展示，在金秋“酒”月间，盛情为上海人民带来一场全新的美酒音乐嘉年华。</p>
    </div>
    <ul class="indexEvents">
        <?php foreach($activities as $activity):?>
        <li>
            <h3><?php echo h($activity['Activity']['title'])?></h3>
            <a href="<?php echo $this->Html->url(array('controller'=>'activity', 'action'=>'detail', 'cn'=>true, $activity['Activity']['id']))?>"><img src="<?php echo $this->Format->getActivityLogo($activity['Activity'])?>" /></a>
            <p><?php echo $this->Text->truncate(strip_tags($activity['Activity']['intro']), 50)?></p>
            <a class="more" href="<?php echo $this->Html->url(array('controller'=>'activity', 'action'=>'detail', 'cn'=>true, $activity['Activity']['id']))?>" target="_blank">了解更多 &raquo;</a>
        </li>
        <?php endforeach;?>
    </ul>
    <div class="indexGuest">
        <h3>应邀嘉宾</h3>
        <ul>
            <?php foreach($guests as $guest):?>
            <li><img alt="<?php echo h($guest['Guest']['title'])?>" title="<?php echo h($guest['Guest']['title'])?>" src="<?php echo $this->Format->getGuest($guest['Guest'])?>" /></li>
            <?php endforeach;?>
        </ul>
    </div>
    <div class="indexMechanism">
        <h3>组织机构</h3>
        <div class="cms">
            <?php echo $organization['Article']['content']?>
        </div>
    </div>
</div>
<?php echo $this->Html->css('frontend/index', 'stylesheet', array('media'=>'screen', 'inline'=>false));?>
<?php echo $this->Html->script('frontend/home/index')?>