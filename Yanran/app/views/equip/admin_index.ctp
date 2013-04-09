<div id="content">
    <h2>环境设施 <span>(拖动排序)</span></h2>
    <div class="page"></div>
    <!-- 大图 800*600 范围内等比缩放 -->
    <!-- 列表缩略图 200*200 等比比缩放裁剪不留白边 -->
    <?php foreach($data as $key=>$equips):?>
    <?php echo $this->Form->create('Equip', array('type'=>'file', 'url'=>array('controller'=>'equip', 'action'=>'add', 'admin'=>true, 'type'=>$key)))?>
    <div class="separtmentList enviList">
        <h3><?php echo h($equipTypes[$key])?></h3>
        <ul>
            <?php foreach($equips as $equip):?>
            <li data="<?php echo $equip['Equip']['id']?>">
                <img title="拖动排序" src="<?php echo $this->Format->getEquip($equip['Equip'])?>" />
                <a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $equip['Equip']['id']))?>" class="edit">编辑</a> 
                <a href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $equip['Equip']['id']))?>" class="delete">删除</a>
            </li>
            <?php endforeach;?>
            <li class="add">
                <?php echo $this->Form->file('banner', array('title'=>'上传图片 800px×600px'))?>
                <?php echo $this->Form->textarea('desc_cn', array('title'=>'照片描述 中文'))?>
                <?php echo $this->Form->textarea('desc_en', array('title'=>'照片描述 英文'))?>
                <a href="<?php echo $this->Html->url(array('action'=>'add', 'admin'=>true, 'type'=>$key))?>" class="add"><strong>添加</strong></a>
            </li>
        </ul>
    </div>
    <?php echo $this->Form->end()?>
    <?php endforeach;?>
</div>
<?php echo $this->Html->script('admin/equip/index')?>