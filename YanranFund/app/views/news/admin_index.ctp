<div id="content">
    <h2>新闻中心 <a href="<?php echo $this->Html->url(array('action'=>'add'))?>">添加</a></h2>
    <div class="page">
        <?php echo $this->Form->create('News', array('type'=>'post', 'url'=>array('controller'=>'news', 'action'=>'index', 'admin'=>true)));?>
        <?php echo $this->element('news/admin_paginate')?>
        <?php echo $this->Form->select('year', $this->Format->setYearRange(), null, array('empty'=>'年份'))?>
        <?php echo $this->Form->select('month', $this->Format->setMonthRange(), null, array('empty'=>'月份'))?>
        <?php echo $this->Form->select('lang', Configure::read('Site.lang'), null, array('empty'=>'语言'))?>
        <?php echo $this->Form->end();?>
    </div>
    <table class="tab newsList">
        <thead>
            <tr>
                <td class="title">新闻名称</td>
                <td width="80">语言</td>
                <td class="time">发布时间</td>
                <td class="operate">操作</td>
            </tr>
        </thead>
        <tbody>
            <?php $siteLang = Configure::read('Site.lang');?>
            <?php foreach($newses as $news):?>
            <tr>
                <td class="title"><a href="<?php echo $this->Html->url(array('action'=>'edit', $news['News']['id']))?>"><?php echo h($news['News']['title'])?></a></td>
                <td><?php echo $siteLang[$news['News']['lang']]?></td>
                <td><?php echo h($news['News']['public_date'])?></td>
                <td class="operate">
                    <?php if(!$news['News']['is_public']):?>
                    <a href="<?php echo $this->Html->url(array('action'=>'open', $news['News']['id']))?>" class="hover">发布</a>
                    <?php endif;?>
                    <a href="<?php echo $this->Html->url(array('action'=>'edit', $news['News']['id']))?>">编辑</a> 
                    <a href="<?php echo $this->Html->url(array('action'=>'delete', $news['News']['id']))?>" class="delete">删除</a>
                </td>
            </tr>
            <?php endforeach;?>
        <tbody>
    </table>
    <div class="page">
        <?php echo $this->Form->create('News', array('type'=>'post', 'url'=>array('controller'=>'news', 'action'=>'index', 'admin'=>true)));?>
        <?php echo $this->element('news/admin_paginate')?>
        <?php echo $this->Form->select('year', $this->Format->setYearRange(), null, array('empty'=>'年份'))?>
        <?php echo $this->Form->select('month', $this->Format->setMonthRange(), null, array('empty'=>'月份'))?>
        <?php echo $this->Form->select('lang', Configure::read('Site.lang'), null, array('empty'=>'语言'))?>
        <?php echo $this->Form->end();?>
    </div>
</div>
<?php echo $this->Html->script('admin/news/index')?>