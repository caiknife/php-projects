<div id="content">
    <h2>媒体剪报 <a href="<?php echo $this->Html->url(array('action'=>'add'))?>">添加</a></h2>
    <div class="page">
        <?php echo $this->Form->create('Media', array('type'=>'post', 'url'=>array('controller'=>'media', 'action'=>'index', 'admin'=>true)));?>
        <?php echo $this->element('media/admin_paginate')?>
        <?php echo $this->Form->select('year', $this->Format->setYearRange(), null, array('empty'=>'年份'))?>
        <?php echo $this->Form->select('month', $this->Format->setMonthRange(), null, array('empty'=>'月份'))?>
        <?php echo $this->Form->select('lang', Configure::read('Site.lang'), null, array('empty'=>'语言'))?>
        <?php echo $this->Form->end();?>
    </div>
    <table class="tab newsList">
        <thead>
            <tr>
                <td class="title">剪报名称</td>
                <td>来源</td>
                <td>语言</td>
                <td class="time">媒体时间</td>
                <td class="operate">操作</td>
            </tr>
        </thead>
        <tbody>
            <?php $siteLang = Configure::read('Site.lang');?>
            <?php foreach ($medias as $media):?>
            <tr>
                <td class="title"><a href="<?php echo $this->Html->url(array('action'=>'edit', $media['Media']['id']))?>"><?php echo h($media['Media']['title'])?></a></td>
                <td><?php echo h($media['Media']['source'])?></td>
                <td><?php echo $siteLang[$media['Media']['lang']]?></td>
                <td><?php echo h($media['Media']['media_date'])?></td>
                <td class="operate">
                    <a href="<?php echo $this->Html->url(array('action'=>'edit', $media['Media']['id']))?>">编辑</a> 
                    <a href="<?php echo $this->Html->url(array('action'=>'delete', $media['Media']['id']))?>" class="delete">删除</a>
                </td>
            </tr>
            <?php endforeach;?>
        <tbody>
    </table>
    <div class="page">
        <?php echo $this->Form->create('Media', array('type'=>'post', 'url'=>array('controller'=>'media', 'action'=>'index', 'admin'=>true)));?>
        <?php echo $this->element('media/admin_paginate')?>
        <?php echo $this->Form->select('year', $this->Format->setYearRange(), null, array('empty'=>'年份'))?>
        <?php echo $this->Form->select('month', $this->Format->setMonthRange(), null, array('empty'=>'月份'))?>
        <?php echo $this->Form->select('lang', Configure::read('Site.lang'), null, array('empty'=>'语言'))?>
        <?php echo $this->Form->end();?>
    </div>
</div>
<?php echo $this->Html->script('admin/media/index')?>