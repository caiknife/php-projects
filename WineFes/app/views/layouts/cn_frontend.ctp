<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>2012第八届上海酒节 - SHANGHAI WINE FESTIVAL SPIRITS | 2012/09/18-23</title>
<?php echo $this->Html->css('frontend/style_cn', 'stylesheet', array('media'=>'screen'));?>
<?php echo $this->Html->script(array('jquery-1.7.2.min', 'jquery-ui-1.8.19.custom.min', 'jquery.tooltip.pack', 'frontend/frontend'));?>
<?php echo $scripts_for_layout?>
</head>
<body>
    <div id="warp">
        <div id="header">
            <h1 class="logo"><a href="/">2012第八届上海酒节 - SHANGHAI WINE FESTIVAL SPIRITS | 2012/09/18-23</a></h1>
            <?php if($this->name=='Home' && $this->action=='cn_index'):?>
            <?php echo $this->element('home/cn_index')?>
            <?php endif;?>
            <div class="menu">
                <ul>
                    <li class="home <?php if($this->name=='Home'):?>curr<?php endif;?>"><a href="/">首页</a></li>
                    <li <?php if($this->name=='Overview'):?>class="curr"<?php endif;?>><a href="<?php echo $this->Html->url(array('controller'=>'overview', 'action'=>'index', 'cn'=>true))?>">酒节概述</a>
                        <!-- 默认sub-up 浏览器拉动条拉下300像素后变为sub-down，二级菜单始终可见-->
                        <div name="overview" class="sub-meun <?php if($this->name=='Home' && $this->action=='cn_index'):?>sub-up<?php else:?>sub-down<?php endif;?>">
                            <?php foreach($blocks as $key=>$val):?>
                            <a href="<?php echo $this->Html->url(array('controller'=>'overview', 'action'=>'view', 'cn'=>true, $key))?>"><?php echo h($val)?></a>
                            <?php endforeach;?>
                            <!-- 菜单名称动态增加 -->
                            <i></i>
                        </div>
                    </li>
                    <li <?php if($this->name=='News'):?>class="curr"<?php endif;?>><a href="<?php echo $this->Html->url(array('controller'=>'news', 'action'=>'index', 'cn'=>true))?>">酒节新闻</a>
                        <div name="overview" class="sub-meun <?php if($this->name=='Home' && $this->action=='cn_index'):?>sub-up<?php else:?>sub-down<?php endif;?>">
                            <a href="<?php echo $this->Html->url(array('controller'=>'news', 'action'=>'latest', 'cn'=>true))?>">最新新闻</a>
                            <?php foreach(Configure::read('News.type') as $key=>$val):?>
                            <a href="<?php echo $this->Html->url(array('controller'=>'news', 'action'=>'lists', 'cn'=>true, 'type'=>$key))?>"><?php echo h($val)?></a>
                            <?php endforeach;?>                            
                            <i></i>
                        </div>
                    </li>
                    <li <?php if($this->name=='Review'):?>class="curr"<?php endif;?>><a href="<?php echo $this->Html->url(array('controller'=>'review', 'action'=>'index', 'cn'=>true))?>">历届回顾</a>
                        <div name="overview" class="sub-meun <?php if($this->name=='Home' && $this->action=='cn_index'):?>sub-up<?php else:?>sub-down<?php endif;?>">
                            <a href="<?php echo $this->Html->url(array('controller'=>'review', 'action'=>'news', 'cn'=>true))?>">新闻回顾</a>
                            <a href="<?php echo $this->Html->url(array('controller'=>'review', 'action'=>'activity', 'cn'=>true))?>">活动回顾</a>
                            <i></i>
                        </div>
                    </li>
                    <li <?php if($this->name=='Activity'):?>class="curr"<?php endif;?>><a href="<?php echo $this->Html->url(array('controller'=>'activity', 'action'=>'index', 'cn'=>true))?>">活动&会议</a></li>
                    <li <?php if($this->name=='Service'):?>class="curr"<?php endif;?>><a href="<?php echo $this->Html->url(array('controller'=>'service', 'action'=>'index', 'cn'=>true))?>">酒节服务</a>
                        <div name="overview" class="sub-meun <?php if($this->name=='Home' && $this->action=='cn_index'):?>sub-up<?php else:?>sub-down<?php endif;?>">
                            <?php foreach($articles as $key=>$val):?>
                            <a href="<?php echo $this->Html->url(array('controller'=>'service', 'action'=>'view', 'cn'=>true, $key))?>"><?php echo h($val)?></a>
                            <?php endforeach;?>
                            <i></i>
                        </div>
                    </li>
                    <li <?php if($this->name=='Contactus'):?>class="curr"<?php endif;?>><a href="<?php echo $this->Html->url(array('controller'=>'contactus', 'action'=>'index', 'cn'=>true))?>">联系我们</a></li>
                </ul>
                <div class="countdown">
                  <?php if($countFlg):?>                  
                                    距离开幕还有<strong><?php echo $diff?></strong>天
                  <?php else:?>
                                    隆重开幕
                  <?php endif;?>
                </div>
            </div>
        </div>
        <?php echo $content_for_layout?>
        <div id="footer">
            <div class="exhibitorsList">
                <strong>参展商</strong>
                <div id="exhibitorsLogo">
                    <div class="bx_wrap">
                        <div class="bx_container">
                            <ul id="demo1">
                                <?php foreach($exhibitors as $exhibitor):?>
                                <li><img alt="<?php echo h($exhibitor['Exhibitor']['title'])?>" title="<?php echo h($exhibitor['Exhibitor']['title'])?>" src="<?php echo $this->Format->getExhibitor($exhibitor['Exhibitor'])?>"></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php echo $this->Html->script('jquery.bxCarousel')?>
                <script type="text/javascript">
                    $(function(){
                        $('#demo1').bxCarousel({display_num:8, move:1, auto:true, controls:false,margin:0, auto_hover:true});
                    });
                </script>
                <a class="toTop" href="#warp">返回顶部</a>
            </div>
            <small>Copyright &copy; 2012 8th Shanghai Wine &amp; Spirits Festival 2012</small>
            <ul class="footerMenu">
                <li><a href="<?php echo $this->Html->url(array('controller'=>'contactus', 'action'=>'index', 'cn'=>true))?>">联系我们</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller'=>'home', 'action'=>'index', 'cn'=>true))?>">简体中文</a></li>
                <li><a href="#en-us">English</a></li>
            </ul>
        </div>
    </div>
    <?php echo $this->element('sql_dump'); ?>
</body>
</html>
