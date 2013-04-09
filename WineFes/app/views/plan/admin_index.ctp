<div id="content">
    <h2>展位平面图 <span>(拖动排序)</span></h2>
    <?php echo $this->Form->create('Banner', array('type'=>'file', 'url'=>array('controller'=>'plan', 'action'=>'add', 'admin'=>true)))?>
    <div class="page"></div>
    <div class="separtmentList planList">
        <ul><!-- 
            前台缩略图:宽度220，高度自适应
            前台弹出图：1000*1000，宽高等比缩放，不用留白边
            -->
            <?php foreach($plans as $plan):?>
            <li data="<?php echo $plan['Plan']['id']?>">
                <img title="拖动排序" src="<?php echo $this->Format->getPlan($plan['Plan'])?>" />
                <strong class="name"><?php echo h($plan['Plan']['title'])?></strong>
                <a href="<?php echo $this->Html->url(array('action'=>'edit', $plan['Plan']['id']))?>" class="edit">编辑</a> 
                <a href="<?php echo $this->Html->url(array('action'=>'delete', $plan['Plan']['id']))?>" class="delete">删除</a>
            </li>
            <?php endforeach;?>
            <li class="add">
                <input title="上传图片：请上传最大尺寸的图片并保持每张图片的长宽比相同" type="file" id="banner_pic" name="banner_pic" />
                <input title="图片名称" type="text" id="banner_title" name="banner_title" />
                <a href="#" class="add"><strong>添加</strong></a>
            </li>
        </ul>
    </div>
    <?php echo $this->Form->end();?>
</div>
<?php echo $this->Html->script('ajaxfileupload')?>
<?php echo $this->Html->script('admin/plan/index')?>