<div id="content">
    <h2>申请救助</h2>
    <div class="page">
        <?php echo $this->Form->create('FormHelp', array('type'=>'post', 'url'=>array('controller'=>'form', 'action'=>'help', 'admin'=>true)));?>
        <?php echo $this->element('form/admin_paginate')?>
        <?php echo $this->Form->end();?>
    </div>
    <table class="tab formList">
        <thead>
            <tr>
                <td class="title">患者姓名</td>
                <td>性别</td>
                <td>手机</td>
                <td>监护人</td>
                <td>患病类型</td>
                <td>做过唇腭裂手术</td>
                <td>申请日期</td>
                <td class="operate">操作</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($forms as $item):?>
            <tr>
                <td><?php echo h($item['FormHelp']['name'])?></td>
                <td><?php echo h($item['FormHelp']['gender'])?></td>
                <td><?php echo h($item['FormHelp']['mobile'])?></td>
                <td><?php echo h($item['FormHelp']['gurdian'])?></td>
                <td><?php echo h($item['FormHelp']['sick_type'])?></td>
                <td><?php echo h($item['FormHelp']['sick_operation'])?></td>
                <td><?php echo h($item['FormHelp']['created'])?></td>
                <td class="operate"><a <?php if(!$item['FormHelp']['is_viewed']):?>class="hover"<?php endif;?> href="<?php echo $this->Html->url(array('action'=>'viewhelp', $item['FormHelp']['id']))?>">查看</a><!-- 未查看过的表单添加class="hover" --></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <div class="page">
        <?php echo $this->Form->create('FormHelp', array('type'=>'post', 'url'=>array('controller'=>'form', 'action'=>'help', 'admin'=>true)));?>
        <?php echo $this->element('form/admin_paginate')?>
        <?php echo $this->Form->end();?>
    </div>
</div>
<?php echo $this->Html->script('admin/form/index')?>