<div id="content">
    <h2>添加相册</h2>
    <?php echo $this->Form->create('Album', array('type'=>'file', 'url'=>array('controller'=>'album', 'action'=>'update', 'admin'=>true)))?>
    <?php echo $this->Form->hidden('id')?>
    <div class="tabDetails">
        <div class="tabRight">
            <div class="release">
                <p>
                    <input type="submit" value="保 存" class="disn" />
                    <a class="save" href="#">发布</a>
                    <a class="del" href="<?php echo $this->Html->url(array('action'=>'delete', $album['Album']['id']))?>">删除</a>
                </p>    
            </div>
            <div class="tabRightBox">
                <h3>相册封面</h3>
                <fieldset>
                    <img id="album_logo" src="<?php echo $this->Format->getAlbumListImage($album['Album'])?>" />
                </fieldset>
            </div>
        </div>
        <div class="tabLeft">
            <fieldset>
                <legend>相册标题</legend>
                <div><?php echo $this->Form->text('title_cn', array('title'=>'中文'))?></div>
                <div><?php echo $this->Form->text('title_en', array('title'=>'英文'))?></div>
            </fieldset>
            <div class="tabLeftBox photoList">
                <h3>
                                        图片集
                    <span id="spanButtonPlaceholder"></span>
                    <input id="btnUpload" type="button" value="上传" url="<?php echo $this->Html->url(array('controller'=>'upload', 'action'=>'albumupload', $album['Album']['id']))?>" />
                    <img id="loading_logo" src="/images/loading.gif" width="100" height="15" class="disn" />
                </h3>
                <ul class="logoList">
                    <!-- 缩略图 260x180 裁剪，放大图 800x600 缩放 -->
                    <?php foreach($album['Photo'] as $photo):?>
                    <li data="<?php echo $photo['id']?>">
                        <img title="拖动排序" src="<?php echo $this->Format->getPhotoListImage($photo)?>" />
                        <input title="中文名称" type="text" name="title_cn[<?php echo $photo['id']?>]" value="<?php echo $photo['title_cn']?>" /> 
                        <input title="英文名称" type="text" name="title_en[<?php echo $photo['id']?>]" value="<?php echo $photo['title_en']?>" /> 
                        <a href="<?php echo $this->Html->url(array('action'=>'photo', $photo['id']))?>">详细</a> 
                        <a href="<?php echo $this->Html->url(array('action'=>'setcover', $album['Album']['id'], $photo['id']))?>" class="setcover">设为封面</a> 
                        <a href="<?php echo $this->Html->url(array('action'=>'deletephoto', $photo['id']))?>" class="delete">刪除</a>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
    <?php echo $this->Form->end();?>
</div>
<?php echo $this->Html->script('ajaxfileupload')?>
<?php echo $this->Html->script(array('/swfupload/swfupload.js', '/swfupload/swfupload.queue.js', '/swfupload/fileprogress.js'))?>
<?php echo $this->Html->script('admin/album/handler')?>
<?php echo $this->Html->script('admin/album/edit')?>