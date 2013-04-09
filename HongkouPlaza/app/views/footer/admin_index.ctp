<div id="containerHolder">
    <div id="container">
        <div id="sidebar">
            <ul class="sideNav">
                <?php echo $this->element('footer/admin_menu')?>
            </ul>
            <!-- // .sideNav -->
        </div> 
        <!-- // #sidebar -->
         <div id="main">
            <form action="" class="jNice">
                <fieldset>
                    <div class="add"><button type="button" onclick="window.location='<?php echo $this->Form->url(array('action'=>'new', 'admin'=>true))?>';"><span><span>添加一个品牌</span></span></button></div>
                </fieldset>
            </form>
            <ul class="news_list help_list">
                <?php foreach($blocks as $block):?>
                <li data="<?php echo $block['Block']['id']?>">
                    <h3><?php echo h($block['Block']['title'])?></h3>
                    <a class="edit" title="编辑" href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $block['Block']['id']))?>">编辑</a>
                    <a class="delete" title="删除" href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $block['Block']['id']))?>">删除</a>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
        <!-- // #main -->
        <div class="clear"></div>
    </div>
    <!-- // #container -->
</div>  
<!-- // #containerHolder -->
<?php echo $this->Html->script('admin/footer/index')?>