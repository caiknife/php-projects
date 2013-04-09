<div id="content">
	<h2>添加酒评 </h2>
	<?php echo $this->Form->create('TastingNotes', array('type'=>'file', 'url'=>array('controller'=>'note', 'action'=>'update', 'admin'=>true)))?>
	<?php echo $this->Form->hidden('id')?>
	<div class="tabDetails">
		<div class="tabRight">
			<div class="release">
				<p><a class="save" href="#">发布</a><a class="del" href="#" data="<?php echo sizeof($note['TastingScore'])?>">删除</a></p>
			</div>
		</div>
		<div class="tabLeft">
			<fieldset>
				<legend>期号</legend>
				<p><?php echo $this->Form->text('title', array('class'=>'short'))?></p>
			</fieldset>
			<fieldset>
				<legend>日期</legend>
				<p><?php echo $this->Form->text('date_time', array('class'=>'short'))?></p>
			</fieldset>
			<fieldset>
				<legend>场地</legend>
				<p><?php echo $this->Form->text('address')?></p>
			</fieldset>
			<fieldset>
                <legend>状态</legend>
                <p><?php echo $this->Form->select('status', Configure::read('Rating.status'), null, array('empty'=>false))?></p>
            </fieldset>
			<fieldset>
				<legend>简介</legend>
				<div><?php echo $this->Form->textarea('content')?></div>
			</fieldset>
			<div class="tabLeftBox photoList">
				<h3>相册 | Photo Gallery <span class="help"></span>
					 <input type="file" id="note_logo" name="note_logo" /> <button class="upload">上传</button> <img src="/img/loading.gif" class="disn" id="loading" />
				</h3>
				<ul>
					<?php if($note['TastingNotes']['media_url_1']):?>
					<li data="<?php echo $note['TastingNotes']['media_url_1'];?>">
						<img title="拖动排序" src="/attachments/photos/note/<?php echo $note['TastingNotes']['media_url_1'];?>" />
						<input title="图片标题" type="text" name="logo_desc[]" value="<?php echo h($note['TastingNotes']['media_desc_1']);?>" />
						<a href="#" class="remove">刪除</a>
					</li>
					<?php endif?>
					<?php if($note['TastingNotes']['media_url_2']):?>
					<li data="<?php echo $note['TastingNotes']['media_url_2'];?>">
						<img title="拖动排序" src="/attachments/photos/note/<?php echo $note['TastingNotes']['media_url_2'];?>" />
						<input title="图片标题" type="text" name="logo_desc[]" value="<?php echo h($note['TastingNotes']['media_desc_2']);?>" />
						<a href="#" class="remove">刪除</a>
					</li>
					<?php endif?>
					<?php if($note['TastingNotes']['media_url_3']):?>
					<li data="<?php echo $note['TastingNotes']['media_url_3'];?>">
						<img title="拖动排序" src="/attachments/photos/note/<?php echo $note['TastingNotes']['media_url_3'];?>" />
						<input title="图片标题" type="text" name="logo_desc[]" value="<?php echo h($note['TastingNotes']['media_desc_3']);?>" />
						<a href="#" class="remove">刪除</a>
					</li>
					<?php endif?>
					<?php if($note['TastingNotes']['media_url_4']):?>
					<li data="<?php echo $note['TastingNotes']['media_url_4'];?>">
						<img title="拖动排序" src="/attachments/photos/note/<?php echo $note['TastingNotes']['media_url_4'];?>" />
						<input title="图片标题" type="text" name="logo_desc[]" value="<?php echo h($note['TastingNotes']['media_desc_4']);?>" />
						<a href="#" class="remove">刪除</a>
					</li>
					<?php endif?>
					<?php if($note['TastingNotes']['media_url_5']):?>
					<li data="<?php echo $note['TastingNotes']['media_url_5'];?>">
						<img title="拖动排序" src="/attachments/photos/note/<?php echo $note['TastingNotes']['media_url_5'];?>" />
						<input title="图片标题" type="text" name="logo_desc[]" value="<?php echo h($note['TastingNotes']['media_desc_5']);?>" />
						<a href="#" class="remove">刪除</a>
					</li>
					<?php endif?>
					<?php if($note['TastingNotes']['media_url_6']):?>
					<li data="<?php echo $note['TastingNotes']['media_url_6'];?>">
						<img title="拖动排序" src="/attachments/photos/note/<?php echo $note['TastingNotes']['media_url_6'];?>" />
						<input title="图片标题" type="text" name="logo_desc[]" value="<?php echo h($note['TastingNotes']['media_desc_6']);?>" />
						<a href="#" class="remove">刪除</a>
					</li>
					<?php endif?>
				</ul>
			</div>
		</div>
	</div>
	<?php echo $this->Form->end();?>
</div>
<?php echo $this->Html->css('ui-lightness/jquery-ui-1.8.16.custom', 'stylesheet', array('media'=>'screen', 'inline'=>false));?>
<?php echo $this->Html->script('jquery.ui.datepicker-zh-CN', false)?>
<?php echo $this->Html->script('ajaxfileupload', false)?>
<?php echo $this->Html->script('admin/note/edit')?>