<td class="title"><?php echo $this->Form->text('EditWineType'.$id.'.title', array('title'=>'酒类名称'))?></td>
<td class="operate"><a href="#" class="cancel">取消</a> <a href="<?php echo $this->Html->url(array('action'=>'save', 'admin'=>'true', $id))?>" class="save"><strong>保存</strong></a></td>