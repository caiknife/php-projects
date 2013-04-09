<div class="switchBtn">
    <a <?php if($this->action=='cn_latest'):?>class="curr"<?php endif;?> href="<?php echo $this->Html->url(array('action'=>'latest', 'cn'=>true))?>">最新新闻</a> 
    <?php foreach($newsType as $key=>$val):?>
    <a <?php if($this->action=='cn_lists' && $type==$key):?>class="curr"<?php endif;?> href="<?php echo $this->Html->url(array('action'=>'lists', 'cn'=>true, 'type'=>$key))?>"><?php echo h($val)?></a> 
    <?php endforeach;?>
</div>