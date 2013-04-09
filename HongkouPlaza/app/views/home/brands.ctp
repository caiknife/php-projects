<div>
    <ul class="ibrandList">
        <?php foreach($brands as $group):?>
    	<li>
    		<?php foreach($group as $brand):?>
    		<a title="<?php echo h($brand['Brand']['title'])?> <?php echo h($brand['Brand']['title_en'])?>" href="<?php echo $this->Html->url(array('controller'=>'brands', 'action'=>'detail', $brand['Brand']['id']))?>">
    			<img alt="<?php echo h($brand['Brand']['title'])?> <?php echo h($brand['Brand']['title_en'])?>" src="/attachments/photos/brand_logo_thumb/<?php echo $brand['Brand']['logo']?>" /><i></i>
    		</a>
    		<?php endforeach;?>
    	</li>
        <?php endforeach;?>
    </ul>
    <div class="btnIbrandList">
    	<?php if(sizeof($brands)>1):?>
        <?php foreach($brands as $i=>$group):?>
    	<span <?php if($i==0):?>class="curr"<?php endif;?>></span>
    	<?php endforeach;?>
    	<?php endif;?>
    </div>
</div>