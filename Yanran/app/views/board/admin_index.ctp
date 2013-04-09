<div id="content">
    <h2>各板块KV</h2>
    <?php echo $this->Form->create('Board', array('type'=>'file', 'url'=>array('controller'=>'board', 'action'=>'add', 'admin'=>true)))?>
    <div class="page"></div>
    <div class="kvList">
        <ul>
            <?php foreach($boards as $board):?>
            <li data="<?php echo $board['Board']['id']?>">
                <img src="<?php echo $this->Format->getBoard($board['Board'])?>" />
                <strong class="title"><?php echo h($board['Board']['title'])?></strong>
                <a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true,$board['Board']['id']))?>" class="edit">编辑</a>
            </li>
            <?php endforeach;?>
        </ul>
    </div>
    <?php echo $this->Form->end()?>
</div>
<?php echo $this->Html->script('admin/board/index')?>