<td class="title"><?php echo $this->Form->text('EditRegion'.$id.'.title', array('title'=>'产区名称'))?></td>
<td class="operate"><a href="#" class="cancel">取消</a> <a href="<?php echo $this->Html->url(array('action'=>'save', 'admin'=>'true', $id))?>" class="save"><strong>保存</strong></a></td>