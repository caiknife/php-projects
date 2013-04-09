<div id="content">
    <div id="main">
        <?php echo $this->element('brands/left')?>
        <div id="right">
            <div class="brandSwitch">
                <a href="<?php echo $this->Html->url(array('action'=>'index'))?>">新店进驻</a>
                <a class="curr" href="<?php echo $this->Html->url(array('action'=>'all'))?>">全部</a>
            </div>
            <div class="brandAll">
                <?php foreach($categories as $i=>$item):?>
                <?php if(isset($brands_group[$i])):?>
                <h3><?php echo h($item)?></h3>
                <ul>
                	<?php foreach($brands_group[$i] as $brand):?>
                    <li>
                    	<a title="<?php echo h($brand['Brand']['title'])?> <?php echo h($brand['Brand']['title_en'])?>" href="<?php echo $this->Html->url(array('action'=>'detail', $brand['Brand']['id']))?>"><?php echo h($brand['Brand']['title'])?> <?php echo h($brand['Brand']['title_en'])?></a> 
                    	<span><?php echo h($brand['Brand']['shop_id'])?></span>
                    </li>
                    <?php endforeach;?>
                </ul>
                <?php endif;?>
                <?php endforeach;?>
            </div>
        </div>
        <br clear="all" />
    </div>
</div>