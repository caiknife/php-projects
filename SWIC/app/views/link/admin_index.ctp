<div id="content">
    <h2>网站底部链接管理 <span>(可拖动列表排序)</span><a href="<?php echo $this->Html->url(array('action'=>'add', 'admin'=>true))?>">添加</a></h2>
    <div class="page"></div>
    <!-- 删除类型之前需要确认此类型下是否有产品，若类型下有产品则无法删除，需要弹出JS框提示 -->
    <table class="tab typeList">
        <thead>
            <tr>
                <td class="title">页面名称</td>
                <td class="operate">操作</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($links as $link):?>
            <tr data="<?php echo $link['Link']['id']?>">
                <td title="拖动排序" class="title"><?php echo h($link['Link']['title'])?></td>
                <td class="operate">
                    <?php if($link['Link']['is_editable']):?>
                    <a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $link['Link']['id']))?>">编辑</a>
                    <?php endif;?>
                    <?php if($link['Link']['is_deletable']):?> 
                    <a href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $link['Link']['id']))?>" class="delete">删除</a>
                    <?php endif;?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<?php echo $this->Html->script('admin/link/index', false)?>