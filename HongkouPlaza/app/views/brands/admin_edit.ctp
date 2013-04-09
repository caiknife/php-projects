<div id="containerHolder">
	<div id="container">
        <div id="main" class="main">
			<?php echo $this->Form->create('Brand', array('type'=>'file', 'url'=>array('action'=>'update', 'admin'=>true), 'class'=>'jNice'))?>
				<?php echo $this->Form->hidden('id')?>
				<?php echo $this->Form->hidden('logo')?>
				<?php echo $this->Form->hidden('main_photo')?>
				<?php echo $this->Form->hidden('photo1')?>
				<?php echo $this->Form->hidden('photo2')?>
				<?php echo $this->Form->hidden('photo3')?>
				<?php echo $this->Form->hidden('photo4')?>
				<div class="brand_edit">
					<h3>基本信息</h3>
					<fieldset>
						<div class="brand_pic">
							<p class="edit_logo">
								<label><strong>品牌LOGO</strong> <span>宽:80px 高:80px</span></label>
								<?php echo $this->Html->image('/attachments/photos/brand_logo/'.$this->data['Brand']['logo'])?>
								<?php echo $this->Form->file('logo_upload', array('class'=>'text-long'))?>
								<?php echo $this->Form->error('logo_upload')?>
							</p>
							<p class="edit_logo">
								<label><strong>列表商铺图</strong> <span>宽:115px 高:165px</span></label>
								<?php echo $this->Html->image('/attachments/photos/brand_main_photo/'.$this->data['Brand']['main_photo'])?>
								<?php echo $this->Form->file('main_photo_upload', array('class'=>'text-long'))?>
								<?php echo $this->Form->error('main_photo_upload')?>
							</p>
							<p class="edit_photo">
								<label><strong>店铺照片</strong> <span>至少请上传一张照片 宽:630px 高:320px</span></label>
								<?php echo $this->Html->image('/attachments/photos/brand_photo/'.$this->data['Brand']['photo1'])?>
								<?php echo $this->Form->file('photo1_upload', array('class'=>'text-long'))?>
								<?php echo $this->Form->error('photo1_upload')?>
								
								<?php if ($this->data['Brand']['photo2']):?>
								<?php echo $this->Html->image('/attachments/photos/brand_photo/'.$this->data['Brand']['photo2'])?>
								<span>删除这张图片</span> <?php echo $this->Form->checkbox('photo2_delete')?>
								<?php endif;?>
								<?php echo $this->Form->file('photo2_upload', array('class'=>'text-long'))?>
								<?php echo $this->Form->error('photo2_upload')?>
								
								<?php if ($this->data['Brand']['photo3']):?>
								<?php echo $this->Html->image('/attachments/photos/brand_photo/'.$this->data['Brand']['photo3'])?>
								<span>删除这张图片</span> <?php echo $this->Form->checkbox('photo3_delete')?> 
								<?php endif;?>
								<?php echo $this->Form->file('photo3_upload', array('class'=>'text-long'))?>
								<?php echo $this->Form->error('photo3_upload')?>
								
								<?php if ($this->data['Brand']['photo4']):?>
								<?php echo $this->Html->image('/attachments/photos/brand_photo/'.$this->data['Brand']['photo4'])?>
								<span>删除这张图片</span> <?php echo $this->Form->checkbox('photo4_delete')?>
								<?php endif;?>
								<?php echo $this->Form->file('photo4_upload', array('class'=>'text-long'))?>
								<?php echo $this->Form->error('photo4_upload')?>
							</p>
						</div>
						<div class="brand_right">
							<p>
								<label><strong>商铺名称(中文)</strong></label>								
								<?php echo $this->Form->text('title', array('class'=>'text-long'));?>
								<?php echo $this->Form->error('title')?>
							</p>
							<p>
								<label><strong>商铺名称(英文)</strong></label>
								<?php echo $this->Form->text('title_en', array('class'=>'text-long'));?>
								<?php echo $this->Form->error('title_en')?>
							</p>
							<p>
								<label><strong>所在楼层</strong></label>
								<?php echo $this->Form->select('floor', Configure::read('Brand.floor'), null, array('empty'=>false))?>
								<?php echo $this->Form->error('floor')?>
							</p>
							<script type="text/javascript">
								$(document).ready(function(){
									$(".typeList a.typeEditBtn").colorbox({inline:true})
								});
							</script>
							<div class="typeList">
								<label><strong>类型</strong> <a class="typeEditBtn" href="#typeEdit">类型管理</a></label>
								<ul class="checkboxList">
									<?php foreach($categories as $key=>$val):?>
									<li><label><strong <?php if($key<=11):?>class="red"<?php endif;?>><?php echo h($val);?></strong> <input type="checkbox" data="<?php echo $key?>" name="categories[<?php echo $key?>]" <?php if(isset($this->params['form']['categories'][$key]) || (isset($brandCategories) && in_array($key, $brandCategories))):?>checked<?php endif;?> /></label></li>
									<?php endforeach;?>
								</ul>
								<div style="display:none">
									<div id="typeEdit">
										<!-- 点击LI中A标签删除分类，需要弹出JS警告框确认-->
										<ul>
											<?php foreach($editableCategories as $key=>$val):?>
											<li><a title="删除" href="<?php echo $this->Html->url(array('action'=>'deletecategory', 'admin'=>'true', $key))?>" data="<?php echo $key?>"><?php echo h($val)?></a></li>
									        <?php endforeach;?>
										</ul>
										<div><input type="text" name="addCategory" /><button>添加</button></div>
									</div>
								</div>
							</div>
							<p>
								<label><strong>商铺号</strong></label>
								<?php echo $this->Form->text('shop_id', array('class'=>'text-long'));?>
								<?php echo $this->Form->error('shop_id')?>
							</p>
							<div class="numberEidt">
								<label><strong>平面图单元号</strong></label>
								<input type="text" class="text-long" name="guide_id"/>
								<!-- input里输入文字出现UL搜索结果框,点击后添加,必须先选择楼层,-->
								<ul style="display:none" id="unit_result">
		
								</ul>
								<div id="units"></div>
							</div>
							<p>
								<label><strong>嘉惠卡签约商户</strong> <?php echo $this->Form->checkbox('jh_card')?></label>
							</p>
							<p>
								<label><strong>前台显示店铺</strong></label>
								<?php echo $this->Form->select('is_display', Configure::read('Brand.display'), null, array('empty'=>false))?>
								<?php echo $this->Form->error('is_display')?>
							</p>
						</div>
					</fieldset>
				</div>
				<div class="brand_edit2">
					<h3>其他信息</h3>
					<fieldset>
						<p>
							<label><strong>关键字</strong> <span>多个关键字请用 ；分割</span></label>
							<?php echo $this->Form->text('keyword', array('class'=>'text-long'))?>
						    <?php echo $this->Form->error('keyword')?>
                        </p>
						<p>
							<label><strong>经营内容</strong></label>
							<?php echo $this->Form->text('operation', array('class'=>'text-long'))?>
						    <?php echo $this->Form->error('operation')?>
                        </p>
						<p>
							<label><strong>官方网址</strong></label>
							<?php echo $this->Form->text('website', array('class'=>'text-long'))?>
						    <?php echo $this->Form->error('website')?>
                        </p>
						<p>
							<label><strong>品牌风格</strong></label>
							<?php echo $this->Form->text('style', array('class'=>'text-long'))?>
						    <?php echo $this->Form->error('style')?>
                        </p>
						<p>
							<label><strong>服务电话</strong></label>
							<?php echo $this->Form->text('phone', array('class'=>'text-long'))?>
						    <?php echo $this->Form->error('phone')?>
                        </p>
						<p>
							<label><strong>营业时间</strong></label>
							<?php echo $this->Form->text('openhours', array('class'=>'text-long'))?>
						    <?php echo $this->Form->error('openhours')?>
                        </p>
						<p>
							<label><strong>简介</strong></label>
							<?php echo $this->Form->textarea('brief', array('class'=>'text-long'))?>
						    <?php echo $this->Form->error('brief')?>
						</p>
					</fieldset>
				</div>
				<br clear="all" />
				<input type="submit" value="保 存" name="save" /> <span style="padding-left:10px; display:inline-block"><input type="submit" value="添加下一个" name="another" /></span>
            <?php echo $this->Form->end()?>
        </div>
        <!-- // #main -->
        <div class="clear"></div>
    </div>
    <!-- // #container -->
</div>	
<!-- // #containerHolder -->
<?php echo $this->Html->script('jquery_colorbox')?>
<?php echo $this->Html->script('admin/brands/new')?>