<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>嫣然天使基金官方网站</title>
<?php echo $this->Html->css('frontend/style_cn', 'stylesheet', array('media'=>'screen'));?>
<?php echo $this->Html->script(array('jquery-1.7.2.min', 'jquery-ui-1.8.19.custom.min', 'frontend/global'));?>
<?php echo $scripts_for_layout?>
</head>
<?php $siteMenu = Configure::read('Site.menu')?>
<body class="BgColor_<?php echo $siteMenu[$this->name]?>" lang="<?php echo $lang?>">
<div id="wrap">
    <div id="menu">
        <?php echo $this->element($lang.'_menu')?>
    </div>
    <div id="topBar">
        <?php echo $this->element($lang.'_topbar')?>
    </div>
    <div id="content">
        <?php echo $content_for_layout?>
    </div>
    <div class="sidebar">
        <div class="sidebarTop"></div>
        <div class="sidebarBottom"></div>
        <div class="sidebarWrap">
            <div class="newPhoto">
                <?php if($photos):?>
                <h3>每日图片</h3>
                <ul>
                    <?php foreach($photos as $key=>$photo):?>
                    <li <?php if($key):?>class="disn"<?php endif;?>>
                        <a href="<?php echo $this->Html->url(array('controller'=>'info', 'action'=>'viewalbum', $photo['Photo']['album_id']))?>">
                            <img src="<?php echo $this->Format->getPhotoListImage($photo['Photo'])?>" />
                            <strong><?php echo $photo['Album']['title_'.$lang]?></strong><?php echo $photo['Photo']['title_'.$lang]?>
                        </a>
                    </li>
                    <?php endforeach;?>
                </ul>
                <div class="btn"><a class="leftBtn" href="#"></a><a class="rightBtn" href="#"></a></div>
                <?php endif;?>
            </div>
            <div class="news">
                <?php if($lastestNews):?>
                <h3>最新闻</h3>
                <ul>
                    <?php foreach($lastestNews as $item):?>
                    <li><a href="<?php echo $this->Html->url(array('controller'=>'info', 'action'=>'viewnews', $item['News']['id']))?>"><span><?php echo $this->Format->toDate($item['News']['public_date'], 'Y.m.d')?></span>·<?php echo h($item['News']['title'])?></a></li>
                    <?php endforeach;?>
                </ul>
                <div class="btn"><a class="bottomBtn" href="#"></a></div>
                <?php endif;?>
            </div>
            <!-- 
            <div class="statistics">
                <h3>捐赠统计</h3>
                <img src="/images/statistics.png"/>
                <a href="#">最近12个月的捐赠数量</a> 
            </div>
             -->
            <div class="weibo">
				<div class="switch">
                    <a href="#" class="tenxun" title="腾讯微博"><span class="curr">腾讯微博</span></a> 
                    <a href="#" class="sina" title="新浪微博"><span>新浪微博</span></a>
                </div>
				<div class="weiboWrap">
					<iframe id="tenxun" style="display:block" frameborder="0" scrolling="no" src="http://show.v.t.qq.com/index.php?c=show&a=index&n=yanrantianshijijin&w=190&h=378&fl=1&l=2&o=1&co=3" width="190" height="380"></iframe>
					<iframe id="sina" style="display:none" frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=190&height=380&fansRow=1&ptype=1&speed=0&skin=2&isTitle=0&noborder=0&isWeibo=1&isFans=0&uid=1776798945&verifier=c3e5c040&dpc=1" width="190" height="380"></iframe>
				</div>
			</div>
        </div>
    </div>
    <div id="footer">
        <?php echo $this->element($lang.'_footer')?>
    </div>
    <div class="bgBigPhotoList">
        <i class="l"></i><i class="r"></i>
        <div class="wrap">
            <img src="/images/bigPhoto_0<?php echo $this->Format->getRandom(2)?>.jpg" width="1360" height="777" />
        </div>
    </div>
</div>
<?php echo $this->element('sql_dump')?>
</body>
</html>
