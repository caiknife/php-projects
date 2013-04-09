<div id="content">
    <h2>医院网上申报</h2>
    <div class="page">
        <?php echo $this->Form->create('FormHospital', array('type'=>'post', 'url'=>array('controller'=>'form', 'action'=>'hospital', 'admin'=>true)));?>
        <?php echo $this->element('admin_paginate')?>
        <?php echo $this->Form->end();?>
    </div>
    <table class="tab formList">
        <thead>
            <tr>
                <td class="title">机构名称</td>
                <td>患者数量</td>
                <td>手术数量</td>
                <td>结算周期</td>
                <td>结算金额</td>
                <td>已减免手术量及金额</td>
                <td class="operate">操作</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($forms as $item):?>
            <tr>
                <td class="title"><?php echo h($item['FormHospital']['title'])?></td>
                <td><?php echo h($item['FormHospital']['patients_amount'])?></td>
                <td><?php echo h($item['FormHospital']['operation_amount'])?></td>
                <td><?php echo h($item['FormHospital']['period'])?></td>
                <td><?php echo h($item['FormHospital']['fee_amount'])?>元</td>
                <td><?php echo h($item['FormHospital']['discount_amount'])?>元</td>
                <td class="operate"><a <?php if(!$item['FormHospital']['is_viewed']):?>class="hover"<?php endif;?> href="<?php echo $this->Html->url(array('action'=>'viewhospital', $item['FormHospital']['id']))?>">查看</a><!-- 未查看过的表单添加class="hover" --></td>
            </tr>
            <?php endforeach;?>
        <tbody>
    </table>
    <div class="page">
        <?php echo $this->Form->create('FormHospital', array('type'=>'post', 'url'=>array('controller'=>'form', 'action'=>'hospital', 'admin'=>true)));?>
        <?php echo $this->element('admin_paginate')?>
        <?php echo $this->Form->end();?>
    </div>
</div>
<?php echo $this->Html->script('admin/form/index')?>