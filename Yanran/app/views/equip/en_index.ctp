<div id="content">
    <div class="mainPoster"><img src="<?php echo $this->Format->getBoard($board['Board'])?>" /><span class="tEnvi"></span></div>
    <div class="main photoList">
        <h2><?php echo h($equipTypes[$type])?></h2>
        <script type="text/javascript">
            $(".photoList a").fancybox({padding:0,openEffect:'elastic',openSpeed:150, closeEffect:'elastic', closeSpeed:150, closeClick:true});
        </script>
        <ul>
            <?php foreach($equips as $equip):?>
            <li>
                <a title="<?php echo h($equip['Equip']['desc_'.$lang])?>" data-fancybox-group="thumb" href="<?php echo $this->Format->getEquip($equip['Equip'], 'big')?>">
                    <img src="<?php echo $this->Format->getEquip($equip['Equip'])?>" />
                </a>
            </li>
            <?php endforeach;?>
        </ul>
    </div>
    <div class="sidebar">
        <ul class="sideNav">
            <?php foreach($equipTypes as $key=>$val):?>
            <li <?php if($key==$type):?>class="curr"<?php endif;?>><a href="<?php echo $this->Html->url(array($lang=>true, 'type'=>$key))?>"><?php echo h($val)?></a></li>
            <?php endforeach;?>            
        </ul>
        <div class="qLink"></div>
    </div>
</div>