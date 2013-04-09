<input data="<?php echo $id?>" title="替换图片 " type="file" id="banner_<?php echo $id?>" name="banner_<?php echo $id?>" /> 
<button class="upload disn" data="banner_<?php echo $id?>">上传图片</button>
<?php echo $this->Form->text('EditPlan'.$id.'.title', array('title'=>'标题'))?>
<a href="#" class="cancel">取消</a>
<a href="<?php echo $this->Html->url(array('action'=>'save', 'admin'=>true, $id))?>" class="save"><strong>保存</strong></a> 
<img src="<?php echo $this->Format->getPlan($plan['Plan'])?>" style="display:none" />