<div id="content">
    <h2>添加板块</h2>
    <?php echo $this->Form->create('Block', array('type'=>'file', 'url'=>array('controller'=>'block', 'action'=>'update', 'admin'=>true)))?>
    <?php echo $this->Form->hidden('id')?>
    <?php echo $this->Form->hidden('type')?>
    <div class="tabDetails">
        <div class="tabRight">
            <div class="release">
                <p>
                    <input type="submit" value="保 存" class="disn" />
                    <a class="save" href="#">发布</a>
                    <a class="del" href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $block['Block']['id']))?>">删除</a><!-- 固定板块不可删除-->
                </p>
            </div>
        </div>
        <div class="tabLeft">
            <fieldset>
                <legend>板块标题</legend>
                <div>
                    <?php echo $this->Form->text('title_cn', array('class'=>'short', 'title'=>'中文'))?>
                    <?php echo $this->Form->text('title_en', array('class'=>'short', 'title'=>'英文'))?>
                </div>
            </fieldset>
            <fieldset>
                <legend><a class="curr cn" href="#">中文</a> <a class="en" href="#">英文</a></legend>
                <div class="cn"><?php echo $this->Form->textarea('content_cn', array('style'=>'height:500px'))?></div>
                <div class="en"><?php echo $this->Form->textarea('content_en', array('style'=>'height:500px'))?></div>
            </fieldset>
        </div>
    </div>
    <?php echo $this->Form->end()?>
</div>
<?php echo $this->Html->css('/editor/themes/default/default.css', 'stylesheet', array('media'=>'screen', 'inline'=>false));?>
<?php echo $this->Html->script('/editor/kindeditor-min.js')?>
<?php echo $this->Html->script('/editor/lang/zh_CN.js')?>
<?php echo $this->Html->script('admin/block/edit')?>