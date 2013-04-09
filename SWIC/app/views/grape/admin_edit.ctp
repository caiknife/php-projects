<td class="title">
	<?php echo $this->Form->text('EditGrape'.$id.'.title_cn', array('title'=>'名称中文'))?>
	<?php echo $this->Form->text('EditGrape'.$id.'.title_en', array('title'=>'名称英文'))?>
	<?php echo $this->Form->text('EditGrape'.$id.'.title_other', array('title'=>'原国家名称'))?>
</td>
<td class="operate"><a href="#" class="cancel">取消</a> <a href="<?php echo $this->Html->url(array('action'=>'save', 'admin'=>'true', $id))?>" class="save"><strong>保存</strong></a></td>