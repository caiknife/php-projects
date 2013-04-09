<div id="content">
    <h2>参展商LOGO <span>(拖动排序)</span></h2>
    <?php echo $this->Form->create('Exhibitor', array('type'=>'file', 'url'=>array('controller'=>'exhibitor', 'action'=>'add', 'admin'=>true)))?>
    <div class="page"></div>
    <div class="separtmentList exhibitorsList">
        <ul>
            <!--裁切尺寸150*100 -->
            <?php foreach($exhibitors as $exhibitor):?>
            <li data="<?php echo $exhibitor['Exhibitor']['id']?>">
                <img src="<?php echo $this->Format->getExhibitor($exhibitor['Exhibitor'])?>" />
                <strong class="name"><?php echo h($exhibitor['Exhibitor']['title'])?></strong>
                <a href="<?php echo $this->Html->url(array('action'=>'edit', $exhibitor['Exhibitor']['id']))?>" class="edit">编辑</a> 
                <a href="<?php echo $this->Html->url(array('action'=>'delete', $exhibitor['Exhibitor']['id']))?>" class="delete">删除</a>
            </li>
            <?php endforeach;?>
            <li class="add">
                <input title="上传图片 150px×150px" type="file" id="banner_pic" name="banner_pic" />
                <input title="名字" type="text" id="banner_title" name="banner_title" />
                <a href="#" class="add"><strong>添加</strong></a>
            </li>
        </ul>
    </div>
    <?php echo $this->Form->end()?>
</div>
<?php echo $this->Html->script('ajaxfileupload')?>
<?php echo $this->Html->script('admin/exhibitor/index')?>