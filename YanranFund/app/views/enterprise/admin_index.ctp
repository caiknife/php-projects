<div id="content">
    <h2>企业伙伴</h2>
    <?php echo $this->Form->create('Enterprise', array('type'=>'file', 'url'=>array('controller'=>'enterprise', 'action'=>'add', 'admin'=>true)))?>
    <div class="page"></div>
    <!-- 列表缩略图 宽度不超过150 高度不超过75 等比缩放 -->
    <div class="conList partnerList">
        <ul>
            <?php foreach($enterprises as $enterprise):?>
            <li data="<?php echo $enterprise['Enterprise']['id']?>">
                <div><img title="拖动排序" src="<?php echo $this->Format->getEnterpriseListImage($enterprise['Enterprise'])?>" /></div>
                <strong class="name"><?php echo h($enterprise['Enterprise']['title_cn'])?> | <?php echo h($enterprise['Enterprise']['title_en'])?></strong>
                <a href="<?php echo $this->Html->url(array('action'=>'edit', $enterprise['Enterprise']['id']))?>" class="edit">编辑</a> 
                <a href="<?php echo $this->Html->url(array('action'=>'delete', $enterprise['Enterprise']['id']))?>" class="delete">删除</a>
            </li>
            <?php endforeach;?>
            <li class="edit">
                <input title="上传尺寸 -/ 150px 75px" type="file" id="banner_pic" name="banner_pic" />
                <input title="中文名称" type="text" id="banner_title_cn" name="banner_title_cn" value="中文名称" />
                <input title="英文名称" type="text" id="banner_title_en" name="banner_title_en" value="英文名称"/>
                <input title="链接" type="text" id="banner_url" name="banner_url" value="链接" />
                <a href="#" class="add"><strong>添加</strong></a>
            </li>
        </ul>
    </div>
    <?php echo $this->Form->end()?>
</div>
<?php echo $this->Html->script('admin/enterprise/index')?>