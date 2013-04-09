<div id="content">
    <h2>新闻分类管理 <span>(可拖动列表排序)</span></h2>
    <?php echo $this->Form->create('NewsType', array('type'=>'file', 'url'=>array('controller'=>'newstype', 'action'=>'add', 'admin'=>true)))?>
    <div class="page"></div>
    <!-- 删除类型之前需要确认此类型下是否有产品，若类型下有产品则无法删除，需要弹出JS框提示 -->
    <table class="tab productTypeList">
        <thead>
            <tr>
                <td class="title">新闻类别名称</td>
                <td class="operate">操作</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($types as $type):?>
            <tr data="<?php echo $type['NewsType']['id']?>">
                <td title="拖动排序" class="title"><?php echo h($type['NewsType']['title_cn'])?> <?php echo h($type['NewsType']['title_en'])?></td>
                <td class="operate">
                    <a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $type['NewsType']['id']))?>" class="edit">编辑</a> 
                    <a data="<?php echo $this->Html->url(array('action'=>'count', 'admin'=>true, $type['NewsType']['id']))?>" href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $type['NewsType']['id']))?>" class="delete">删除</a>
                </td>
            </tr>
            <?php endforeach;?>
            <tr>
                <td class="title">
                    <?php echo $this->Form->text('title_cn', array('title'=>'分类 中文'))?>
                    <?php echo $this->Form->text('title_en', array('title'=>'分类 英文'))?>
                </td>
                <td class="operate">
                    <a href="#" class="add"><strong>添加</strong></a>
                </td>
            </tr>
        </tbody>
    </table>
    <?php echo $this->Form->end()?>
</div>
<?php echo $this->Html->script('admin/newstype/index')?>