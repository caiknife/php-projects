<div id="content">
    <h2>嫣设计 <a href="<?php echo $this->Html->url(array('action'=>'add'))?>">添加</a></h2>
    <div class="page">
        <?php echo $this->Form->create('Plan', array('type'=>'post', 'url'=>array('controller'=>'plan', 'action'=>'index', 'admin'=>true)));?>
        <?php echo $this->element('plan/admin_paginate')?>
        <?php echo $this->Form->select('year', $this->Format->setYearRange(), null, array('empty'=>'年份'))?>
        <?php echo $this->Form->select('month', $this->Format->setMonthRange(), null, array('empty'=>'月份'))?>
        <?php echo $this->Form->select('lang', Configure::read('Site.lang'), null, array('empty'=>'语言'))?>
        <?php echo $this->Form->end();?>
    </div>
    <table class="tab newsList">
        <thead>
            <tr>
                <td class="title">名称</td>
                <td width="80">语言</td>
                <td class="time">发布时间</td>
                <td class="operate">操作</td>
            </tr>
        </thead>
        <tbody>
            <?php $siteLang = Configure::read('Site.lang');?>
            <?php foreach($plans as $plan):?>
            <tr>
                <td class="title"><a href="<?php echo $this->Html->url(array('action'=>'edit', $plan['Plan']['id']))?>"><?php echo h($plan['Plan']['title'])?></a></td>
                <td><?php echo $siteLang[$plan['Plan']['lang']]?></td>
                <td><?php echo h($plan['Plan']['public_date'])?></td>
                <td class="operate">
                    <?php if(!$plan['Plan']['is_public']):?>
                    <a href="<?php echo $this->Html->url(array('action'=>'open', $plan['Plan']['id']))?>" class="hover">发布</a>
                    <?php endif;?>
                    <a href="<?php echo $this->Html->url(array('action'=>'edit', $plan['Plan']['id']))?>">编辑</a> 
                    <a href="<?php echo $this->Html->url(array('action'=>'delete', $plan['Plan']['id']))?>" class="delete">删除</a>
                </td>
            </tr>
            <?php endforeach;?>
        <tbody>
    </table>
    <div class="page">
        <?php echo $this->Form->create('Plan', array('type'=>'post', 'url'=>array('controller'=>'plan', 'action'=>'index', 'admin'=>true)));?>
        <?php echo $this->element('plan/admin_paginate')?>
        <?php echo $this->Form->select('year', $this->Format->setYearRange(), null, array('empty'=>'年份'))?>
        <?php echo $this->Form->select('month', $this->Format->setMonthRange(), null, array('empty'=>'月份'))?>
        <?php echo $this->Form->select('lang', Configure::read('Site.lang'), null, array('empty'=>'语言'))?>
        <?php echo $this->Form->end();?>
    </div>
</div>
<?php echo $this->Html->script('admin/plan/index')?>