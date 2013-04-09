<tr>
    <td class="title"><?php echo h($review['year'])?>年/<?php echo h($review['month'])?>月 前属于</td>
    <td><?php echo h($review['title'])?></td>
    <td class="operate">
        <a href="<?php echo $this->Html->url(array('action'=>'editreview', 'admin'=>true, $review['id']))?>" class="edit">编辑</a> 
        <a href="<?php echo $this->Html->url(array('action'=>'deletereview', 'admin'=>true, $review['id']))?>" class="delete">删除</a>
    </td>
</tr>