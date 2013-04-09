<div id="content">
    <h2>志愿者 <span>(可拖动列表排序)</span><a href="<?php echo $this->Html->url(array('action'=>'add'))?>">添加</a></h2>
    <div class="page"></div>
    <table class="tab">
        <thead>
            <tr>
                <td class="title">板块名称</td>
                <td class="operate">操作</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($vblocks as $vblock):?>
            <tr data="<?php echo $vblock['Vblock']['id']?>">
                <td title="拖动排序" class="title"><?php echo h($vblock['Vblock']['title_cn'])?> | <?php echo h($vblock['Vblock']['title_en'])?></td>
                <td class="operate">
                    <?php if($vblock['Vblock']['is_editable']):?>
                    <a href="<?php echo $this->Html->url(array('action'=>'edit', $vblock['Vblock']['id']))?>">编辑</a>
                    <?php endif;?>
                    <?php if($vblock['Vblock']['is_deletable']):?> 
                    <a href="<?php echo $this->Html->url(array('action'=>'delete', $vblock['Vblock']['id']))?>" class="delete">删除</a>
                    <?php endif;?>
                    <?php if($vblock['Vblock']['is_show']):?> 
                    <a href="<?php echo $this->Html->url(array('action'=>'hide', $vblock['Vblock']['id']))?>" class="hide">隐藏</a>
                    <?php else:?>
                    <a href="<?php echo $this->Html->url(array('action'=>'show', $vblock['Vblock']['id']))?>" class="show">显示</a>
                    <?php endif;?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<?php echo $this->Html->script('admin/vblock/index')?>