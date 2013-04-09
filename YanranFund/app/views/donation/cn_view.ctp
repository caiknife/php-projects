<div id="main">
    <div class="subNav">
        <?php foreach($donationList as $key=>$val):?>
        <a <?php if($key==$id):?>class="curr"<?php endif;?> href="<?php echo $this->Html->url(array('action'=>'view', $key))?>"><?php echo h($val)?></a>
        <?php endforeach;?>
    </div>
    <div class="p_20">
        <div id="Cms">
            <?php echo $donation['Donation']['content_'.$lang]?>
        </div>
    </div>
    <div class="clear"></div>
    <div class="toTopWrap"><a class="toTop" href="#content">回到顶部</a></div>
</div>