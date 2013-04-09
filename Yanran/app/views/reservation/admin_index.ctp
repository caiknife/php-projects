<div id="content">
    <h2>在线预约</h2>
    <div class="page">
        <?php echo $this->Form->create('Reservation', array('type'=>'post', 'url'=>array('controller'=>'reservation', 'action'=>'index', 'admin'=>true)));?>
        <?php echo $this->element('reservation/admin_paginate')?>
        <?php echo $this->Form->end();?>
    </div>
    <table class="tab applicationList">
        <thead>
            <tr>
                <td class="title">预约人</td>
                <td>科室/医师</td>
                <td>预约日期</td>
                <td>提交时间</td>
                <td class="operate"><button onclick="self.location='<?php echo $this->Html->url(array('action'=>'csv', 'admin'=>true))?>'">下载到本地</button></td>
                <!-- 下载到本地就是导出CSV， 导出按application_detail.html的字段来-->
            </tr>
        </thead>
        <tbody>
            <?php foreach($reservations as $item):?>
            <tr>
                <td class="title"><?php echo h($item['Reservation']['gender'])?> / <?php echo h($item['Reservation']['name'])?> / <?php echo h($item['Reservation']['city'])?></td>
                <td><?php echo h($item['Reservation']['department'])?> / <?php echo h($item['Reservation']['doctor'])?></td>
                <td><?php echo $this->Format->toDate($item['Reservation']['reserved_date'], 'Y年m月d日')?> <?php echo h($item['Reservation']['reserved_time'])?></td>
                <td><?php echo $this->Format->toDate($item['Reservation']['created'], 'Y年m月d日 H:i')?></td>
                <td class="operate"><a href="<?php echo $this->Html->url(array('action'=>'view', 'admin'=>true, $item['Reservation']['id']))?>">查看详细</a></td>
            </tr>
            <?php endforeach;?>            
        <tbody>
    </table>
    <div class="page">
        <?php echo $this->Form->create('Reservation', array('type'=>'post', 'url'=>array('controller'=>'reservation', 'action'=>'index', 'admin'=>true)));?>
        <?php echo $this->element('reservation/admin_paginate')?>
        <?php echo $this->Form->end();?>
    </div>
</div>
<?php echo $this->Html->script('admin/reservation/index')?>