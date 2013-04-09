<div id="content" class="indexCenter">
    <div class="sidebar">
        <dl>
            <dt>相关信息</dt>
            <dd>
                <ul>
                    <?php foreach($links as $link):?>
                    <li><a <?php if($link['Link']['id']==$block['Link']['id']):?>class="curr"<?php endif;?> href="<?php echo $this->Html->url(array('controller'=>'link', 'action'=>'view', 'cn'=>true, $link['Link']['id']))?>"><?php echo h($link['Link']['title'])?></a></li>
                    <?php endforeach;?>
                </ul>
            </dd>
        </dl>
        <div class="AdBox"><a href="#"><img src="/images/cn/ad_1.png" width="300" height="200" /></a></div>  
    </div>
    <div class="main">
        <div class="globalnav">
            <a class="home" href="<?php echo $this->Html->url(array('controller'=>'home', 'action'=>'index', 'cn'=>true))?>">首页</a>
            <span>相关信息</span>
            <a href="<?php echo $this->Html->url(array('action'=>'view', 'cn'=>true, $block['Link']['id']))?>"><?php echo h($block['Link']['title'])?></a>
        </div>
        <div class="aboutBox">
            <?php echo $block['Link']['content']?>
        </div>
    </div>
    <br clear="all" />
</div>