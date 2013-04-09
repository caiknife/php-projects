<div id="containerHolder">
	<div id="container">
        <div id="main" class="main">
            <form class="jNice" action="" name="search">
            <?php echo $this->Form->hidden('Event.id')?>
			<h3>选择品牌 <span>搜索出品牌选中后将添加至此活动</span></h3>
			<fieldset>
				<dl class="search">
					<dd>
                        <label>商铺名称：</label>
                        <?php echo $this->Form->text('Brand.title', array('class'=>'text-medium'))?>
                    </dd>
					<dd>
						<label>商铺类型：</label>
						<?php echo $this->Form->select('Brand.cate', Configure::read('Brand.cate'), null, array('empty'=>'全部'))?>
					</dd>
					<dd>
						<label>楼层：</label>
						<?php echo $this->Form->select('Brand.floor', Configure::read('Brand.floor'), null, array('empty'=>'全部'))?>
					</dd>
					<dd>
                        <label>楼层编号：</label>
                        <?php echo $this->Form->text('Brand.guide_id', array('class'=>'text-small'))?>
                    </dd>
					<dd class="submti"><button type="button" name="search"><span><span>搜 索</span></span></button></dd>
					<dd class="add"><button type="button" name="add"><span><span>添加品牌</span></span></button></dd>
				</dl>
			</fieldset>
			<h3>搜索结果</h3>
			<ul class="brand_list" id="result"></ul>
			<br clear="all" />
			<h3>已添加品牌</h3>
			<ul class="brand_list" id="relation">
	           <?php echo $this->element('events/admin_connect')?>
			</ul>
			<br clear="all" />
            </form>
            <?php echo $this->Form->create('Event', array('class'=>'jNice', 'type'=>'file', 'url'=>array('action'=>'update', 'admin'=>true)))?>
            <?php echo $this->Form->hidden('id')?>
            <?php echo $this->Form->hidden('image')?>
			<div class="activities_edit">
				<h3>必填信息</h3>
				<fieldset>
					<div class="brand_pic">
						<p class="edit_logo">
							<label><strong>活动海报</strong> <span>宽:670px 高:315px</span></label>
							<?php echo $this->Html->image('/attachments/photos/event_image_thumb/'.$this->data['Event']['image'])?>
							<?php echo $this->Form->file('image_upload', array('class'=>'text-long'))?>
							<?php echo $this->Form->error('image_upload')?>
						</p>
						<p>
							<label><strong>活动类型</strong></label>
							<?php echo $this->Form->select('cat', Configure::read('Event.cate'), null, array('empty'=>false))?>
						</p>
					</div>
					<div class="brand_right">
						<p>
							<label><strong>活动标题</strong></label>
							<?php echo $this->Form->text('title', array('class'=>'text-long'))?>
							<?php echo $this->Form->error('title')?>
						</p>
						<p>
							<label><strong>活动副标题</strong></label>
							<?php echo $this->Form->text('title_sub', array('class'=>'text-long'))?>
							<?php echo $this->Form->error('title_sub')?>
						</p>
						<p>
							<label><strong>列表简述</strong></label>
							<?php echo $this->Form->text('intro', array('class'=>'text-long'))?>
							<?php echo $this->Form->error('intro')?>
						</p>
						<p>
							<label><strong>开始时间</strong></label>
							<?php echo $this->Form->text('start_date', array('class'=>'text-medium'))?>
							<?php echo $this->Form->error('start_date')?>
						</p>
						<p>
							<label><strong>结束时间</strong></label>
							<?php echo $this->Form->text('end_date', array('class'=>'text-medium'))?>
							<?php echo $this->Form->error('end_date')?>
						</p>
					</div>
				</fieldset>
			</div>
			<div class="activities_edit2">
				<h3>选填信息</h3>
				<fieldset>
					<div><label><strong>相关链接</strong></label>
						<ul>
							<li><?php echo $this->Form->text('caption1', array('class'=>'text-long'))?> 标题1</li>
							<li><?php echo $this->Form->text('link1', array('class'=>'text-long'))?> URL</li>
							<li><?php echo $this->Form->error('link1')?></li>
						</ul>
						<ul>
							<li><?php echo $this->Form->text('caption2', array('class'=>'text-long'))?> 标题2</li>
							<li><?php echo $this->Form->text('link2', array('class'=>'text-long'))?> URL</li>
							<li><?php echo $this->Form->error('link2')?></li>
						</ul>
						<ul>
							<li><?php echo $this->Form->text('caption3', array('class'=>'text-long'))?> 标题3</li>
							<li><?php echo $this->Form->text('link3', array('class'=>'text-long'))?> URL</li>
							<li><?php echo $this->Form->error('link3')?></li>
						</ul>
						<ul>
							<li><?php echo $this->Form->text('caption4', array('class'=>'text-long'))?> 标题1</li>
							<li><?php echo $this->Form->text('link4', array('class'=>'text-long'))?> URL</li>
							<li><?php echo $this->Form->error('link4')?></li>
						</ul>
						<ul>
							<li><?php echo $this->Form->text('caption5', array('class'=>'text-long'))?> 标题5</li>
							<li><?php echo $this->Form->text('link5', array('class'=>'text-long'))?> URL</li>
							<li><?php echo $this->Form->error('link5')?></li>
						</ul>
					</div>
					<p>
						<label><strong>活动关键词</strong> <span>用于关键字搜索，多个关键字请用 ；分割</span></label>
						<?php echo $this->Form->text('keyword', array('class'=>'text-long'))?>
					</p>
					<p>
						<label><strong>简介</strong></label>
						<?php echo $this->Form->textarea('brief', array('rows'=>1, 'cols'=>1))?>
					</p>
				</fieldset>
			</div>
			<br clear="all" />
			<input type="submit" value="保 存" /> <span style="padding-left:10px; display:inline-block"><input type="submit" value="添加下一个" /></span>
            <?php echo $this->Form->end()?>
        </div>
        <!-- // #main -->
        <div class="clear"></div>
    </div>
    <!-- // #container -->
</div>	
<!-- // #containerHolder -->
<?php echo $this->Html->script('jquery.ui.datepicker-zh-CN.js', false)?>
<?php echo $this->Html->script('admin/events/editor', false)?>
<?php echo $this->Html->script('admin/events/relation', false)?>