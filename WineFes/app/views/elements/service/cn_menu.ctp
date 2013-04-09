<?php foreach($articles as $key=>$val):?>
<li <?php if($key==$article['Article']['id']):?>class="curr"<?php endif;?>>
    <a href="<?php echo $this->Html->url(array('controller'=>'service', 'action'=>'view', 'cn'=>true, $key))?>"><?php echo h($val)?></a>
</li>
<?php endforeach;?>
