<input data="<?php echo $id?>" title="替换图片 200px×100px" type="file" id="banner_<?php echo $id?>" name="banner_<?php echo $id?>" /> 
<button class="upload disn" data="banner_<?php echo $id?>">上传图片</button>
<?php echo $this->Form->text('EditPartner'.$id.'.title', array('title'=>'标题'))?>
<?php echo $this->Form->text('EditPartner'.$id.'.url', array('title'=>'链接'))?>
<a href="#" class="cancel">取消</a>
<a href="<?php echo $this->Html->url(array('action'=>'save', 'admin'=>true, $id))?>" class="save"><strong>保存</strong></a> 
<img src="<?php echo $this->Format->getPartner($partner['Partner'])?>" style="display:none" />