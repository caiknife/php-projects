<div id="content">
    <h2>新闻下载中心 <a href="<?php echo $this->Html->url(array('action'=>'add'))?>">添加</a></h2>
    <div class="page">
        <?php echo $this->Form->create('Topic', array('type'=>'post', 'url'=>array('controller'=>'topic', 'action'=>'index', 'admin'=>true)));?>
        <?php echo $this->element('topic/admin_paginate')?>
        <?php echo $this->Form->select('year', $this->Format->setYearRange(), null, array('empty'=>'年份'))?>
        <?php echo $this->Form->select('month', $this->Format->setMonthRange(), null, array('empty'=>'月份'))?>
        <?php echo $this->Form->end();?>
    </div>
    <table class="tab newsList">
        <thead>
            <tr>
                <td class="title">新闻稿名称</td>
                <td>语言</td>
                <td class="time">发布时间</td>
                <td class="operate">操作</td>
            </tr>
        </thead>
        <tbody>
            <?php $siteLang = Configure::read('Site.lang');?>
            <?php foreach($topics as $topic):?>
            <tr>
                <td class="title"><a href="<?php echo $this->Html->url(array('action'=>'edit', $topic['Topic']['id']))?>"><?php echo h($topic['Topic']['title'])?></a></td>
                <td><?php echo $siteLang[$topic['Topic']['lang']]?></td>
                <td><?php echo $topic['Topic']['topic_date']?></td>
                <td class="operate">
                    <a href="<?php echo $this->Html->url(array('action'=>'edit', $topic['Topic']['id']))?>">编辑</a> 
                    <a href="<?php echo $this->Html->url(array('action'=>'delete', $topic['Topic']['id']))?>" class="delete">删除</a>
                </td>
            </tr>
            <?php endforeach;?>
        <tbody>
    </table>
    <div class="page">
        <?php echo $this->Form->create('Topic', array('type'=>'post', 'url'=>array('controller'=>'topic', 'action'=>'index', 'admin'=>true)));?>
        <?php echo $this->element('topic/admin_paginate')?>
        <?php echo $this->Form->select('year', $this->Format->setYearRange(), null, array('empty'=>'年份'))?>
        <?php echo $this->Form->select('month', $this->Format->setMonthRange(), null, array('empty'=>'月份'))?>
        <?php echo $this->Form->end();?>
    </div>
</div>
<?php echo $this->Html->script('admin/topic/index')?>