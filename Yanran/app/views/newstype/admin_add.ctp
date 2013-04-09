<tr data="<?php echo $type['NewsType']['id']?>">
    <td title="拖动排序" class="title"><?php echo h($type['NewsType']['title_cn'])?> <?php echo h($type['NewsType']['title_en'])?></td>
    <td class="operate">
        <a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $type['NewsType']['id']))?>" class="edit">编辑</a> 
        <a href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $type['NewsType']['id']))?>" class="delete">删除</a>
    </td>
</tr>