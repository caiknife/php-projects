<?php foreach($ablockList as $key=>$val):?>
<a <?php if($key==$id):?>class="curr"<?php endif;?> href="<?php echo $this->Html->url(array('action'=>'view', $key))?>"><?php echo h($val)?></a>
<?php endforeach;?> 
