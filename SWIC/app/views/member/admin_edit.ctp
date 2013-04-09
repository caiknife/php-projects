<?php echo $this->Form->text('EditMember'.$id.'.title', array('title'=>'会员名称'))?>
<a href="#" class="cancel">取消</a>
<a href="<?php echo $this->Html->url(array('action'=>'save', 'admin'=>true, $id))?>" class="save"><strong>保存</strong></a> 