<div id="content">
    <h2>关于我们  <span>(可拖动列表排序)</span><a href="<?php echo $this->Html->url(array('action'=>'add'))?>">添加</a></h2>
    <div class="page"></div>
    <table class="tab">
        <thead>
            <tr>
                <td class="title">板块名称</td>
                <td class="operate">操作</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($ablocks as $ablock):?>
            <tr data="<?php echo $ablock['Ablock']['id']?>">
                <td title="拖动排序" class="title"><?php echo h($ablock['Ablock']['title_cn'])?> | <?php echo h($ablock['Ablock']['title_en'])?></td>
                <td class="operate">
                    <?php if($ablock['Ablock']['is_editable']):?>
                    <a href="<?php echo $this->Html->url(array('action'=>'edit', $ablock['Ablock']['id']))?>">编辑</a>
                    <?php endif;?>
                    <?php if($ablock['Ablock']['is_deletable']):?> 
                    <a href="<?php echo $this->Html->url(array('action'=>'delete', $ablock['Ablock']['id']))?>" class="delete">删除</a>
                    <?php endif;?>
                    <?php if($ablock['Ablock']['is_show']):?> 
                    <a href="<?php echo $this->Html->url(array('action'=>'hide', $ablock['Ablock']['id']))?>" class="hide">隐藏</a>
                    <?php else:?>
                    <a href="<?php echo $this->Html->url(array('action'=>'show', $ablock['Ablock']['id']))?>" class="show">显示</a>
                    <?php endif;?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<?php echo $this->Html->script('admin/ablock/index')?>