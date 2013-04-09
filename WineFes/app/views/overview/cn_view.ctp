<div id="content">
    <div class="sidebar">
        <h2>酒节概况</h2>
        <ul>
            <?php foreach($blocks as $key=>$val):?>
            <li <?php if($key==$block['Block']['id']):?>class="curr"<?php endif;?>>
                <a href="<?php echo $this->Html->url(array('action'=>'view', 'cn'=>true, $key))?>"><?php echo h($val)?></a>
            </li>
            <?php endforeach;?>
        </ul>
        <?php echo $this->element('cn_quicklink')?>   
    </div>
    <div class="main">
        <div class="mainbav"><a class="home" href="/">首页</a><span>酒节概况</span><strong><?php echo h($block['Block']['title'])?></strong></div>
        <div id="Cms">
            <?php echo $block['Block']['content']?>
        </div>
    </div>
</div>