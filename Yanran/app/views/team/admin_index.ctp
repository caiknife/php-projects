<div id="content">
    <h2>医疗团队 <span>(拖动排序)</span><a href="<?php echo $this->Html->url(array('action'=>'add', 'admin'=>true))?>">添加</a></h2>
    <div class="page"></div>
    <!-- 列表缩略图 200*200 等比比缩放裁剪不留白边 -->
    <div class="separtmentList serviceList">
        <ul>
            <?php foreach($teams as $team):?>
            <li data="<?php echo $team['Team']['id']?>">
                <img title="拖动排序" src="<?php echo $this->Format->getTeam($team['Team'])?>" />
                <strong class="name"><?php echo h($team['Team']['name_cn'])?> / <?php echo h($team['Team']['title_cn'])?></strong>
                <a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $team['Team']['id']))?>">编辑</a> 
                <a href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $team['Team']['id']))?>" class="delete">删除</a>
            </li>
            <?php endforeach;?>            
        </ul>
    </div>
</div>
<?php echo $this->Html->script('admin/team/index')?>