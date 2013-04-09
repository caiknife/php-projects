<div id="content" class="index">
    <div class="mainPoster"><img src="<?php echo $this->Format->getBoard($board['Board'])?>" /><span class="tIndex"></span></div>
    <div class="hotNews">
        <h3>HOT SPOT</h3>
        <div class="btn"><a class="btnLeft" href="#"></a><a class="btnRight" href="#"></a></div>
        <ul>
            <?php foreach($hotNews as $news):?>
            <li><a href="<?php echo $this->Html->url(array('controller'=>'news', 'action'=>'view', $lang=>true, $news['News']['id']))?>"><?php echo h($news['News']['title'])?></a></li>
            <?php endforeach;?>
        </ul>   
    </div>
    <div class="main">
        <div class="idTransformView">
            <h3>SERVICES</h3>
            <ul class="idSlider">
                <?php foreach($banners as $banner):?>
                <li><img src="<?php echo $this->Format->getBanner($banner['Banner'])?>" /></li>
                <?php endforeach;?>
            </ul>
            <div class="idNum"></div>
        </div>
        <div class="expertList">
            <h3>SPECIALIST</h3>
            <ul>
                <?php foreach($teams as $team):?>
                <li>
                    <a title="<?php echo h($team['Team']['name_'.$lang])?>" href="<?php echo $this->Html->url(array('controller'=>'team', $lang=>true, '#'=>'team'.$team['Team']['id']))?>">
                        <img src="<?php echo $this->Format->getTeam($team['Team'])?>" />
                    </a>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
    <div class="sidebar">
        <div class="service">
            <h3>RECOMMENDED</h3>
            <a href="#"><img src="/images/service_01.jpg" width="340" height="300" /></a>
        </div>
        <div class="qLink">
            
        </div>
    </div>
    <div class="cooperationList">
        <h3>COLLABORATORS</h3>
        <ul>
            <?php foreach($partners as $partner):?>
            <li><a title="<?php echo $partner['Partner']['title_'.$lang]?>" href="#" target="_blank"><img src="<?php echo $this->Format->getPartner($partner['Partner'])?>" /></a></li>
            <?php endforeach;?>
        </ul>
    </div>
</div>
<?php echo $this->Html->script('jquery.SliderShow')?>
<?php echo $this->Html->script('frontend/home/index')?>