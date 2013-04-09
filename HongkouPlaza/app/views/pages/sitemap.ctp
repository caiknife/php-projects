<div id="content">
    <div id="main">
        <!--[if IE 6]>
        <script type="text/javascript">DD_belatedPNG.fix('#main h2')</script>
        <![endif]-->
        <h2 class="tSiteMap">网站地图</h2>
        <ul class="sietMap">
            <!-- 动态菜单，其他固定 OPEN -->
            <li>
                <dl>
                    <dt>品牌介绍</dt>
                    <dd><a href="<?php echo $this->Html->url(array('controller'=>'brands', 'action'=>'all'))?>">全部</a></dd>
                    <?php foreach($categories as $key=>$val):?>
                    <dd><a href="<?php echo $this->Html->url(array('controller'=>'brands', 'action'=>'lists', 'cate'=>$key))?>"><?php echo h($val)?></a></dd>
                    <?php endforeach;?>
                </dl>
            </li>
            <li>
                <dl>
                    <dt>最新活动</dt>
                    <dd><a href="<?php echo $this->Html->url(array('controller'=>'events', 'action'=>'index'))?>">全部</a></dd>
                    <dd><a href="<?php echo $this->Html->url(array('controller'=>'events', 'action'=>'lists', 'cate'=>1))?>">促销</a></dd>
                    <dd><a href="<?php echo $this->Html->url(array('controller'=>'events', 'action'=>'lists', 'cate'=>2))?>">活动</a></dd>
                    <dd><a href="<?php echo $this->Html->url(array('controller'=>'events', 'action'=>'now'))?>">NOW GALLERY</a></dd>
                    <dd><a href="<?php echo $this->Html->url(array('controller'=>'events', 'action'=>'review'))?>">回顾</a></dd>
                </dl>
            </li>
            <li>
                <dl>
                    <dt>新闻中心</dt>
                    <dd><a href="<?php echo $this->Html->url(array('controller'=>'news', 'action'=>'index'))?>">全部</a></dd>
                    <?php $range = range(date('Y'), 2009)?>
                    <?php foreach($range as $item):?>		            
                    <dd><a href="<?php echo $this->Html->url(array('controller'=>'news', 'action'=>'lists', 'year'=>$item))?>"><?php echo h($item)?></a></dd>
                    <?php endforeach;?>
                    <dd class="splitLine"></dd>
                    <?php $cate = Configure::read('News.cate')?>
                    <?php foreach($cate as $i=>$item):?>
                    <dd><a href="<?php echo $this->Html->url(array('controller'=>'news', 'action'=>'lists', 'cat'=>$i))?>"><?php echo h($item)?></a></dd>
                    <?php endforeach;?>
                </dl>
            </li>
            <!-- 动态菜单，其他固定 END -->
            <li>
                <dl>
                    <dt>关于我们</dt>
                    <dd><a href="<?php echo $this->Html->url(array('controller'=>'pages', 'action'=>'reach'))?>">如何到达</a></dd>
                    <dd><a href="<?php echo $this->Html->url(array('controller'=>'pages', 'action'=>'office'))?>">办公楼宇</a></dd>
                    <dd><a href="<?php echo $this->Html->url(array('controller'=>'pages', 'action'=>'about'))?>">关于凯德龙之梦</a></dd>
                    <dd><a href="<?php echo $this->Html->url(array('controller'=>'pages', 'action'=>'contact'))?>">联系我们</a></dd>
                </dl>
            </li>
            <li>
                <dl>
                    <dt>相关帮助</dt>
                    <?php foreach($blockList as $key=>$val):?>
                    <dd><a href="<?php echo $this->Html->url(array('controller'=>'pages', 'action'=>'view', $key))?>"><?php echo h($val)?></a></dd>
                    <?php endforeach;?>                    
                </dl>
            </li>
            <li>
                <dl>
                    <dt>辅助导航</dt>
                    <dd><a href="<?php echo $this->Html->url(array('controller'=>'login', 'action'=>'signup'))?>">会员注册</a></dd>
                    <dd><a href="<?php echo $this->Html->url(array('controller'=>'search', 'action'=>'index'))?>">高级搜索</a></dd>
                    <dd><a class="map" href="<?php echo $this->Html->url(array('controller'=>'pages', 'action'=>'map'))?>">楼层向导</a></dd>
                    <dd><a class="popup" href="<?php echo $this->Html->url(array('controller'=>'footer', 'action'=>'view', 'movie'))?>">影院订票</a></dd>
                    <dd><a class="popup" href="<?php echo $this->Html->url(array('controller'=>'footer', 'action'=>'view', 'park'))?>">停车信息</a></dd>
                </dl>
            </li>
        </ul>
        <br clear="all" />
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(".map").colorbox({iframe:true, width:'925', height:'580'});
        $('.popup').colorbox({iframe:true, width:'860', height:'690'});
    });
</script>