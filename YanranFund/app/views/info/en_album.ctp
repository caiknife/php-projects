<div id="main">
    <div class="subNav">
        <?php echo $this->element('info/'.$lang.'_menu')?>
    </div>
    <ul class="galleryList">
        <?php foreach($albums as $album):?>
        <li>
            <a href="<?php echo $this->Html->url(array('action'=>'viewalbum', $album['Album']['id']))?>">
                <img src="<?php echo $this->Format->getAlbumListImage($album['Album'])?>" />
                <i><i></i></i>
                <strong><?php echo h($album['Album']['title_'.$lang])?></strong>
                </a>
        </li>
        <?php endforeach;?>
    </ul>
    <div class="clear"></div>
    <div class="toTopWrap"><a class="toTop" href="#content">Back to Top</a></div>
</div>