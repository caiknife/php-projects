<td class="title">
    <?php echo $this->Form->text('EditEquipType'.$id.'.title_cn', array('title'=>'分类 中文'))?>
    <?php echo $this->Form->text('EditEquipType'.$id.'.title_en', array('title'=>'分类 英文'))?>
</td>
<td class="operate">
    <a href="#" class="cancel">取消</a>
    <a href="<?php echo $this->Html->url(array('action'=>'save', 'admin'=>true, $id))?>" class="save"><strong>保存</strong></a>
</td>