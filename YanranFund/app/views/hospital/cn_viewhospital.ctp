<div id="main">
    <div class="subNav">
        <?php echo $this->element('hospital/'.$lang.'_menu')?>
    </div>
    <div class="hospitalDetail">
        <h2><?php echo $hospital['Hospital']['title_'.$lang]?></h2>
        <div id="Cms">
            <?php echo $hospital['Hospital']['content_'.$lang]?>
        </div>
    </div>
    <div class="clear"></div>
    <div class="toTopWrap"><a class="toTop" href="<?php echo $this->Html->url(array('action'=>'view', 2))?>">回到列表</a></div>
</div>