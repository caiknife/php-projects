<input data="<?php echo $id?>" title="替换图片 800px×600px" type="file" id="banner_<?php echo $id?>" name="banner_<?php echo $id?>" /> 
<button class="upload disn" data="banner_<?php echo $id?>">上传图片</button>
<?php echo $this->Form->textarea('EditEquip'.$id.'.desc_cn', array('title'=>'照片描述 中文'))?> 
<?php echo $this->Form->textarea('EditEquip'.$id.'.desc_en', array('title'=>'照片描述 英文'))?>
<a href="#" class="cancel">取消</a>
<a href="<?php echo $this->Html->url(array('action'=>'save', 'admin'=>true, $id))?>" class="save"><strong>保存</strong></a> 