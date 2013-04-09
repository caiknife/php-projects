<div id="content">
    <h2>添加照片</h2>
    <?php echo $this->Form->create('Photo', array('type'=>'file', 'url'=>array('controller'=>'album', 'action'=>'updatephoto', 'admin'=>true)))?>
    <?php echo $this->Form->hidden('id')?>
    <div class="tabDetails">
        <div class="tabRight">
            <div class="release">
                <p>
                    <input type="submit" value="保 存" class="disn" />
                    <a class="save" href="#">发布</a>
                    <a class="del" href="<?php echo $this->Html->url(array('action'=>'deletephoto', $photo['Photo']['id']))?>">删除</a>
                </p>    
            </div>
            <div class="tabRightBox">
                <h3>上传</h3>
                <fieldset>
                    <legend>图片 <span title="图片尺寸 -/ 800px × 600px" class="help"></span> </legend>
                    <p><?php echo $this->Form->file('banner')?></p>
                    <img src="<?php echo $this->Format->getPhotoListImage($photo['Photo'])?>" />
                </fieldset>
            </div>
        </div>
        <div class="tabLeft">
            <fieldset>
                <legend>图片备注</legend>
                <div><?php echo $this->Form->text('title_cn', array('title'=>'中文'))?></div>
                <div><?php echo $this->Form->text('title_en', array('title'=>'英文'))?></div>
            </fieldset>
            <fieldset class="searchBar">
                <legend>相关项目</legend>
                <input id="project" type="text" /> 
                <ul id="projectList" class="disn"></ul>
                <div id="projectDiv">
                    <?php foreach($photo['Project'] as $project):?>
                    <a title="移除" href="<?php echo $this->Html->url(array('action'=>'disconnect', $photo['Photo']['id'], $project['id']))?>" class="disconnect"><?php echo h($project['title_cn'])?> | <?php echo h($project['title_en'])?></a>
                    <?php endforeach;?> 
                </div>
            </fieldset>
            <fieldset>
                <legend>所属相册</legend>
                <?php echo $this->Form->select('album_id', $albumList, null, array('empty'=>false))?>
            </fieldset>
        </div>
    </div>
    <?php echo $this->Form->end()?>
</div>
<?php echo $this->Html->script('admin/album/photo')?>