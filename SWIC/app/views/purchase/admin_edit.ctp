<td>
	<?php echo $this->Form->text('EditIndex'.$id.'.country', array('title'=>'国家'))?> 
</td>
<td>
	<?php echo $this->Form->text('EditIndex'.$id.'.ratio', array('title'=>'比率', 'class'=>'short'))?>
</td>
<td class="operate">
<a href="#" class="cancel">取消</a> 
<a href="<?php echo $this->Html->url(array('action'=>'save', 'admin'=>'true', $id))?>" class="save"><strong>保存</strong></a>
</td>