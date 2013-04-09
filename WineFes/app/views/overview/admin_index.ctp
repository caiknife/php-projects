<div id="content">
    <h2>酒节概述 <span>(可拖动列表排序)</span><a href="<?php echo $this->Html->url(array('action'=>'add', 'admin'=>true))?>">添加</a></h2>
    <div class="page"></div>
    <table class="tab regionList">
        <thead>
            <tr>
                <td class="title">板块名称</td>
                <td class="operate">操作</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($blocks as $block):?>
            <tr data="<?php echo $block['Block']['id']?>">
                <td title="拖动排序" class="title">
                    <a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>'true', $block['Block']['id']))?>"><?php echo h($block['Block']['title'])?></a>
                </td>
                <td class="operate">
                    <a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>'true', $block['Block']['id']))?>">编辑</a>
                    <?php if($block['Block']['is_deletable']):?> 
                    <a href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>'true', $block['Block']['id']))?>" class="delete">删除</a>
                    <?php endif;?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<?php echo $this->Html->script('admin/overview/index', false)?>