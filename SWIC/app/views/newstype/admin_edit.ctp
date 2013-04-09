<td class="title">
	<img src="<?php echo $this->Format->getNewstypeLogo($type['NewsType'])?>" />
	<input data="<?php echo $id?>" title="上传图片" type="file" style="width:250px" id="newstype_logo_<?php echo $id?>" name="newstype_logo_<?php echo $id?>" /> 
	<button class="upload" data="newstype_logo_<?php echo $id?>">上传图片</button> 
	<?php echo $this->Form->text('EditNewsType'.$id.'.title', array('title'=>'新闻分类'))?> 	
</td>
<td class="operate">
	<a href="#" class="cancel">取消</a>
	<a href="<?php echo $this->Html->url(array('action'=>'save', 'admin'=>'true', $id))?>" class="save"><strong>保存</strong></a>
</td>