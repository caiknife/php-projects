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
            <?php echo $this->Form->create('Post', array('type'=>'file', 'url'=>array('controller'=>'footer', 'action'=>'upload', 'admin'=>true), 'class'=>'jNice'))?>
            <?php echo $this->Form->hidden('id')?>
                <div class="posters_edit">
                    <h3>必填信息</h3>
                    <fieldset>
                        <?php if($post['Post']['banner_file_path']):?>
                        <img src="<?php echo $this->Format->getPost($post['Post'])?>" />
                        <?php endif;?>
                        <p><label>图片上传（替换）</label><?php echo $this->Form->file('banner', array('class'=>'text-long'))?></p>
                    </fieldset>
                </div>
                <br clear="all" />
                <input type="submit" value="提交信息" />
            <?php echo $this->Form->end()?>
        </div>
        <!-- // #main -->
        <div class="clear"></div>
    </div>
    <!-- // #container -->
</div>
<?php echo $this->Html->script('admin/footer/post')?>