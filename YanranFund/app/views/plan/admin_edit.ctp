<div id="content">
    <h2>添加嫣设计</h2>
    <?php echo $this->Form->create('Plan', array('type'=>'file', 'url'=>array('controller'=>'plan', 'action'=>'update', 'admin'=>true)))?>
    <?php echo $this->Form->hidden('id')?>
    <?php echo $this->Form->hidden('is_display')?>
    <div class="tabDetails">
        <div class="tabRight">
            <div class="release">
                <p>
                    <input type="submit" value="保 存" class="disn" />
                    <a class="save" href="<?php echo $this->Html->url(array('action'=>'public'))?>">发布</a>
                    <!-- 
                    <a class="update" href="#">保存</a>
                     -->
                    <a class="del" href="<?php echo $this->Html->url(array('action'=>'delete', $plan['Plan']['id']))?>">删除</a>
                </p>  
            </div>
            <div class="tabRightBox">
                <h3>上传</h3>
                <fieldset>
                    <legend>列表图片 <span title="图片尺寸 -/ 260px × 180px" class="help"></span> </legend>
                    <p><?php echo $this->Form->file('banner')?></p>
                    <?php if($plan['Plan']['banner_file_path']):?>
                    <img id="news_image" src="<?php echo $this->Format->getPlanListImage($plan['Plan'])?>" />
                    <?php endif;?>
                </fieldset>
            </div>
            <div class="tabRightBox">
                <h3>其他设置</h3>
                <fieldset>
                    <legend>语言</legend>
                    <?php echo $this->Form->radio('lang', Configure::read('Site.lang'), array('legend'=>false, 'class'=>'radio'))?>
                </fieldset>
                <hr />
                <fieldset>
                    <legend>包含视频</legend>
                    <?php echo $this->Form->radio('has_video', Configure::read('News.has_video'), array('legend'=>false, 'class'=>'radio'))?>
                </fieldset>
                <hr />
                <fieldset>
                    <legend>新闻版块显示</legend>
                    <?php echo $this->Form->radio('is_public', Configure::read('News.is_public'), array('legend'=>false, 'class'=>'radio'))?>
                </fieldset>
            </div>
        </div>
        <div class="tabLeft">
            <fieldset>
                <legend>标题</legend>
                <div><?php echo $this->Form->text('title', array('require'=>true, 'message'=>'请填写标题！'))?></div>
            </fieldset>
            <fieldset>
                <legend>发布时间</legend>
                <div><?php echo $this->Form->text('public_date', array('class'=>'short', 'require'=>true, 'message'=>'请填写发布时间！'))?></div>
            </fieldset>
            <fieldset>
                <legend>内容</legend>
                <div><?php echo $this->Form->textarea('content', array('style'=>'height:400px'))?></div>
            </fieldset>
        </div>
    </div>
    <?php echo $this->Form->end()?>
</div>
<?php echo $this->Html->css('ui-lightness/jquery-ui-1.8.16.custom', 'stylesheet', array('media'=>'screen', 'inline'=>false));?>
<?php echo $this->Html->css('/editor/themes/default/default.css', 'stylesheet', array('media'=>'screen', 'inline'=>false));?>
<?php echo $this->Html->script('/editor/kindeditor-min.js')?>
<?php echo $this->Html->script('/editor/lang/zh_CN.js')?>
<?php echo $this->Html->script('jquery.ui.datepicker-zh-CN', false)?>
<?php echo $this->Html->script('jquery.datetimepicker', false)?>
<?php echo $this->Html->script('admin/plan/edit')?>