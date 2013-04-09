<div id="containerHolder">
    <div id="container">
        <div id="sidebar">
            <ul class="sideNav">
                <li><a href="<?php echo $this->Html->url(array('action'=>'index', 'admin'=>true))?>">首页海报 </a></li>
                <li><a class="active" href="<?php echo $this->Html->url(array('action'=>'brands', 'admin'=>true))?>">潮流品牌</a></li>
                <li><a href="<?php echo $this->Html->url(array('action'=>'calendar', 'admin'=>true))?>">活动日历</a></li>
            </ul>
            <!-- // .sideNav -->
        </div>    
        <!-- // #sidebar -->
        <div id="main">
            <form action="" class="jNice" name="search">
                <fieldset>
                    <dl class="search">
                        <dd>
                            <label>商铺名称：</label>
                            <?php echo $this->Form->text('title', array('class'=>'text-medium'))?>
                        </dd>
                        <dd>
                            <label>楼层编号：</label>
                            <?php echo $this->Form->text('guide_id', array('class'=>'text-small'))?>
                        </dd>
                        <dd class="submti"><button type="button" name="search"><span><span>搜 索</span></span></button></dd>
						<dd class="add"><button type="button" name="add"><span><span>加入首页推荐</span></span></button></dd>
                    </dl>
                </fieldset>
                <h3>搜索结果</h3>
				<ul class="brand_list" id="result"></ul>
				<br clear="all" />
				<h3>已添加品牌</h3>
                <ul class="brandSwitch">
                	<li class="curr"><a href="#" name="0">全部</a></li>
                	<?php foreach($categories as $i => $cate):?>
                    <li><a href="#" name="<?php echo $i?>"><?php echo $cate?></a></li>
                	<?php endforeach;?>
                </ul>
                <ul class="brand_list" id="featured">
                	<?php echo $this->element('top/admin_featuredbrands')?>
                </ul>
            </form>
        </div>
        <!-- // #main -->
        <div class="clear"></div>
    </div>
    <!-- // #container -->
</div>  
<!-- // #containerHolder -->
<?php echo $this->Html->script('admin/top/brands', false)?>