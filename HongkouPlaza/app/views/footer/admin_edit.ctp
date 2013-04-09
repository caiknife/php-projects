<div id="containerHolder">
    <div id="container">
        <div id="sidebar">
            <ul class="sideNav">
                <?php echo $this->element('footer/admin_menu')?>
            </ul>
            <!-- // .sideNav -->
        </div>
        <!-- // #sidebar -->
         <div id="main">
            <?php echo $this->Form->create('Block', array('type'=>'file', 'url'=>array('controller'=>'footer', 'action'=>'update', 'admin'=>true), 'class'=>'jNice'))?>
		    <?php echo $this->Form->hidden('id')?>
                <div class="help_edit">
                    <h3>必填信息</h3>
                    <fieldset>
                        <p>
                            <label><strong>标题</strong></label>
                            <?php echo $this->Form->text('title', array('class'=>'text-long'))?>
                        </p>
                        <p>
                            <label><strong>正文</strong></label>
                            <?php echo $this->Form->textarea('content')?>
                        </p>
                    </fieldset>
                </div>
                <br clear="all" />
                <input type="submit" value="保 存" />
            <?php echo $this->Form->end()?>
        </div>
        <!-- // #main -->
        <div class="clear"></div>
    </div>
    <!-- // #container -->
</div>
<?php echo $this->Html->css('/editor/themes/default/default.css', 'stylesheet', array('media'=>'screen', 'inline'=>false));?>
<?php echo $this->Html->script('/editor/kindeditor-min.js')?>
<?php echo $this->Html->script('/editor/lang/zh_CN.js')?>
<?php echo $this->Html->script('admin/footer/edit')?>