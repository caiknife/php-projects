<!--[if IE 6]>
<script type="text/javascript">DD_belatedPNG.fix('#main h2')</script>
<![endif]-->
<div id="left">
    <h2 class="tBrand">品牌介绍</h2>
    <ul class="submenu">
    	<li <?php if ($this->action == 'all'):?>class="curr"<?php endif;?>><a href="<?php echo $this->Html->url(array('action'=>'all'))?>">全部</a></li>
        <?php foreach($categories as $i => $item):?>
        <li <?php if((isset($this->params['named']['cate']) && $this->params['named']['cate']==$i)):?>class="curr"<?php endif?>><a href="<?php echo $this->Html->url(array('action'=>'lists', 'cate'=>$i))?>"><?php echo h($item)?></a></li>
        <?php endforeach;?>
    </ul>
    <dl class="indexA">
        <dt>首字母索引</dt>
        <?php $alpha = range('a', 'z')?>
        <?php foreach($alpha as $i => $item):?>
        <dd <?php if(isset($this->params['named']['alpha']) && $this->params['named']['alpha']==$item):?>class="curr"<?php endif?>><a href="<?php echo $this->Html->url(array('action'=>'lists', 'alpha'=>$item))?>"><?php echo strtoupper($item)?></a></dd>
        <?php endforeach;?>
    </dl>
    <dl class="indexF">
        <dt>楼层索引</dt>
        <?php $floor = Configure::read('Brand.floor')?>
        <?php foreach($floor as $i => $item):?>
        <dd <?php if(isset($this->params['named']['floor']) && $this->params['named']['floor']==$item):?>class="curr"<?php endif?>><a href="<?php echo $this->Html->url(array('action'=>'lists', 'floor'=>$item))?>"><?php echo h($item)?></a></dd>
        <?php endforeach;?>
    </dl>
</div>