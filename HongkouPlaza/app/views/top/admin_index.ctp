<div id="containerHolder">
    <div id="container">
        <div id="sidebar">
            <ul class="sideNav">
                <li><a class="active" href="<?php echo $this->Html->url(array('action'=>'index', 'admin'=>true))?>">首页海报 </a></li>
                <li><a href="<?php echo $this->Html->url(array('action'=>'brands', 'admin'=>true))?>">潮流品牌</a></li>
                <li><a href="<?php echo $this->Html->url(array('action'=>'calendar', 'admin'=>true))?>">活动日历</a></li>
            </ul>
            <!-- // .sideNav -->
        </div>    
        <!-- // #sidebar -->
        <!-- h2 stays for breadcrumbs -->
        <div id="main">
            <form action="" class="jNice">
                <fieldset>拖动修改首页图片展示排序（规则：从左至右依次在首页显示）</fieldset>
                <ul class="index_posters_list">
                    <?php foreach($home_banners as $banner):?>
                    <li class="item" id="<?php echo $banner['HomeBanner']['id']?>">
                        <?php echo $this->Html->image('/attachments/photos/origin/'.$banner['HomeBanner']['image'], array('alt'=>h($banner['HomeBanner']['description'])))?>
                        <a title="编辑" class="edit" href="<?php echo $this->Html->url(array('action'=>'editbanner', 'admin'=>true, $banner['HomeBanner']['id']))?>">编辑</a>
                        <a title="删除" class="delete" href="<?php echo $this->Html->url(array('action'=>'deletebanner', 'admin'=>true, $banner['HomeBanner']['id']))?>">删除</a>
                    </li>
                    <?php endforeach;?>
                    <li <?php if (sizeof($home_banners) >= Configure::read('HomeBanner.max')):?>class="disn"<?php endif;?>><a class="add" href="<?php echo $this->Html->url(array('action'=>'newbanner', 'admin'=>true))?>">添加图片</a></li>
                </ul>
                <!-- IE浏览器 JS 需改变LI class,鼠标移动至LI class="hover",点击未释放li class="active"-->
            </form>
        </div>
        <!-- // #main -->
        <div class="clear"></div>
    </div>
    <!-- // #container -->
</div>  
<?php echo $this->Html->script('admin/top/index', false);?>