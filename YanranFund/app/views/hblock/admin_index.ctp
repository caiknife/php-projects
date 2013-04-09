<div id="content">
    <h2>申请救助  <span>(可拖动列表排序)</span><a href="<?php echo $this->Html->url(array('action'=>'add'))?>">添加</a></h2>
    <div class="page"></div>
    <table class="tab">
        <thead>
            <tr>
                <td class="title">板块名称</td>
                <td class="operate">操作</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($hblocks as $hblock):?>
            <tr data="<?php echo $hblock['Hblock']['id']?>">
                <td title="拖动排序" class="title"><?php echo h($hblock['Hblock']['title_cn'])?> | <?php echo h($hblock['Hblock']['title_en'])?></td>
                <td class="operate">
                    <?php if($hblock['Hblock']['is_editable']):?>
                    <a href="<?php echo $this->Html->url(array('action'=>'edit', $hblock['Hblock']['id']))?>">编辑</a>
                    <?php endif;?>
                    <?php if($hblock['Hblock']['is_deletable']):?> 
                    <a href="<?php echo $this->Html->url(array('action'=>'delete', $hblock['Hblock']['id']))?>" class="delete">删除</a>
                    <?php endif;?>
                    <?php if($hblock['Hblock']['is_show']):?> 
                    <a href="<?php echo $this->Html->url(array('action'=>'hide', $hblock['Hblock']['id']))?>" class="hide">隐藏</a>
                    <?php else:?>
                    <a href="<?php echo $this->Html->url(array('action'=>'show', $hblock['Hblock']['id']))?>" class="show">显示</a>
                    <?php endif;?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<?php echo $this->Html->script('admin/hblock/index')?>