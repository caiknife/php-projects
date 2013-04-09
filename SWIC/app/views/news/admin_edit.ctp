<div id="content">
	<h2>添加新闻 </h2>
	<?php echo $this->Form->create('News', array('type'=>'file', 'url'=>array('controller'=>'news', 'action'=>'update', 'admin'=>true)))?>
	<?php echo $this->Form->hidden('id')?>
	<div class="tabDetails">
		<div class="tabRight">
			<div class="release">
				<p><input type="submit" value="保 存" class="disn" /><a class="save" href="#">发布</a><a class="del" href="#">删除</a></p>
			</div>
			<div class="tabRightBox">
				<h3>上传图片</h3>
				<fieldset>
					<legend>列表图片<span title="图片尺寸 -/ 70px × 70px" class="help"></span> <button class="button_logo">上传</button></legend>
					<input type="file" id="news_logo" name="news_logo" />
					<img id="img_news_logo" src="<?php echo $this->Format->getNewsLogo($news['News'])?>" />
				</fieldset>
				<fieldset>
					<legend>推荐新闻大图<span title="图片尺寸 -/ 640px × 360px" class="help"></span> <button class="button_big">上传</button></legend>
					<input type="file" id="news_big" name="news_big" />
					<img id="img_news_big" src="<?php echo $this->Format->getNewsBig($news['News'])?>" />
				</fieldset>
			</div>
		</div>
		<div class="tabLeft">
			<fieldset>
				<legend>类型</legend>
				<?php echo $this->Form->select('type_id', $newsType, null, array('empty'=>false))?>
			</fieldset>
			<fieldset>
				<legend>标题</legend>
				<div><?php echo $this->Form->text('title')?></div>
			</fieldset>
			<fieldset>
				<legend>日期</legend>
				<p><?php echo $this->Form->text('article_date', array('class'=>'short'))?></p>
			</fieldset>
			<fieldset>
				<legend>简述</legend>
				<div><?php echo $this->Form->textarea('intro')?></div>
			</fieldset>
			<fieldset>
				<legend>内容</legend>
				<div><?php echo $this->Form->textarea('content')?></div>
			</fieldset>
		</div>
	</div>
	<?php echo $this->Form->end()?>
</div>
<?php echo $this->Html->css('ui-lightness/jquery-ui-1.8.16.custom', 'stylesheet', array('media'=>'screen', 'inline'=>false));?>
<?php echo $this->Html->css('/editor/themes/default/default.css', 'stylesheet', array('media'=>'screen', 'inline'=>false));?>
<?php echo $this->Html->script('ajaxfileupload', false)?>
<?php echo $this->Html->script('jquery.ui.datepicker-zh-CN', false)?>
<?php echo $this->Html->script('/editor/kindeditor-min.js', false)?>
<?php echo $this->Html->script('/editor/lang/zh_CN.js', false)?>
<?php echo $this->Html->script('admin/news/edit', false)?>