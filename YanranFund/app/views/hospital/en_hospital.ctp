<div id="main">
    <div class="subNav">
        <?php echo $this->element('hospital/'.$lang.'_menu')?>
    </div>
    <ul class="hospitalList">
        <?php foreach($hospitals as $hospital):?>
        <li>
            <a href="<?php echo $this->Html->url(array('action'=>'viewhospital', $hospital['Hospital']['id']))?>">
                <span>
                    <img src="<?php echo $this->Format->getHospitalListImage($hospital['Hospital'])?>" />
                </span>
                <strong><?php echo h($hospital['Hospital']['title_'.$lang])?></strong>
                <?php echo h($hospital['Hospital']['desc_'.$lang])?>
            </a>
        </li>
        <?php endforeach;?>
    </ul>
    <div class="clear"></div>
    <div class="toTopWrap"><a class="toTop" href="#content">Back to Top</a></div>
</div>