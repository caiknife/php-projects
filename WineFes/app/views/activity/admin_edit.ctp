<div id="content">
    <h2>添加活动 </h2>
    <?php echo $this->Form->create('Activity', array('type'=>'file', 'url'=>array('controller'=>'activity', 'action'=>'update', 'admin'=>true)))?>
    <?php echo $this->Form->hidden('id')?>
    <div class="tabDetails">
        <div class="tabRight">
            <div class="release">
                <p>
                    <input type="submit" value="保 存" class="disn" />
                    <a class="save" href="#">发布</a>
                    <a class="del" href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $activity['Activity']['id']))?>">删除</a>
                </p>
            </div>
            <div class="tabRightBox">
                <h3>上传图片</h3>
                <fieldset>
                    <legend>活动海报<span title="图片尺寸 -/ 250px × 250px" class="help"></span> <button class="button_logo">上传</button></legend>
                    <p><input type="file" id="activity_pic" name="activity_pic" /></p>
                    <img id="img_news_logo" src="<?php echo $this->Format->getActivityLogo($activity['Activity'])?>" />
                </fieldset>
            </div>
        </div>
        <div class="tabLeft">
            <fieldset>
                <legend>名称</legend>
                <div><?php echo $this->Form->text('title')?></div>
            </fieldset>
            <fieldset>
                <legend>日期</legend><!-- 需要选择时分 -->
                <p><?php echo $this->Form->text('activity_date', array('class'=>'short'))?></p>
            </fieldset>
            <fieldset>
                <legend>地点</legend>
                <div><?php echo $this->Form->text('address')?></div>
            </fieldset>
            <fieldset>
                <legend>嘉宾</legend>
                <div><?php echo $this->Form->text('guests')?></div>
            </fieldset>
            <fieldset>
                <legend>简述</legend>
                <div><?php echo $this->Form->textarea('intro')?></div>
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
<?php echo $this->Html->script('ajaxfileupload', false)?>
<?php echo $this->Html->script('jquery.datetimepicker', false)?>
<?php echo $this->Html->script('jquery.ui.datepicker-zh-CN', false)?>
<?php echo $this->Html->script('/editor/kindeditor-min.js', false)?>
<?php echo $this->Html->script('/editor/lang/zh_CN.js', false)?>
<?php echo $this->Html->script('admin/activity/edit', false)?>