<div id="content">
    <h2>添加资讯</h2>
    <?php echo $this->Form->create('Info', array('type'=>'file', 'url'=>array('controller'=>'info', 'action'=>'update', 'admin'=>true)))?>
    <?php echo $this->Form->hidden('id')?>
    <div class="tabDetails">
        <div class="tabRight">
            <div class="release">
                <p>
                    <input type="submit" value="保 存" class="disn" />
                    <a class="save" href="#">发布</a>
                    <a class="del" href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $info['Info']['id']))?>">删除</a>
                </p>
            </div>
        </div>
        <div class="tabLeft">
            <fieldset>
                <legend>语言</legend>
                <?php echo $this->Form->select('lang', Configure::read('Site.lang'), null, array('empty'=>false))?>
            </fieldset>
            <fieldset>
                <legend>标题</legend>
                <div><?php echo $this->Form->text('title')?></div>
            </fieldset>
            <fieldset style="float:left">
                <legend>日期</legend>
                <p><?php echo $this->Form->text('news_date', array('class'=>'short'))?></p>
            </fieldset>
            <fieldset style="float:left; margin-left:20px">
                <legend>出处</legend>
                <p><?php echo $this->Form->text('source', array('class'=>'short'))?></p>
            </fieldset>
            <fieldset style="clear:both">
                <legend>内容</legend>
                <div><?php echo $this->Form->textarea('content', array('style'=>'height:400px'))?></div>
            </fieldset>
            
        </div>
    </div>
    <?php echo $this->Form->end()?>
</div>
<?php echo $this->Html->css('ui-lightness/jquery-ui-1.8.16.custom', 'stylesheet', array('media'=>'screen', 'inline'=>false));?>
<?php echo $this->Html->css('/editor/themes/default/default.css', 'stylesheet', array('media'=>'screen', 'inline'=>false));?>
<?php echo $this->Html->script('jquery.ui.datepicker-zh-CN')?>
<?php echo $this->Html->script('/editor/kindeditor-min.js')?>
<?php echo $this->Html->script('/editor/lang/zh_CN.js')?>
<?php echo $this->Html->script('admin/info/edit')?>
