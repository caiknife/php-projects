<div id="content">
    <h2>健康资讯 <a href="<?php echo $this->Html->url(array('action'=>'add', 'admin'=>true))?>">添加</a></h2>
    <div class="page">
        <?php echo $this->Form->create('Info', array('type'=>'post', 'url'=>array('controller'=>'info', 'action'=>'index', 'admin'=>true)));?>
        <?php echo $this->element('info/admin_paginate')?>
        <?php echo $this->Form->select('year', $this->Format->setYearRange(), null, array('empty'=>'年份'))?>
        <?php echo $this->Form->select('month', $this->Format->setMonthRange(), null, array('empty'=>'月份'))?>
        <?php echo $this->Form->select('lang', Configure::read('Site.lang'), null, array('empty'=>'语言'))?>
        <?php echo $this->Form->end();?>
    </div>
    <table class="tab newsList">
        <thead>
            <tr>
                <td class="title">资讯名称</td>
                <td class="operate">操作</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($infos as $info):?>
            <tr>
                <td class="title">
                    <a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $info['Info']['id']))?>"><?php echo h($info['Info']['title'])?></a>
                    <p><?php echo $this->Format->toDate($info['Info']['news_date'])?> | <?php echo h($info['Info']['source'])?></p>
                </td>
                <td class="operate">
                    <a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $info['Info']['id']))?>">编辑</a> 
                    <a href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $info['Info']['id']))?>" class="delete">删除</a>
                </td>
            </tr>
            <?php endforeach;?>
        <tbody>
    </table>
    <div class="page">
        <?php echo $this->Form->create('Info', array('type'=>'post', 'url'=>array('controller'=>'info', 'action'=>'index', 'admin'=>true)));?>
        <?php echo $this->element('info/admin_paginate')?>
        <?php echo $this->Form->select('year', $this->Format->setYearRange(), null, array('empty'=>'年份'))?>
        <?php echo $this->Form->select('month', $this->Format->setMonthRange(), null, array('empty'=>'月份'))?>
        <?php echo $this->Form->select('lang', Configure::read('Site.lang'), null, array('empty'=>'语言'))?>
        <?php echo $this->Form->end();?>
    </div>
</div>
<?php echo $this->Html->script('admin/info/index')?>