<div id="content">
    <h2>添加医院</h2>
    <?php echo $this->Form->create('Hospital', array('type'=>'file', 'url'=>array('controller'=>'hospital', 'action'=>'update', 'admin'=>true)))?>
    <?php echo $this->Form->hidden('id')?>
    <div class="tabDetails">
        <div class="tabRight">
            <div class="release">
                <p>
                    <input type="submit" value="保 存" class="disn" />
                    <a class="save" href="#">保存</a>
                    <a class="del" href="<?php echo $this->Html->url(array('action'=>'delete', $hospital['Hospital']['id']))?>">删除</a>
                </p>    
            </div>
            <div class="tabRightBox">
                <h3>上传</h3>
                <fieldset>
                    <legend>医院LOGO <span title="图片尺寸 -/ 250px × 140px" class="help"></span> </legend>
                    <p><?php echo $this->Form->file('banner')?></p>
                    <?php if($hospital['Hospital']['banner_file_path']):?>
                    <img id="news_image" src="<?php echo $this->Format->getHospitalListImage($hospital['Hospital'])?>" />
                    <?php endif;?>
                </fieldset>
            </div>
        </div>
        <div class="tabLeft">
            <fieldset>
                <legend>标题</legend>
                <div><?php echo $this->Form->text('title_cn', array('title'=>'中文'))?></div>
                <div><?php echo $this->Form->text('title_en', array('title'=>'英文'))?></div>
            </fieldset>
            <fieldset>
                <legend>医院简述</legend>
                <div><?php echo $this->Form->textarea('desc_cn', array('title'=>'中文'))?></div>
                <div><?php echo $this->Form->textarea('desc_en', array('title'=>'英文'))?></div>
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
<?php echo $this->Html->script('admin/hospital/edit')?>