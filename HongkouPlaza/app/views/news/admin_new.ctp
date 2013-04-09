<div id="containerHolder">
	<div id="container">
        <div id="main" class="main">
			<?php echo $this->Form->create('News', array('class'=>'jNice', 'type'=>'file', 'url'=>array('action'=>'create', 'admin'=>true)))?>
				<div class="news_edit">
					<h3>必填信息</h3>
					<fieldset>
						<p>
							<label><strong>标题</strong></label>
							<?php echo $this->Form->text('title', array('class'=>'text-long'))?>
							<?php echo $this->Form->error('title')?>
						</p>
						<p>
							<label><strong>时间</strong></label>
							<?php echo $this->Form->text('date', array('class'=>'text-medium'))?> 
							<?php echo $this->Form->error('date')?>
						</p>
						<p>
							<label><strong>类型</strong></label>
							<?php echo $this->Form->select('cat', Configure::read('News.cate'), null, array('empty'=>'请选择一个类型'))?>
							<?php echo $this->Form->error('cat')?>
						</p>
						<p>
							<label><strong>列表简述</strong></label>
							<?php echo $this->Form->textarea('brief', array('rows'=>1, 'cols'=>1))?>
							<?php echo $this->Form->error('brief')?>
						</p>
						<p>
							<label><strong>正文</strong></label>
							<?php echo $this->Form->textarea('content', array('rows'=>1, 'cols'=>1))?>
							<?php echo $this->Form->error('content')?>
						</p>
					</fieldset>
				</div>
				<div class="news_right">
					<h3>选填信息</h3>
					<fieldset>
						<p>
							<label><strong>关键字</strong> <span>多个关键字请用 ；分割</span></label>
							<?php echo $this->Form->text('keyword', array('class'=>'text-long'))?>
							<?php echo $this->Form->error('keyword')?>
						</p>
						<p>
							<label><strong>出处</strong></label>
							<?php echo $this->Form->text('source', array('class'=>'text-long'))?>
							<?php echo $this->Form->error('source')?>
						</p>
						<p>
							<label><strong>原文链接</strong></label>
							<?php echo $this->Form->text('link', array('class'=>'text-long'))?>
							<?php echo $this->Form->error('link')?>
						</p>
						<p>
							<label><strong>列表配图</strong> <span>宽:130px 高:90px</span></label>
							<?php echo $this->Form->file('image_upload', array('class'=>'text-long'))?>
							<?php echo $this->Form->error('image_upload')?>
						</p>
					</fieldset>
				</div><br clear="all" />
				<input type="submit" value="保 存" /> <span style="padding-left:10px; display:inline-block"><input type="submit" value="添加下一条" /></span>
            <?php echo $this->Form->end()?>
        </div>
        <!-- // #main -->
        <div class="clear"></div>
    </div>
    <!-- // #container -->
</div>	
<!-- // #containerHolder -->
<?php echo $this->Html->css('/editor/themes/default/default.css', 'stylesheet', array('media'=>'screen', 'inline'=>false));?>
<?php echo $this->Html->script('jquery.ui.datepicker-zh-CN.js', false)?>
<?php echo $this->Html->script('/editor/kindeditor-min.js', false)?>
<?php echo $this->Html->script('/editor/lang/zh_CN.js', false)?>
<?php echo $this->Html->script('admin/news/editor', false)?>