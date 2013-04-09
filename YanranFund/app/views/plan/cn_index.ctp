<div id="main">
    <ul class="newsList_01">
        <?php foreach($plans as $plan):?>
        <li>
            <a href="<?php echo $this->Html->url(array('action'=>'view', $plan['Plan']['id']))?>">
                <?php if($plan['Plan']['has_video']):?>
                <i class="video"></i>
                <?php endif;?>
                <img src="<?php echo $this->Format->getPlanListImage($plan['Plan'])?>" />
                <strong><?php echo h($plan['Plan']['title'])?></strong>
                <em><?php echo $this->Format->toDate($plan['Plan']['public_date'], 'Y.m.d')?></em>
            </a>
        </li>
        <?php endforeach;?>
    </ul>
    <div class="clear"></div>
    <div class="pageBar">
        <?php echo $this->element('plan/'.$lang.'_paginate')?>
    </div>
</div>