<div id="content">
	<h2>添加进口商</h2>
	<?php echo $this->Form->create('Importer', array('type'=>'file', 'url'=>array('controller'=>'importer', 'action'=>'update', 'admin'=>true)))?>
	<?php echo $this->Form->hidden('id')?>
	<div class="tabDetails">
		<div class="tabRight">
			<div class="release">
				<p><a class="save" href="#">发布</a><a class="del" href="#">删除</a></p>
			</div>
		</div>
		<div class="tabLeft">
			<fieldset>
				<legend>中文名</legend>
				<div><?php echo $this->Form->text('title_cn')?></div>
			</fieldset>
			<fieldset>
				<legend>英文名</legend>
				<div><?php echo $this->Form->text('title_en')?></div>
			</fieldset>
			<table class="tabP2">
			<tr>
				<td>
					<fieldset>
						<legend>国家</legend>
						<div><?php echo $this->Form->text('country', array('class'=>'short'))?></div>
					</fieldset>
				</td>
				<td>
					<fieldset>
						<legend>地区</legend>
						<div><?php echo $this->Form->text('province', array('class'=>'short'))?></div>
					</fieldset>
				</td>
			</tr>
			<tr>
				<td>
					<fieldset>
						<legend>联系电话</legend>
						<div><?php echo $this->Form->text('tel', array('class'=>'short'))?></div>
					</fieldset>
				</td>
				<td>
					<fieldset>
						<legend>联系人</legend>
						<div><?php echo $this->Form->text('contact', array('class'=>'short'))?></div>
					</fieldset>
				</td>
			</tr>
		</table>

			<fieldset>
				<legend>地址</legend>
				<div><?php echo $this->Form->text('address')?></div>
			</fieldset>
			<fieldset>
				<legend>简介</legend>
				<div><?php echo $this->Form->textarea('content')?></div>
			</fieldset>
		</div>
	</div>
	<?php echo $this->Form->end();?>
</div>
<?php echo $this->Html->script('admin/importer/edit')?>