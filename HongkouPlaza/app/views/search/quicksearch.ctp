<!--[if IE 6]>
<script type="text/javascript">DD_belatedPNG.fix('.search .result h3,.search .result ul,.search .result i')</script>
<![endif]-->
<h3>快速搜索</h3>
<ul>
    <?php foreach($brands as $brand):?>
	<li>
	   <a href="<?php echo $this->Html->url(array('controller'=>'brands', 'action'=>'detail', $brand['Brand']['id']))?>" title="<?php echo h($brand['Brand']['title'])?>">
	       <img src="/attachments/photos/brand_logo/<?php echo $brand['Brand']['logo']?>" alt="<?php echo h($brand['Brand']['title'])?>" /><i></i>
	       <strong><?php echo h($brand['Brand']['title'])?></strong><?php echo h($brand['Brand']['floor'])?>-<?php echo h($brand['Brand']['guide_id'])?>
	   </a>
	</li>
    <?php endforeach;?>
</ul>
