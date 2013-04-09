<div id="content">
    <h2>嫣然天使儿童医院  <span>(可拖动列表排序)</span><a href="<?php echo $this->Html->url(array('action'=>'add'))?>">添加</a></h2>
    <div class="page"></div>
    <table class="tab">
        <thead>
            <tr>
                <td class="title">板块名称</td>
                <td class="operate">操作</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($sblocks as $sblock):?>
            <tr data="<?php echo $sblock['Sblock']['id']?>">
                <td title="拖动排序" class="title"><?php echo h($sblock['Sblock']['title_cn'])?> | <?php echo h($sblock['Sblock']['title_en'])?></td>
                <td class="operate">
                    <?php if($sblock['Sblock']['is_editable']):?>
                    <a href="<?php echo $this->Html->url(array('action'=>'edit', $sblock['Sblock']['id']))?>">编辑</a>
                    <?php endif;?>
                    <?php if($sblock['Sblock']['is_deletable']):?> 
                    <a href="<?php echo $this->Html->url(array('action'=>'delete', $sblock['Sblock']['id']))?>" class="delete">删除</a>
                    <?php endif;?>
                    <?php if($sblock['Sblock']['is_show']):?> 
                    <a href="<?php echo $this->Html->url(array('action'=>'hide', $sblock['Sblock']['id']))?>" class="hide">隐藏</a>
                    <?php else:?>
                    <a href="<?php echo $this->Html->url(array('action'=>'show', $sblock['Sblock']['id']))?>" class="show">显示</a>
                    <?php endif;?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<?php echo $this->Html->script('admin/sblock/index')?>