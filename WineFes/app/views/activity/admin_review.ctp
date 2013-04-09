<div id="content">
    <h2>历届活动回顾</h2>
    <?php echo $this->Form->create('ActivityReview', array('type'=>'file', 'url'=>array('controller'=>'activity', 'action'=>'addreview', 'admin'=>true)))?>
    <div class="page"></div>
    <table class="tab exponentList">
        <thead>
            <tr>
                <td class="title">活动时间段</td>
                <td>历届名称</td>
                <td class="operate">操作</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($reviews as $review):?>
            <tr>
                <td class="title"><?php echo h($review['ActivityReview']['year'])?>年/<?php echo h($review['ActivityReview']['month'])?>月 前属于</td>
                <td><?php echo h($review['ActivityReview']['title'])?></td>
                <td class="operate">
                    <a href="<?php echo $this->Html->url(array('action'=>'editreview', 'admin'=>true, $review['ActivityReview']['id']))?>" class="edit">编辑</a> 
                    <a href="<?php echo $this->Html->url(array('action'=>'deletereview', 'admin'=>true, $review['ActivityReview']['id']))?>" class="delete">删除</a>
                </td>
            </tr>
            <?php endforeach;?>
            <tr>
                <td class="title">
                    <?php echo $this->Form->select('year', $this->Format->setYearRange(), null, array('empty'=>'年份'))?>
                    <?php echo $this->Form->select('month', $this->Format->setMonthRange(), null, array('empty'=>'月份'))?>
                    前属于
                </td>
                <td>
                    <?php echo $this->Form->text('title')?>
                </td>
                <td class="operate">
                    <a href="#" class="add"><strong>添加</strong></a>
                </td>
            </tr>
        </tbody>
    </table>
    <?php echo $this->Form->end()?>
</div>
<?php echo $this->Html->script('admin/activity/review')?>