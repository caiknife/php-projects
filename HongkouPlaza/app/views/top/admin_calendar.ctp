<div id="containerHolder">
    <div id="container">
        <div id="sidebar">
            <ul class="sideNav">
                <li><a href="<?php echo $this->Html->url(array('action'=>'index', 'admin'=>true))?>">首页海报 </a></li>
                <li><a href="<?php echo $this->Html->url(array('action'=>'brands', 'admin'=>true))?>">潮流品牌</a></li>
                <li><a class="active" href="<?php echo $this->Html->url(array('action'=>'calendar', 'admin'=>true))?>">活动日历</a></li>
            </ul>
            <!-- // .sideNav -->
        </div>    
        <!-- // #sidebar -->
        <!-- h2 stays for breadcrumbs -->
        <div id="main">
            <form action="" class="jNice">
                <fieldset>拖动修改首页活动日历展示排序</fieldset>
            <ul class="index_calendar_list">
                <?php foreach($home_events as $event):?>
                <li class="item" id="<?php echo $event['HomeEvent']['id']?>">
                    <?php echo $this->Html->image('/attachments/photos/origin/'.$event['HomeEvent']['image'], array('alt'=>h($event['HomeEvent']['description'])))?>
                    <a title="编辑" class="edit" href="<?php echo $this->Form->url(array('action'=>'editevent', 'admin'=>true, $event['HomeEvent']['id']))?>">编辑</a>
                    <a title="删除" class="delete" href="<?php echo $this->Html->url(array('action'=>'deleteevent', 'admin'=>true, $event['HomeEvent']['id']))?>">删除</a>
                </li>
                <?php endforeach;?>
                <li <?php if( sizeof($home_events) >= Configure::read('HomeEvent.max') ):?>class="disn"<?php endif;?>><a class="add" href="<?php echo $this->Html->url(array('action'=>'newevent', 'admin'=>true))?>">添加图片</a></li>
            </ul>
            <!-- IE6 7浏览器 JS 需改变LI class,鼠标移动至LI class="hover",点击未释放li class="active"-->
            </form>
        </div>
        <!-- // #main -->
        <div class="clear"></div>
    </div>
    <!-- // #container -->
</div>  
<!-- // #containerHolder -->
<?php echo $this->Html->script('admin/top/calendar', false);?>
