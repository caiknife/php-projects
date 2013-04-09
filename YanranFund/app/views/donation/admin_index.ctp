<div id="content">
    <h2>捐赠中心 <span>(可拖动列表排序)</span><a href="<?php echo $this->Html->url(array('action'=>'add'))?>">添加</a></h2>
    <div class="page"></div>
    <table class="tab">
        <thead>
            <tr>
                <td class="title">板块名称</td>
                <td class="operate">操作</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($donations as $donation):?>
            <tr data="<?php echo $donation['Donation']['id']?>">
                <td title="拖动排序" class="title"><?php echo h($donation['Donation']['title_cn'])?> | <?php echo h($donation['Donation']['title_en'])?></td>
                <td class="operate">
                    <?php if($donation['Donation']['is_editable']):?>
                    <a href="<?php echo $this->Html->url(array('action'=>'edit', $donation['Donation']['id']))?>">编辑</a>
                    <?php endif;?>
                    <?php if($donation['Donation']['is_deletable']):?> 
                    <a href="<?php echo $this->Html->url(array('action'=>'delete', $donation['Donation']['id']))?>" class="delete">删除</a>
                    <?php endif;?>
                    <?php if($donation['Donation']['is_show']):?> 
                    <a href="<?php echo $this->Html->url(array('action'=>'hide', $donation['Donation']['id']))?>" class="hide">隐藏</a>
                    <?php else:?>
                    <a href="<?php echo $this->Html->url(array('action'=>'show', $donation['Donation']['id']))?>" class="show">显示</a>
                    <?php endif;?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<?php echo $this->Html->script('admin/donation/index')?>