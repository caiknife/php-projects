<div id="content">
    <h2>添加项目</h2>
    <?php echo $this->Form->create('Project', array('type'=>'file', 'url'=>array('controller'=>'project', 'action'=>'update', 'admin'=>true)))?>
    <?php echo $this->Form->hidden('id')?>
    <?php echo $this->Form->hidden('is_display')?>
    <div class="tabDetails">
        <div class="tabRight">
            <div class="release">
                <p>
                    <input type="submit" value="保 存" class="disn" />
                    <a class="save" href="#">发布</a>
                    <a class="del" href="<?php echo $this->Html->url(array('action'=>'delete', $project['Project']['id']))?>">删除</a>
                </p>    
            </div>
            <div class="tabRightBox">
                <h3>上传</h3>
                <fieldset>
                    <legend>项目KV <span title="图片尺寸 -/ 160px × 120px" class="help"></span> </legend>
                    <p><?php echo $this->Form->file('banner')?></p>
                    <?php if($project['Project']['banner_file_path']):?>
                    <img id="news_image" src="<?php echo $this->Format->getProjectListImage($project['Project'])?>" />
                    <?php endif;?>
                </fieldset>
            </div>
        </div>
        <div class="tabLeft">
            <fieldset>
                <legend>项目名称</legend>
                <div><?php echo $this->Form->text('title_cn', array('title'=>'中文', 'data'=>'中文', 'require'=>true, 'message'=>'请输入中文项目名称！'))?></div>
                <div><?php echo $this->Form->text('title_en', array('title'=>'英文', 'data'=>'英文'))?></div>
            </fieldset>
            <fieldset>
                <legend>项目简述</legend>
                <div><?php echo $this->Form->textarea('desc_cn', array('title'=>'中文', 'data'=>'中文', 'require'=>true, 'message'=>'请输入中文项目简述！'))?></div>
                <div><?php echo $this->Form->textarea('desc_en', array('title'=>'英文', 'data'=>'英文'))?></div>
            </fieldset>
            <fieldset>
                <legend><a class="curr cn" href="#">中文</a> <a class="en" href="#">英文</a></legend>
                <div class="cn"><?php echo $this->Form->textarea('content_cn', array('style'=>'height:500px'))?></div>
                <div class="en"><?php echo $this->Form->textarea('content_en', array('style'=>'height:500px'))?></div>
            </fieldset>
            <div class="tabLeftBox photoList">
                <h3>
                                        项目合作伙伴
                    <span id="spanButtonPlaceholder"></span>
                    <input id="btnUpload" type="button" value="上传" url="<?php echo $this->Html->url(array('controller'=>'upload', 'action'=>'projectupload', $project['Project']['id']))?>" />
                    <img id="loading_logo" src="/images/loading.gif" width="100" height="15" class="disn" />
                </h3>
                <ul class="logoList">
                    <!-- 列表缩略图 宽度不超过150 高度不超过75 等比缩放 -->
                    <?php foreach($project['Logo'] as $logo):?>
                    <li data="<?php echo $logo['id']?>">
                        <div><img title="拖动排序" src="<?php echo $this->Format->getLogoListImage($logo)?>" /></div>
                        <input title="中文名称" type="text" name="title_cn[<?php echo $logo['id']?>]" value="<?php echo $logo['title_cn']?>" />
                        <input title="英文名称" type="text" name="title_en[<?php echo $logo['id']?>]" value="<?php echo $logo['title_en']?>" />
                        <input title="链接" type="text" name="url[<?php echo $logo['id']?>]" value="<?php echo $logo['url']?>" />
                        <a href="<?php echo $this->Html->url(array('action'=>'deletelogo', $logo['id']))?>">刪除</a>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
    <?php echo $this->Form->end();?>
</div>
<?php echo $this->Html->css('/editor/themes/default/default.css', 'stylesheet', array('media'=>'screen', 'inline'=>false));?>
<?php echo $this->Html->script('/editor/kindeditor-min.js')?>
<?php echo $this->Html->script('/editor/lang/zh_CN.js')?>
<?php echo $this->Html->script('ajaxfileupload')?>
<?php echo $this->Html->script(array('/swfupload/swfupload.js', '/swfupload/swfupload.queue.js', '/swfupload/fileprogress.js'))?>
<?php echo $this->Html->script('admin/project/handler')?>
<?php echo $this->Html->script('admin/project/edit')?>