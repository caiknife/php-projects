<td class="title">
    <?php echo $this->Form->select('EditReview'.$id.'.year', $this->Format->setYearRange(), null, array('empty'=>'年份'))?>
    <?php echo $this->Form->select('EditReview'.$id.'.month', $this->Format->setMonthRange(), null, array('empty'=>'月份'))?>
    前属于
</td>
<td>
    <?php echo $this->Form->text('EditReview'.$id.'.title')?>
</td>
<td class="operate">
    <a href="#" class="cancel">取消</a>
    <a href="<?php echo $this->Html->url(array('action'=>'savereview', 'admin'=>'true', $id))?>" class="save"><strong>保存</strong></a> 
</td>