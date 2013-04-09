<div id="content">
	<h2>添加合作方</h2>
	<?php echo $this->Form->create('Partner', array('type'=>'file', 'url'=>array('controller'=>'partners', 'action'=>'update', 'admin'=>true)))?>
	<?php echo $this->Form->hidden('id')?>
	<div class="tabDetails">
		<div class="tabRight">
			<div class="release">
				<p><a class="save" href="#">发布</a><a class="del" href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $partner['Partner']['id']))?>">删除</a></p>
			</div>
			<div class="tabRightBox">
				<h3>上传图片</h3>
				<fieldset>
					<legend>列表图片<span title="图片尺寸 -/ 100px × 63px" class="help"></span> <button class="upload">上传图片</button> </legend>
					<p><input type="file" name="partner_logo" id="partner_logo"/></p>
					<img <?php if(empty($partner['Partner']['media_url'])):?>style="display:none"<?php endif;?>id="img_partner_logo" src="<?php echo $this->Format->getPartnerLogo($partner['Partner'])?>" />
				</fieldset>
			</div>
		</div>
		<div class="tabLeft">
			<fieldset>
				<legend>类型</legend>
				<p><?php echo $this->Form->select('type_id', Configure::read('Partner.type'), null, array('empty'=>false))?></p>
			</fieldset>
			<fieldset>
				<legend>名称</legend>
				<p><?php echo $this->Form->text('title')?></p>
			</fieldset>
		</div>
	</div>
	<?php echo $this->Form->end()?>
</div>
<?php echo $this->Html->script('ajaxfileupload', false)?>
<?php echo $this->Html->script('admin/partners/edit')?>