<div id="content">
    <h2>嫣然团队</h2>
    <?php echo $this->Form->create('Person', array('type'=>'file', 'url'=>array('controller'=>'team', 'action'=>'add', 'admin'=>true)))?>
    <div class="page"></div>
    <!-- 列表缩略图 宽度140 高度200 等比缩放 -->
    <div class="conList personalList">
        <ul>
            <?php foreach($persons as $person):?>
            <li data="<?php echo $person['Person']['id']?>">
                <div><img title="拖动排序" src="<?php echo $this->Format->getPersonListImage($person['Person'])?>" /></div>
                <strong class="name"><?php echo h($person['Person']['title_cn'])?> | <?php echo h($person['Person']['title_en'])?></strong>
                <a href="<?php echo $this->Html->url(array('action'=>'edit', $person['Person']['id']))?>" class="edit">编辑</a> 
                <a href="<?php echo $this->Html->url(array('action'=>'delete', $person['Person']['id']))?>" class="delete">删除</a>
            </li>
            <?php endforeach;?>
            <li class="edit">
                <input title="上传尺寸 -/ 140px 200px" type="file" id="banner_pic" name="banner_pic" />
                <input title="中文姓名" type="text" id="banner_title_cn" name="banner_title_cn" value="中文姓名" />
                <input title="英文姓名" type="text" id="banner_title_en" name="banner_title_en" value="英文姓名" />
                <!-- 
                <input title="口号中文" type="text" id="banner_slogan_cn" name="banner_slogan_cn" />
                <input title="口号英文" type="text" id="banner_slogan_en" name="banner_slogan_en" />
                 -->
                <a href="#" class="add"><strong>添加</strong></a>
            </li>
        </ul>
    </div>
    <?php echo $this->Form->end()?>
</div>
<?php echo $this->Html->script('admin/personal/index')?>