<div id="content">
    <h2>服务项目 <span>(拖动排序)</span><a href="<?php echo $this->Html->url(array('action'=>'add', 'admin'=>true))?>">添加</a></h2>
    <div class="page"></div>
    <!-- 列表缩略图 200*200 等比比缩放裁剪不留白边 -->
    <div class="separtmentList serviceList">
        <ul>
            <?php foreach($services as $service):?>
            <li data="<?php echo $service['Service']['id']?>">
                <img title="拖动排序" src="<?php echo $this->Format->getService($service['Service'])?>" />
                <strong class="name"><?php echo h($service['Service']['title_cn'])?> | <?php echo h($service['Service']['title_en'])?></strong>
                <a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $service['Service']['id']))?>">编辑</a> 
                <a href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $service['Service']['id']))?>" class="delete">删除</a>
            </li>
            <?php endforeach;?>
        </ul>
    </div>
</div>
<?php echo $this->Html->script('admin/service/index')?>