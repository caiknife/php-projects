<td class="title">
    <?php echo $this->Form->text('EditSubindex'.$id.'.title', array('title'=>'指数分类名称'))?>
    <?php echo $this->Form->textarea('EditSubindex'.$id.'.desc', array('title'=>'指数简介'))?>
</td>
<td><?php echo $this->Form->select('EditSubindex'.$id.'.pid', $wineType, null, array('empty'=>false))?></td>
<td class="operate"><a href="#" class="cancel">取消</a> <a href="<?php echo $this->Html->url(array('action'=>'save', 'admin'=>'true', $id))?>" class="save"><strong>保存</strong></a></td>