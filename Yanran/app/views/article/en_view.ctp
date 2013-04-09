<div id="content">
    <div class="mainPoster"><img src="<?php echo $this->Format->getBoard($board['Board'])?>" /><span class="<?php echo $articleTypes[$type]['class']?>"></span></div>
    <div class="main aboutPage">
        <h2><?php echo h($articleTypes[$type][$lang])?></h2>
        <div id="Cms">
            <?php echo $article['Article']['content_'.$lang]?>
        </div>
    </div>
    <div class="sidebar">
        <ul class="sideNav">
            <li class="curr"><a href="<?php echo $this->Html->url(array('action'=>'view', $lang=>true, $type))?>"><?php echo h($articleTypes[$type][$lang])?></a></li>            
        </ul>
        <div class="qLink"></div>
    </div>
</div>