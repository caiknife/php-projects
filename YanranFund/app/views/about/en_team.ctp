<div id="main">
    <div class="subNav">
        <?php echo $this->element('about/'.$lang.'_menu')?>
    </div>
    <ul class="partnerList_02">
        <?php foreach($persons as $person):?>
        <li>
            <span><img src="<?php echo $this->Format->getPersonListImage($person['Person'])?>" /></span>
            <strong><?php echo h($person['Person']['title_'.$lang])?></strong>
        </li>
        <?php endforeach;?>
    </ul>
    <div class="clear"></div>
    <div class="toTopWrap"><a class="toTop" href="#content">Back to Top</a></div>
</div>