<td class="title">
	<?php echo $this->Form->select('EditIndexCenter'.$id.'.year', $this->Format->setYearRange(), null, array('empty'=>'年份'))?>
	<?php echo $this->Form->select('EditIndexCenter'.$id.'.month', $this->Format->setMonthRange(), null, array('empty'=>'月份'))?>
</td>
<td align="center"><?php echo $this->Form->text('EditIndexCenter'.$id.'.price_monthly')?><span>参考当月总计：￥<label></label></span></td>
<td align="center"><?php echo $this->Form->text('EditIndexCenter'.$id.'.price_benchmark')?><span>参考基准总计：￥<label></label></span></td>
<td class="operate">
	<a href="#" class="cancel">取消</a>
	<a href="#" class="calculate">计算</a> 
	<a href="<?php echo $this->Html->url(array('action'=>'save', 'admin'=>'true', $id))?>" class="save"><strong>保存</strong></a>
</td>