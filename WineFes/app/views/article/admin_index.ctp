<div id="content">
    <?php echo $this->element('flash')?>
    <?php echo $this->Form->create('Article', array('type'=>'file', 'url'=>array('controller'=>'article', 'action'=>'update', 'admin'=>true)))?>
    <?php echo $this->Form->hidden('id')?>
    <?php echo $this->Form->hidden('type')?>
    <div class="tabDetails" style="margin:0">
        <div class="tabRight">
            <div class="release">
                <p>
                    <input type="submit" value="保 存" class="disn" />
                    <a class="save" href="#">发布</a>
                    <a class="del" href="#">清空</a><!-- 固定板块不可删除-->
                </p>
            </div>
        </div>
        <div class="tabLeft">
            <fieldset>
                <div>
                    <?php echo $this->Form->textarea('content', array('style'=>'height:500px'))?>
                </div>
            </fieldset>
            
        </div>
    </div>
    <?php echo $this->Form->end()?>
</div>
<?php echo $this->Html->css('/editor/themes/default/default.css', 'stylesheet', array('media'=>'screen', 'inline'=>false));?>
<?php echo $this->Html->script('/editor/kindeditor-min.js', false)?>
<?php echo $this->Html->script('/editor/lang/zh_CN.js', false)?>
<?php echo $this->Html->script('admin/article/index', false)?>