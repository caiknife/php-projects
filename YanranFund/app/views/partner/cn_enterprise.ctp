<div id="main">
    <div class="subNav">
        <?php echo $this->element('partner/'.$lang.'_menu')?>
    </div>
    <ul class="partnerList_01">
        <?php foreach($enterprises as $enterprise):?>
        <li>
            <span>
                <?php if(!empty($enterprise['Enterprise']['url'])):?>
                <a href="<?php echo $enterprise['Enterprise']['url']?>" target="_blank"><img src="<?php echo $this->Format->getEnterpriseListImage($enterprise['Enterprise'])?>" /></a>
                <?php else:?>
                <img src="<?php echo $this->Format->getEnterpriseListImage($enterprise['Enterprise'])?>" />
                <?php endif;?>
            </span>
        </li>
        <?php endforeach;?>
    </ul>
    <div class="clear"></div>
    <div class="toTopWrap"><a class="toTop" href="#content">回到顶部</a></div>
</div>