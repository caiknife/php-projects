<div id="content">
    <h2><?php if($type):?><?php echo h($newsType[$type])?><?php else:?>全部新闻<?php endif?> <a href="<?php echo $this->Html->url(array('action'=>'add', 'admin'=>true, 'type'=>$type))?>">添加</a></h2>
    <div class="page">
        <?php echo $this->Form->create('News', array('type'=>'post', 'url'=>array('controller'=>'news', 'action'=>'index', 'admin'=>true)));?>
		<?php echo $this->element('news/admin_paginate')?>
        <?php echo $this->Form->hidden('type', array('value'=>$type))?>
        <?php echo $this->Form->select('year', $this->Format->setYearRange(), null, array('empty'=>'年份'))?>
        <?php echo $this->Form->select('month', $this->Format->setMonthRange(), null, array('empty'=>'月份'))?>
		<?php echo $this->Form->end();?>
    </div>
    <table class="tab newsList">
        <thead>
            <tr>
                <td class="title">新闻名称</td>
                <td class="operate">操作</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($newses as $news):?>
            <tr>
                <td class="title">
                    <a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $news['News']['id']))?>"><img src="<?php echo $this->Format->getNewsLogo($news['News'])?>" /></a>
                    <a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $news['News']['id']))?>"><?php echo h($news['News']['title'])?></a>
                    <p><?php echo $this->Format->toDate($news['News']['news_date'], 'Y年m月d日')?> | <?php echo h($news['News']['source'])?></p>
                    <p><?php echo $this->Text->truncate(strip_tags($news['News']['intro']), 200)?></p>
                </td>
                <td class="operate">
                    <a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $news['News']['id']))?>">编辑</a> 
                    <a href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $news['News']['id']))?>" class="delete">删除</a>
                </td>
            </tr>
            <?php endforeach;?>
        <tbody>
    </table>
    <div class="page">
        <?php echo $this->Form->create('News', array('type'=>'post', 'url'=>array('controller'=>'news', 'action'=>'index', 'admin'=>true)));?>
		<?php echo $this->element('news/admin_paginate')?>
        <?php echo $this->Form->hidden('type', array('value'=>$type))?>
        <?php echo $this->Form->select('year', $this->Format->setYearRange(), null, array('empty'=>'年份'))?>
        <?php echo $this->Form->select('month', $this->Format->setMonthRange(), null, array('empty'=>'月份'))?>
		<?php echo $this->Form->end();?>
    </div>
</div>
<?php echo $this->Html->script('admin/news/index')?>