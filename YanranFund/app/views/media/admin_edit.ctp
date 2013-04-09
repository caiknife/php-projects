<div id="content">
    <h2>添加媒体剪报</h2>
    <?php echo $this->Form->create('Media', array('type'=>'file', 'url'=>array('controller'=>'media', 'action'=>'update', 'admin'=>true)))?>
    <?php echo $this->Form->hidden('id')?>
    <?php echo $this->Form->hidden('is_display')?>
    <div class="tabDetails">
        <div class="tabRight">
            <div class="release">
                <p>
                    <input type="submit" value="保 存" class="disn" />
                    <a class="save" href="#">发布</a>
                    <a class="del" href="<?php echo $this->Html->url(array('action'=>'delete', $media['Media']['id']))?>">删除</a>
                </p>    
            </div>
            <div class="tabRightBox">
                <h3>上传</h3>
                <fieldset>
                    <legend>下载附件 <span title="支持格式 -/ 所有格式" class="help"></span> </legend>
                    <p><?php echo $this->Form->file('banner')?></p>
                    <?php if($media['Media']['banner_file_path']):?>
                    <a id="media_file" href="<?php echo $this->Format->getMediaFile($media['Media'])?>" target="_blank">下载源文件</a>
                    <?php endif;?>
                </fieldset>
            </div>
            <div class="tabRightBox">
                <h3>其他设置</h3>
                <fieldset>
                    <legend>语言</legend>
                    <?php echo $this->Form->radio('lang', Configure::read('Site.lang'), array('legend'=>false, 'class'=>'radio'))?>
                </fieldset>
            </div>
        </div>
        <div class="tabLeft">
            <fieldset>
                <legend>标题</legend>
                <div><?php echo $this->Form->text('title', array('require'=>1, 'message'=>'请输入标题！'))?></div>
            </fieldset>
            <fieldset>
                <legend>来源</legend>
                <div><?php echo $this->Form->text('source', array('class'=>'short'))?></div>
            </fieldset>
            <fieldset>
                <legend>发布时间</legend>
                <div><?php echo $this->Form->text('media_date', array('class'=>'short', 'require'=>1, 'message'=>'请输入发布时间！'))?></div>
            </fieldset>
        </div>
    </div>
    <?php echo $this->Form->end()?>
</div>
<?php echo $this->Html->css('ui-lightness/jquery-ui-1.8.16.custom', 'stylesheet', array('media'=>'screen', 'inline'=>false));?>
<?php echo $this->Html->script('jquery.ui.datepicker-zh-CN', false)?>
<?php echo $this->Html->script('jquery.datetimepicker', false)?>
<?php echo $this->Html->script('admin/media/edit')?>