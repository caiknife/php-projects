<!--[if IE 6]>
<script type="text/javascript">DD_belatedPNG.fix('#main h2')</script>
<![endif]-->
<div id="left">
	<h2 class="tNews">新闻中心</h2>
	<ul class="submenu">
		<li <?php if($this->action=='index'):?>class="curr"<?php endif;?>><a href="<?php echo $this->Html->url(array('action'=>'index'))?>">全部</a></li>
		<?php $range = range(date('Y'), 2009)?>
		<?php foreach($range as $item):?>
		<li <?php if((isset($this->params['named']['year']) && $this->params['named']['year']==$item)):?>class="curr"<?php endif?>><a href="<?php echo $this->Html->url(array('action'=>'lists', 'year'=>$item))?>"><?php echo h($item)?></a></li>
		<?php endforeach;?>
		<li class="splitLine"></li>
		<?php $cate = Configure::read('News.cate')?>
		<?php foreach($cate as $i=>$item):?>
		<li <?php if((isset($this->params['named']['cat']) && $this->params['named']['cat']==$i)):?>class="curr"<?php endif?>><a href="<?php echo $this->Html->url(array('action'=>'lists', 'cat'=>$i))?>"><?php echo h($item)?></a></li>
		<?php endforeach;?>
	</ul>
</div>