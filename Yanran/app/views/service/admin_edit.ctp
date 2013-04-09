<div id="content">
    <h2>添加服务项目 </h2>
    <?php echo $this->Form->create('Service', array('type'=>'file', 'url'=>array('controller'=>'service', 'action'=>'update', 'admin'=>true)))?>
    <?php echo $this->Form->hidden('id')?>
    <div class="tabDetails">
        <div class="tabRight">
            <div class="release">
                <p>
                    <input type="submit" value="保 存" class="disn" />
                    <a class="save" href="#">发布</a>
                    <a class="del" href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $service['Service']['id']))?>">删除</a>
                </p>
            </div>
            <div class="tabRightBox">
                <h3>上传图片</h3>
                <fieldset>
                    <legend>列表图片<span title="图片尺寸 -/ 200px × 200px" class="help"></span> </legend>
                    <p><?php echo $this->Form->file('banner')?></p>
                    <img src="<?php echo $this->Format->getService($service['Service'])?>" width="200" height="200" />
                </fieldset>
            </div>
        </div>
        <div class="tabLeft">
            <fieldset>
                <legend>服务标题</legend>
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
</div>
<?php echo $this->Html->css('/editor/themes/default/default.css', 'stylesheet', array('media'=>'screen', 'inline'=>false));?>
<?php echo $this->Html->script('/editor/kindeditor-min.js')?>
<?php echo $this->Html->script('/editor/lang/zh_CN.js')?>
<?php echo $this->Html->script('admin/service/edit')?>