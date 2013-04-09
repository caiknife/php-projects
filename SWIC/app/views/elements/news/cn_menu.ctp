<?php foreach($newsType as $key=>$news):?>
<li><a <?php if($key==$type):?>class="curr"<?php endif;?> href="<?php echo $this->Html->url(array('action'=>'lists', 'cn'=>true, 'type'=>$key))?>"><?php echo h($news)?></a></li>
<?php endforeach;?>