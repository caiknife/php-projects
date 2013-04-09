<div id="content">
    <div class="eventsList">
        <div class="mainbav"><a class="home" href="index.html">首页</a><strong>活动会议</strong></div>
        <!--<div class="switchBtn"><a class="curr" href="#">活动回顾标题1</a> <a href="#">活动回顾标题2</a> <a href="#">活动回顾标题3</a></div>-->
        <!-- 每页8条活动 -->
        <ul class="eventsListCon">
            <?php foreach($activities as $activity):?>
            <li>
                <a class="pic" href="<?php echo $this->Html->url(array('action'=>'detail', 'cn'=>true, $activity['Activity']['id']))?>"><img src="<?php echo $this->Format->getActivityLogo($activity['Activity'])?>" /></a>
                <a class="title" href="<?php echo $this->Html->url(array('action'=>'detail', 'cn'=>true, $activity['Activity']['id']))?>"><?php echo h($activity['Activity']['title'])?></a>
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
            <?php echo $this->element('activity/cn_paginate')?>
        </div>
    </div>
</div>