<?php foreach ($brands as $brand):?>
<li>
    <?php echo $this->Html->image('/attachments/photos/brand_logo/'.$brand['logo'], array('width'=>80, 'height'=>80))?>
    <h3><?php echo h($brand['title'])?></h3>
    <span><?php echo $brand['guide_id']?></span>
    <a class="delete" title="删除" href="<?php echo $this->Html->url(array('action'=>'deleterelation', $brand['id'], $event_id))?>">删除</a>
</li>
<?php endforeach;?>
