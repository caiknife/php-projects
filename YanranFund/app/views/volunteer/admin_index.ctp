<div id="content">
    <h2>志愿者名单 <a href="<?php echo $this->Html->url(array('action'=>'add'))?>">添加</a></h2>
    <div class="page"></div>
    <!-- 列表缩略图 70*70 等比缩放 裁剪不留白边 竖版图片从顶部往下裁 -->
    <?php foreach($data as $key=>$group):?>
    <div class="conList volunteerList">
        <h3><?php echo h($volunteerTypes[$key])?></h3>
        <ul type="<?php echo $key?>">
            <?php foreach($group as $volunteer):?>
            <li data="<?php echo $volunteer['Volunteer']['id']?>">
                <div><img title="拖动排序" src="<?php echo $this->Format->getVolunteerListImage($volunteer['Volunteer'])?>" /></div>
                <strong class="name"><?php echo h($volunteer['Volunteer']['name_cn'])?><br /><?php echo h($volunteer['Volunteer']['name_en'])?></strong>
                <a href="<?php echo $this->Html->url(array('action'=>'edit', $volunteer['Volunteer']['id']))?>">编辑</a> 
                <a href="<?php echo $this->Html->url(array('action'=>'delete', $volunteer['Volunteer']['id']))?>" class="delete">删除</a>
            </li>
            <?php endforeach;?>
        </ul>
    </div>
    <?php endforeach;?>
</div>
<?php echo $this->Html->script('admin/volunteer/index')?>