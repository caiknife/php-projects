<div id="content">
    <h2>慈善项目 <a href="<?php echo $this->Html->url(array('action'=>'add'))?>">添加</a></h2>
    <div class="page">
        <?php echo $this->Form->create('Project', array('type'=>'post', 'url'=>array('controller'=>'project', 'action'=>'index', 'admin'=>true)));?>
        <?php echo $this->element('project/admin_paginate')?>
        <?php echo $this->Form->end();?>
    </div>
    <table class="tab newsList">
        <thead>
            <tr>
                <td class="title">项目名称</td>
                <td class="time">修改时间</td>
                <td class="operate">操作</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($projects as $project):?>
            <tr>
                <td class="title"><a href="<?php echo $this->Html->url(array('action'=>'edit', $project['Project']['id']))?>"><?php echo h($project['Project']['title_cn'])?> | <?php echo h($project['Project']['title_en'])?></a></td>
                <td><?php echo $project['Project']['modified']?></td>
                <td class="operate">
                    <a href="<?php echo $this->Html->url(array('action'=>'edit', $project['Project']['id']))?>">编辑</a> 
                    <a href="<?php echo $this->Html->url(array('action'=>'delete', $project['Project']['id']))?>" class="delete">删除</a>
                </td>
            </tr>
            <?php endforeach;?>
        <tbody>
    </table>
    <div class="page">
        <?php echo $this->Form->create('Project', array('type'=>'post', 'url'=>array('controller'=>'project', 'action'=>'index', 'admin'=>true)));?>
        <?php echo $this->element('project/admin_paginate')?>
        <?php echo $this->Form->end();?>
    </div>
</div>
<?php echo $this->Html->script('admin/project/index')?>