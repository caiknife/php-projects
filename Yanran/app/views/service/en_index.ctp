<div id="content">
    <div class="mainPoster"><img src="<?php echo $this->Format->getBoard($board['Board'])?>" /><span class="tService"></span></div>
    <div class="main photoList">
        <h2>SERVICES</h2>
        <script type="text/javascript">
            $(".photoList a").fancybox({padding:10,overlay:{speedIn:500,opacity:0.95}});
        </script>
        <ul>
            <?php foreach($services as $service):?>
            <li>
                <a href="#service<?php echo $service['Service']['id']?>">
                    <img src="<?php echo $this->Format->getService($service['Service'])?>" />
                    <strong><?php echo h($service['Service']['title_'.$lang])?></strong>
                </a>
            </li>
            <?php endforeach;?>
        </ul>
        <div style="display:none">
            <?php foreach($services as $service):?>
            <div id="service<?php echo $service['Service']['id']?>" class="servicePopBox">
                <?php echo $service['Service']['content_'.$lang]?>
            </div>
            <?php endforeach;?>
        </div>
    </div>
    <div class="sidebar">
        <div class="qLink"></div>
    </div>
</div>