<div id="content">
    <h2>天使伙伴  <span>(可拖动列表排序)</span><a href="<?php echo $this->Html->url(array('action'=>'add'))?>">添加</a></h2>
    <div class="page"></div>
    <table class="tab">
        <thead>
            <tr>
                <td class="title">板块名称</td>
                <td class="operate">操作</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($pblocks as $pblock):?>
            <tr data="<?php echo $pblock['Pblock']['id']?>">
                <td title="拖动排序" class="title"><?php echo h($pblock['Pblock']['title_cn'])?> | <?php echo h($pblock['Pblock']['title_en'])?></td>
                <td class="operate">
                    <?php if($pblock['Pblock']['is_editable']):?>
                    <a href="<?php echo $this->Html->url(array('action'=>'edit', $pblock['Pblock']['id']))?>">编辑</a>
                    <?php endif;?>
                    <?php if($pblock['Pblock']['is_deletable']):?> 
                    <a href="<?php echo $this->Html->url(array('action'=>'delete', $pblock['Pblock']['id']))?>" class="delete">删除</a>
                    <?php endif;?>
                    <?php if($pblock['Pblock']['is_show']):?> 
                    <a href="<?php echo $this->Html->url(array('action'=>'hide', $pblock['Pblock']['id']))?>" class="hide">隐藏</a>
                    <?php else:?>
                    <a href="<?php echo $this->Html->url(array('action'=>'show', $pblock['Pblock']['id']))?>" class="show">显示</a>
                    <?php endif;?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<?php echo $this->Html->script('admin/pblock/index')?>