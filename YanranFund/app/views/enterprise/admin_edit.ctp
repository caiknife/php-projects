<input data="<?php echo $id?>" title="替换图片 150px×75px" type="file" id="banner_<?php echo $id?>" name="banner_<?php echo $id?>" /> 
<button class="upload disn" data="banner_<?php echo $id?>">上传图片</button>
<?php echo $this->Form->text('EditEnterprise'.$id.'.title_cn', array('title'=>'中文名称'))?>
<?php echo $this->Form->text('EditEnterprise'.$id.'.title_en', array('title'=>'英文名称'))?>
<?php echo $this->Form->text('EditEnterprise'.$id.'.url', array('title'=>'链接'))?>
<a href="#" class="cancel">取消</a>
<a href="<?php echo $this->Html->url(array('action'=>'save', $id))?>" class="save"><strong>保存</strong></a> 
