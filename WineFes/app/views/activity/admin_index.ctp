<div id="content">
    <h2>酒节活动 <a href="<?php echo $this->Html->url(array('action'=>'add', 'admin'=>true))?>">添加</a></h2>
    <div class="page">
        <?php echo $this->Form->create('Activity', array('type'=>'post', 'url'=>array('controller'=>'activity', 'action'=>'index', 'admin'=>true)));?>
		<?php echo $this->element('activity/admin_paginate')?>
        <?php echo $this->Form->select('year', $this->Format->setYearRange(), null, array('empty'=>'年份'))?>
        <?php echo $this->Form->select('month', $this->Format->setMonthRange(), null, array('empty'=>'月份'))?>
		<?php echo $this->Form->end();?>
    </div>
    <table class="tab newsList activityList">
        <thead>
            <tr>
                <td class="title">活动名称</td>
                <td class="operate">操作</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($activities as $activity):?>
            <tr>
                <td class="title">
                    <a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>'true', $activity['Activity']['id']))?>"><img src="<?php echo $this->Format->getActivityLogo($activity['Activity'])?>" /></a>
                    <a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>'true', $activity['Activity']['id']))?>"><?php echo h($activity['Activity']['title'])?></a>
                    <p><?php echo $this->Format->toDate($activity['Activity']['activity_date'], 'Y年m月')?> | <?php echo h($activity['Activity']['address'])?> | <?php echo h($activity['Activity']['guests'])?></p>
                    <p><?php echo $this->Text->truncate(strip_tags($activity['Activity']['intro']), 200)?></p>
                </td>
                <td class="operate">
                    <a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>'true', $activity['Activity']['id']))?>">编辑</a> 
                    <a href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>'true', $activity['Activity']['id']))?>" class="delete">删除</a>
                </td>
            </tr>
            <?php endforeach;?>
        <tbody>
    </table>
    <div class="page">
        <?php echo $this->Form->create('Activity', array('type'=>'post', 'url'=>array('controller'=>'activity', 'action'=>'index', 'admin'=>true)));?>
        <?php echo $this->element('activity/admin_paginate')?>
        <?php echo $this->Form->select('year', $this->Format->setYearRange(), null, array('empty'=>'年份'))?>
        <?php echo $this->Form->select('month', $this->Format->setMonthRange(), null, array('empty'=>'月份'))?>
        <?php echo $this->Form->end();?>
    </div>
</div>
<?php echo $this->Html->script('admin/activity/index')?>