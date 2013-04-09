<input data="<?php echo $id?>" title="替换图片 140px×200px" type="file" id="banner_<?php echo $id?>" name="banner_<?php echo $id?>" /> 
<button class="upload disn" data="banner_<?php echo $id?>">上传图片</button>
<?php echo $this->Form->text('EditPerson'.$id.'.title_cn', array('title'=>'中文姓名'))?>
<?php echo $this->Form->text('EditPerson'.$id.'.title_en', array('title'=>'英文姓名'))?>
<!-- 
<?php echo $this->Form->text('EditPerson'.$id.'.slogan_cn', array('title'=>'口号中文'))?>
<?php echo $this->Form->text('EditPerson'.$id.'.slogan_en', array('title'=>'口号英文'))?>
 -->
<a href="#" class="cancel">取消</a>
<a href="<?php echo $this->Html->url(array('action'=>'save', $id))?>" class="save"><strong>保存</strong></a> 
