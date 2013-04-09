<?php foreach($units as $unit):?>
<a data="<?php echo $unit['Unit']['id']?>" href="#" title="删除"><?php echo h($unit['Unit']['name'])?></a>
<?php endforeach;?>