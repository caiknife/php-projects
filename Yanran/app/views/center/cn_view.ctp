<div id="content">
    <div class="mainPoster"><img src="<?php echo $this->Format->getBoard($board['Board'])?>" /><span class="tCraniofacial"></span></div>
    <div class="main aboutPage">
        <h2><?php echo h($block['Block']['title_'.$lang])?></h2>
        <div id="Cms">
            <?php echo $block['Block']['content_'.$lang]?>
        </div>
    </div>
    <div class="sidebar">
        <ul class="sideNav">
            <?php foreach($centerLists as $key=>$val):?>
            <li <?php if($key==$block['Block']['id']):?>class="curr"<?php endif;?>><a href="<?php echo $this->Html->url(array('action'=>'view', $lang=>true, $key))?>"><?php echo h($val)?></a></li>
            <?php endforeach;?>
        </ul>
        <div class="qLink"></div>
    </div>
</div>