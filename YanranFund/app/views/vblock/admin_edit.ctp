<div id="content">
    <?php echo $this->Form->create('Vblock', array('type'=>'file', 'url'=>array('controller'=>'vblock', 'action'=>'update', 'admin'=>true)))?>
    <?php echo $this->Form->hidden('id')?>
    <div class="tabDetails" style="margin:0">
        <div class="tabRight">
            <div class="release">
                <p>
                    <input type="submit" value="保 存" class="disn" />
                    <a class="save" href="#">发布</a>
                    <?php if($vblock['Vblock']['is_deletable']):?>
                    <a class="del" href="<?php echo $this->Html->url(array('action'=>'delete', $vblock['Vblock']['id']))?>">删除</a><!-- 固定板块不可删除-->
                    <?php endif;?>
                </p>
            </div>
        </div>
        <div class="tabLeft">
            <fieldset>
                <legend>板块标题</legend>
                <div>
                    <?php echo $this->Form->text('title_cn', array('title'=>'中文', 'class'=>'short'))?> 
                    <?php echo $this->Form->text('title_en', array('title'=>'英文', 'class'=>'short'))?>
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
<?php echo $this->Html->script('admin/vblock/edit')?>