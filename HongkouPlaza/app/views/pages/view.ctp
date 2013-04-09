<div id="content">
    <div id="main">
        <!--[if IE 6]>
        <script type="text/javascript">DD_belatedPNG.fix('#main h2')</script>
        <![endif]-->
        <div id="left">
            <h2 class="tHelp">相关帮助</h2>
            <ul class="submenu">
                <?php foreach($blockList as $key=>$val):?>
                <li <?php if($key==$block['Block']['id']):?>class="curr"<?php endif;?>><a href="<?php echo $this->Html->url(array('controller'=>'pages', 'action'=>'view', $key))?>"><?php echo h($val)?></a></li>
                <?php endforeach;?> 
            </ul>
        </div>
        <div id="right" class="contact">
            <div id="Cms">
                <div class="mianze">
                    <?php echo $block['Block']['content']?>
                </div>
            </div>
        </div>
        <br clear="all" />
    </div>
</div>