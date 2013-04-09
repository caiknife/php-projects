<?php foreach($brands as $brand):?>
<li>
    <?php echo $this->Html->image('/attachments/photos/brand_logo/'.$brand['Brand']['logo'], array('width'=>80, 'height'=>80))?>
    <h3><?php echo h($brand['Brand']['title'])?></h3>
    <span><?php echo $brand['Brand']['guide_id']?></span>
    <a class="delete" title="移除" href="<?php echo $this->Html->url(array('action'=>'unfeature', 'admin'=>true, $brand['Brand']['id']))?>">移除</a>
</li>
<?php endforeach;?>