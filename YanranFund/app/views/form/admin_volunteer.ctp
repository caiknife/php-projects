<div id="content">
    <h2>志愿者申请</h2>
    <div class="page">
        <?php echo $this->Form->create('FormVolunteer', array('type'=>'post', 'url'=>array('controller'=>'form', 'action'=>'volunteer', 'admin'=>true)));?>
        <?php echo $this->element('admin_paginate')?>
        <?php echo $this->Form->end();?>
    </div>
    <table class="tab formList">
        <thead>
            <tr>
                <td class="title">姓名</td>
                <td>性别</td>
                <td>手机</td>
                <td>年龄</td>
                <td>教育程度</td>
                <td>志愿者经验</td>
                <td class="operate">操作</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($forms as $item):?>
            <tr>
                <td><?php echo h($item['FormVolunteer']['name'])?></td>
                <td><?php echo h($item['FormVolunteer']['gender'])?></td>
                <td><?php echo h($item['FormVolunteer']['mobile'])?></td>
                <td><?php echo h($item['FormVolunteer']['age'])?>岁</td>
                <td><?php echo h($item['FormVolunteer']['degree'])?></td>
                <td><?php echo h($item['FormVolunteer']['has_volunteer'])?></td>
                <td class="operate"><a <?php if(!$item['FormVolunteer']['is_viewed']):?>class="hover"<?php endif;?> href="<?php echo $this->Html->url(array('action'=>'viewvolunteer', $item['FormVolunteer']['id']))?>">查看</a><!-- 未查看过的表单添加class="hover" --></td>
            </tr>
            <?php endforeach;?>
        <tbody>
    </table>
    <div class="page">
        <?php echo $this->Form->create('FormVolunteer', array('type'=>'post', 'url'=>array('controller'=>'form', 'action'=>'volunteer', 'admin'=>true)));?>
        <?php echo $this->element('admin_paginate')?>
        <?php echo $this->Form->end();?>
    </div>
</div>
<?php echo $this->Html->script('admin/form/index')?>