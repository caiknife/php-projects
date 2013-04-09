<div id="content">
    <div class="eventsList">
        <div class="mainbav"><a class="home" href="/">首页</a><span>历届回顾</span><strong>活动回顾</strong></div>
        <div class="switchBtn">
            <?php foreach($reviews as $key => $review):?>
            <a <?php if($id==$review['ActivityReview']['id']):?>class="curr"<?php endif;?> href="<?php echo $this->Html->url(array('action'=>'activity', 'cn'=>true, $review['ActivityReview']['id']))?>"><?php echo h($review['ActivityReview']['title'])?></a> 
            <?php endforeach;?>
        </div>
        <!-- 每页8条活动 -->
        <ul class="eventsListCon">
            <?php foreach($activities as $activity):?>
            <li>
                <a class="pic" href="<?php echo $this->Html->url(array('controller'=>'activity', 'action'=>'detail', 'cn'=>true, $activity['Activity']['id']))?>"><img src="<?php echo $this->Format->getActivityLogo($activity['Activity'])?>" /></a>
                <a class="title" href="<?php echo $this->Html->url(array('controller'=>'activity', 'action'=>'detail', 'cn'=>true, $activity['Activity']['id']))?>"><?php echo h($activity['Activity']['title'])?></a>
                <p><?php echo h($activity['Activity']['intro'])?></p>
                <table cellspacing="3" class="eventsTab">
                    <tr>
                        <th>日期</th>
                        <td><?php echo $this->Format->toDate($activity['Activity']['activity_date'], 'Y年m月d日 H:i')?></td>
                    </tr>
                    <tr>
                        <th>地点</th>
                        <td><?php echo h($activity['Activity']['address'])?></td>
                    </tr>
                    <tr>
                        <th>嘉宾</th>
                        <td><?php echo h($activity['Activity']['guests'])?></td>
                    </tr>
                </table>
            </li>
            <?php endforeach;?>
        </ul>
        <div class="pageFlip">
            <?php echo $this->element('cn_paginate')?>
        </div>
    </div>
</div>