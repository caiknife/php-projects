<div id="main">
    <div class="subNav">
        <?php echo $this->element('info/'.$lang.'_menu')?>
    </div>
    <h2 class="mlr_10"><?php echo h($album['Album']['title_'.$lang])?></h2>
    <ul class="galleryList">
        <?php foreach($album['Photo'] as $photo):?>
        <li>
            <a data-fancybox-group="thumb" title="<?php echo $photo['title_'.$lang]?>" href="<?php echo $this->Format->getPhotoBigImage($photo)?>">
                <img src="<?php echo $this->Format->getPhotoListImage($photo)?>" />
                <strong><?php echo $photo['title_'.$lang]?></strong>
            </a>
        </li>
        <?php endforeach;?>
    </ul>
    <div class="clear"></div>
    <div class="toTopWrap"><a class="toBack" href="<?php echo $this->Html->url(array('action'=>'album'))?>">Back to List</a></div>
</div>
<?php echo $this->Html->script('jquery.fancybox.pack')?>
<?php echo $this->Html->script('jquery.fancybox-thumbs')?>
<?php echo $this->Html->script('frontend/info/viewalbum')?>