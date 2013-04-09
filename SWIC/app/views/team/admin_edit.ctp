<div id="content">
	<h2>添加指导部门</h2>
	<?php echo $this->Form->create('ReviewTeam', array('type'=>'file', 'url'=>array('controller'=>'team', 'action'=>'update', 'admin'=>true)))?>
	<?php echo $this->Form->hidden('id')?>
	<div class="tabDetails">
		<div class="tabRight">
			<div class="release">
				<p><a class="save" href="#">发布</a><a class="del" href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $team['ReviewTeam']['id']))?>">删除</a></p>
			</div>
			<div class="tabRightBox">
				<h3>上传图片</h3>
				<fieldset>
					<legend>列表图片<span title="图片尺寸 -/ 300px × 245px" class="help"></span> <button class="upload">上传图片</button> </legend>
					<p><input type="file" id="team_logo" name="team_logo" /></p>
					<img <?php if(empty($team['ReviewTeam']['media_url'])):?>style="display:none"<?php endif;?> id="img_team_logo" src="<?php echo $this->Format->getTeamAvatar($team['ReviewTeam'])?>" />
				</fieldset>
			</div>
		</div>
		<div class="tabLeft">
			<fieldset>
				<legend>类型</legend>
				<p><?php echo $this->Form->select('type_id', Configure::read('ReviewTeam.type'), null, array('empty'=>false))?></p>
			</fieldset>
			<fieldset>
				<legend>姓名</legend>
				<p><?php echo $this->Form->text('title', array('class'=>'short'))?></p>
			</fieldset>
			<fieldset>
				<legend>首页简述</legend>
				<div><?php echo $this->Form->textarea('intro')?></div>
			</fieldset>
			<fieldset>
				<legend>简介</legend>
				<div><?php echo $this->Form->textarea('content')?></div>
			</fieldset>
		</div>
	</div>
	<?php echo $this->Form->end()?>
</div>
<?php echo $this->Html->script('ajaxfileupload', false)?>
<?php echo $this->Html->script('admin/team/edit')?>