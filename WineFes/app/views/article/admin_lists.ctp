<div id="content">
    <h2>酒节服务 <span>(可拖动列表排序)</span><a href="<?php echo $this->Html->url(array('action'=>'add', 'admin'=>true))?>">添加</a></h2>
    <div class="page"></div>
    <table class="tab regionList">
        <thead>
            <tr>
                <td class="title">板块名称</td>
                <td class="operate">操作</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($articles as $article):?>
            <tr data="<?php echo $article['Article']['id']?>">
                <td title="拖动排序" class="title">
                    <a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $article['Article']['id']))?>"><?php echo h($article['Article']['title'])?></a>
                </td>
                <td class="operate">
                    <a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $article['Article']['id']))?>">编辑</a>
                    <?php if($article['Article']['is_deletable']):?> 
                    <a href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $article['Article']['id']))?>" class="delete">删除</a>
                    <?php endif;?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<?php echo $this->Html->script('admin/article/lists', false)?>