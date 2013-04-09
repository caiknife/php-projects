<div id="content">
    <h2>添加医疗团队 </h2>
    <?php echo $this->Form->create('Team', array('type'=>'file', 'url'=>array('controller'=>'team', 'action'=>'update', 'admin'=>true)))?>
    <?php echo $this->Form->hidden('id')?>
    <div class="tabDetails">
        <div class="tabRight">
            <div class="release">
                <p>
                    <input type="submit" value="保 存" class="disn" />
                    <a class="save" href="#">发布</a>
                    <a class="del" href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $team['Team']['id']))?>">删除</a>
                </p>
            </div>
            <div class="tabRightBox">
                <h3>上传图片</h3>
                <fieldset>
                    <legend>相片<span title="图片尺寸 -/ 200px × 200px" class="help"></span> </legend>
                    <p><?php echo $this->Form->file('banner')?></p>
                    <img src="<?php echo $this->Format->getTeam($team['Team'])?>" width="200" height="200" />
                </fieldset>
            </div>
        </div>
        <div class="tabLeft">
            <fieldset>
                <legend>姓名</legend>
                <div>
                    <?php echo $this->Form->text('name_cn', array('class'=>'short', 'title'=>'中文'))?>
                    <?php echo $this->Form->text('name_en', array('class'=>'short', 'title'=>'英文'))?>
                </div>
            </fieldset>
            <fieldset>
                <legend>职称</legend>
                <div>
                    <?php echo $this->Form->text('title_cn', array('class'=>'short', 'title'=>'中文'))?>
                    <?php echo $this->Form->text('title_en', array('class'=>'short', 'title'=>'英文'))?>
                </div>
            </fieldset>
            <fieldset>
                <legend>简介</legend>
                <div><?php echo $this->Form->textarea('content_cn', array('title'=>'中文'))?></div>
                <div><?php echo $this->Form->textarea('content_en', array('title'=>'英文'))?></div>
            </fieldset>
        </div>
    </div>
</div>
<?php echo $this->Html->script('admin/team/edit')?>