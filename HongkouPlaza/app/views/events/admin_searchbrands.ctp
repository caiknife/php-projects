<?php foreach ($brands as $brand):?>
<li>
    <?php echo $this->Html->image('/attachments/photos/brand_logo/'.$brand['Brand']['logo'], array('width'=>80, 'height'=>80))?>
    <h3><?php echo h($brand['Brand']['title'])?></h3>
    <span><?php echo $brand['Brand']['guide_id']?></span>
    <span>
        <?php if(in_array($brand['Brand']['id'], $related_brands)):?>
        <em>已添加</em>
        <?php else:?>
        <a class="jNiceCheckbox" href="#"></a>
        <input type="checkbox" class="jNiceHidden" name="<?php echo $brand['Brand']['id']?>">
        <?php endif?>
    </span>
</li>
<?php endforeach;?>
