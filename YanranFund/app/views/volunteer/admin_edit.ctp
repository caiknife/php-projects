<div id="content">
    <h2>添加志愿者</h2>
    <?php echo $this->Form->create('Volunteer', array('type'=>'file', 'url'=>array('controller'=>'volunteer', 'action'=>'update', 'admin'=>true)))?>
    <?php echo $this->Form->hidden('id')?>
    <?php echo $this->Form->hidden('is_display')?>
    <div class="tabDetails">
        <div class="tabRight">
            <div class="release">
                <p>
                    <input type="submit" value="保 存" class="disn" />
                    <a class="save" href="#">发布</a>
                    <a class="del" href="<?php echo $this->Html->url(array('action'=>'delete', $volunteer['Volunteer']['id']))?>">删除</a>
                </p>    
            </div>
            <div class="tabRightBox">
                <h3>上传</h3>
                <fieldset>
                    <legend>肖像 <span title="图片尺寸 -/ 70px × 70px" class="help"></span> </legend>
                    <p><?php echo $this->Form->file('banner')?></p>
                    <?php if($volunteer['Volunteer']['banner_file_path']):?>
                    <img id="news_image" src="<?php echo $this->Format->getVolunteerListImage($volunteer['Volunteer'])?>" />
                    <?php endif;?>
                </fieldset>
            </div>
            <div class="tabRightBox">
                <h3>其他设置</h3>
                <fieldset>
                    <legend>志愿者类型</legend>
                    <?php foreach(Configure::read('Volunteer.types') as $key=>$val):?>
                    <label class="radio"><input name="types[]" value="<?php echo $key?>" type="checkbox" <?php if(in_array($key, $volunteer['Volunteer']['types'])):?>checked<?php endif;?> /><?php echo h($val)?></label>
                    <?php endforeach;?>
                </fieldset>
            </div>
        </div>
        <div class="tabLeft">
            <fieldset>
                <legend>姓名</legend>
                <div><?php echo $this->Form->text('name_cn', array('title'=>'中文', 'data'=>'中文', 'require'=>true, 'message'=>'请输入中文姓名！'))?></div>
                <div><?php echo $this->Form->text('name_en', array('title'=>'英文', 'data'=>'英文', 'require'=>true, 'message'=>'请输入英文姓名！'))?></div>
            </fieldset>
            <fieldset>
                <legend>个人简述</legend>
                <div><?php echo $this->Form->textarea('desc_cn', array('title'=>'中文', 'data'=>'中文'))?></div>
                <div><?php echo $this->Form->textarea('desc_en', array('title'=>'英文', 'data'=>'英文'))?></div>
            </fieldset>
        </div>
    </div>
    <?php echo $this->Form->end()?>
</div>
<?php echo $this->Html->script('admin/volunteer/edit')?>