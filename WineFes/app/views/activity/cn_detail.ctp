<div id="content">
    <div class="sidebar hotLsit">
        <dl>
            <dt>热门活动</dt>
            <?php foreach($hotActivities as $hotActivity):?>
            <dd><a href="<?php echo $this->Html->url(array('action'=>'detail', 'cn'=>true, $hotActivity['Activity']['id']))?>"><?php echo h($hotActivity['Activity']['title'])?></a> <span><?php echo $this->Format->toDate($hotActivity['Activity']['activity_date'], 'Y.m.d H:i')?></span></dd>
            <?php endforeach?>
        </dl>
        <?php echo $this->element('cn_quicklink')?>
    </div>
    <div class="main2">
        <div class="mainbav"><a class="home" href="/">首页</a><strong>活动会议</strong></div>
        <h2 class="title"><?php echo h($activity['Activity']['title'])?></h2>
        <div class="artInfo">
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
        </div>
        <div id="Cms">
            <?php echo $activity['Activity']['content']?>
        </div>
    </div>
</div>