<?php foreach($units as $unit):?>
<li><a title="添加" href="#" data="<?php echo $unit['Unit']['id']?>"><?php echo h($unit['Unit']['name'])?></a></li>
<?php endforeach;?>