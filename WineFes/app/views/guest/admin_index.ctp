<div id="content">
    <h2>应邀嘉宾 <span>(拖动排序)</span></h2>
    <?php echo $this->Form->create('Guest', array('type'=>'file', 'url'=>array('controller'=>'guest', 'action'=>'add', 'admin'=>true)))?>
    <div class="page"></div>
    <div class="separtmentList">
        <ul>
            <!--裁切尺寸150*150 -->
            <?php foreach($guests as $guest):?>
            <li data="<?php echo $guest['Guest']['id']?>">
                <img src="<?php echo $this->Format->getGuest($guest['Guest'])?>" />
                <strong class="name"><?php echo h($guest['Guest']['title'])?></strong>
                <a href="<?php echo $this->Html->url(array('action'=>'edit', $guest['Guest']['id']))?>" class="edit">编辑</a> 
                <a href="<?php echo $this->Html->url(array('action'=>'delete', $guest['Guest']['id']))?>" class="delete">删除</a>
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
<?php echo $this->Html->script('admin/guest/index')?>