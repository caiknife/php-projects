<div id="content">
    <h2>定点医院 <a href="<?php echo $this->Html->url(array('action'=>'add'))?>">添加</a></h2>
    <div class="page"></div>
    <!-- 列表缩略图 宽度不超过250 高度不超过140 等比缩放 -->
    <div class="conList hospitalList">
        <ul>
            <?php foreach($hospitals as $hospital):?>
            <li data="<?php echo $hospital['Hospital']['id']?>">
                <div><img title="拖动排序" src="<?php echo $this->Format->getHospitalListImage($hospital['Hospital'])?>" /></div>
                <strong class="name"><?php echo h($hospital['Hospital']['title_cn'])?> | <?php echo h($hospital['Hospital']['title_en'])?></strong>
                <a href="<?php echo $this->Html->url(array('action'=>'edit', $hospital['Hospital']['id']))?>">编辑</a> 
                <a href="<?php echo $this->Html->url(array('action'=>'delete', $hospital['Hospital']['id']))?>" class="delete">删除</a>
            </li>
            <?php endforeach;?>
        </ul>
    </div>
</div>
<?php echo $this->Html->script('admin/hospital/index')?>