<div id="content">
    <h2>合作伙伴 <span>(拖动排序)</span></h2>
    <?php echo $this->Form->create('Partner', array('type'=>'file', 'url'=>array('controller'=>'partner', 'action'=>'add', 'admin'=>true)))?>
    <div class="page"></div>
    <div class="separtmentList">
        <ul><!--裁切尺寸150*100 -->
            <?php foreach($partners as $partner):?>
            <li data="<?php echo $partner['Partner']['id']?>">
                <img src="<?php echo $this->Format->getPartner($partner['Partner'])?>" />
                <strong class="name"><?php echo h($partner['Partner']['title_cn'])?> | <?php echo h($partner['Partner']['title_en'])?></strong>
                <a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $partner['Partner']['id']))?>" class="edit">编辑</a> 
                <a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $partner['Partner']['id']))?>" class="delete">删除</a>
            </li>
            <?php endforeach;?>
            <li class="add">
                <input title="上传图片 150px×150px" type="file" id="banner_pic" name="banner_pic" />
                <input title="名字 中文" type="text" id="banner_title_cn" name="banner_title_cn" />
                <input title="名字 英文" type="text" id="banner_title_en" name="banner_title_en" />
                <a href="#" class="add"><strong>添加</strong></a>
            </li>
        </ul>
    </div>
    <?php echo $this->Form->end()?>
</div>
<?php echo $this->Html->script('admin/partner/index')?>