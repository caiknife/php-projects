<div id="content">
    <h2> 参展在线申请</h2>
    <div class="page">
        <?php echo $this->Form->create('Application', array('type'=>'post', 'url'=>array('controller'=>'apply', 'action'=>'index', 'admin'=>true)));?>
        <?php echo $this->element('apply/admin_paginate')?>
        <?php echo $this->Form->end();?>
    </div>
    <table class="tab applicationList">
        <thead>
            <tr>
                <td class="title">参展商</td>
                <td>地址</td>
                <td>联系人</td>
                <td>电话</td>
                <td>手机</td>
                <td>经营范围</td>
                <td class="operate">诉求</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($applications as $application):?>
            <tr>
                <td class="title"><?php echo h($application['Application']['title'])?></td>
                <td><?php echo h($application['Application']['address'])?></td>
                <td><?php echo h($application['Application']['contactor'])?></td>
                <td><?php echo h($application['Application']['tel'])?></td>
                <td><?php echo h($application['Application']['mobile'])?></td>
                <td><?php echo h($application['Application']['business'])?></td>
                <td class="operate">
                    <?php if($application['Application']['comment']):?>
                    <a href="<?php echo $this->Html->url(array('action'=>'view', 'admin'=>true, $application['Application']['id']))?>">查看</a>
                    <?php else:?>
                   	无
                    <?php endif;?>
                </td>
            </tr>
            <?php endforeach;?>
        <tbody>
    </table>
    <div class="page">
        <?php echo $this->Form->create('Application', array('type'=>'post', 'url'=>array('controller'=>'apply', 'action'=>'index', 'admin'=>true)));?>
        <?php echo $this->element('apply/admin_paginate')?>
        <?php echo $this->Form->end();?>
    </div>
</div>
<?php echo $this->Html->script('admin/apply/index')?>