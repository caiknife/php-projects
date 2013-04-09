<?php echo $this->Form->text('EditPriceMonthly'.$id.'.price', array('title'=>'价格', 'style'=>'color:#999',))?>
<?php echo $this->Form->select('EditPriceMonthly'.$id.'.year', $this->Format->setYearRange(), null, array('empty'=>'年份'))?>
<?php echo $this->Form->select('EditPriceMonthly'.$id.'.month', $this->Format->setMonthRange(), null, array('empty'=>'月份'))?>
<a href="#" class="cancel_price_monthly">取消</a>
<a href="<?php echo $this->Html->url(array('action'=>'save_price_monthly', 'admin'=>'true', $id))?>" class="save_price_monthly"><strong>保存</strong></a>