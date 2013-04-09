<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>北京嫣然天使儿童医院</title>
<?php echo $this->Html->css('frontend/style_'.$lang, 'stylesheet', array('media'=>'screen'));?>
<?php echo $this->Html->script(array('jquery-1.7.2.min', 'jquery-ui-1.8.19.custom.min', 'jquery.tooltip.pack', 'jquery.fancybox_packed', 'common'));?>
<?php echo $scripts_for_layout?>
<script type="text/javascript">
    $(document).ready(function() {
        $('a[href=#none]').fancybox();
    });
</script>
</head>
<body>
<div id="warp">
    <div id="header">
        <h1 class="logo"><a href="/">北京嫣然天使儿童医院</a></h1>
        <div class="language"><a class="cn" href="/cn">中文</a><a class="en" href="/en">English</a></div>
        <div class="menu">
            <ul>
                <li class="c1">
                    <a <?php if($this->name=='About'):?>class="curr"<?php endif;?> href="<?php echo $this->Html->url(array('controller'=>'about', 'action'=>'index', $lang=>true))?>">关于我们</a>
                    <dl class="sub-meun">
                        <dt><span class="title">关于我们</span></dt>
                        <?php foreach($aboutLists as $key=>$val):?>
                        <dd><a href="<?php echo $this->Html->url(array('controller'=>'about', 'action'=>'view', $lang=>true, $key))?>"><?php echo h($val)?></a></dd>
                        <?php endforeach;?>                        
                    </dl>
                </li>
                <li class="c2">
                    <a <?php if($this->name=='News'):?>class="curr"<?php endif;?> href="<?php echo $this->Html->url(array('controller'=>'news', 'action'=>'index', $lang=>true))?>">最新新闻</a>
                    <dl class="sub-meun">
                        <dt><span class="title">最新新闻</span></dt>
                        <?php foreach($newsTypes as $key=>$val):?>
                        <dd><a href="<?php echo $this->Html->url(array('controller'=>'news', 'action'=>'index', $lang=>true, 'type'=>$key))?>"><?php echo h($val)?></a></dd>
                        <?php endforeach;?>
                    </dl>
                </li>
                <li class="c3">
                    <a <?php if($this->name=='Service'):?>class="curr"<?php endif;?> href="<?php echo $this->Html->url(array('controller'=>'service', 'action'=>'index', $lang=>true))?>">服务项目</a>
                    <dl class="sub-meun">
                        <dt><a class="title" href="<?php echo $this->Html->url(array('controller'=>'service', 'action'=>'index', $lang=>true))?>">服务项目</a></dt>
                    </dl>
                </li>
                <li class="c4">
                    <a <?php if($this->name=='Center'):?>class="curr"<?php endif;?> href="<?php echo $this->Html->url(array('controller'=>'center', 'action'=>'index', $lang=>true))?>">颅颜中心</a>
                    <dl class="sub-meun">
                        <dt><span class="title">颅颜中心</span></dt>
                        <?php foreach($centerLists as $key=>$val):?>
                        <dd><a href="<?php echo $this->Html->url(array('controller'=>'center', 'action'=>'view', $lang=>true, $key))?>"><?php echo h($val)?></a></dd>
                        <?php endforeach;?>   
                    </dl>
                </li>
                <li class="c5">
                    <a <?php if($this->name=='Team'):?>class="curr"<?php endif;?> href="<?php echo $this->Html->url(array('controller'=>'team', 'action'=>'index', $lang=>true))?>">医疗团队</a>
                    <dl class="sub-meun">
                        <dt><a class="title" href="<?php echo $this->Html->url(array('controller'=>'team', 'action'=>'index', $lang=>true))?>">医疗团队</a></dt>
                    </dl>
                </li>
                <li class="c6">
                    <a <?php if($this->name=='Equip'):?>class="curr"<?php endif;?> href="<?php echo $this->Html->url(array('controller'=>'equip', 'action'=>'index', $lang=>true))?>">环境设施</a>
                    <dl class="sub-meun">
                        <dt><span class="title">环境设施</span></dt>
                        <?php foreach($equipTypes as $key=>$val):?>
                        <dd><a href="<?php echo $this->Html->url(array('controller'=>'equip', 'action'=>'index', $lang=>true, 'type'=>$key))?>"><?php echo h($val)?></a></dd>
                        <?php endforeach;?>
                    </dl>
                </li>
                <li class="c7">
                    <a <?php if($this->name=='Reservation'):?>class="curr"<?php endif;?> href="<?php echo $this->Html->url(array('controller'=>'reservation', 'action'=>'index', $lang=>true))?>">在线预约</a>
                    <dl class="sub-meun">
                        <dt><a class="title" href="<?php echo $this->Html->url(array('controller'=>'reservation', 'action'=>'index', $lang=>true))?>">在线预约</a></dt>
                    </dl>
                </li>
                <li class="c8">
                    <a <?php if($this->name=='Article' && $this->action==$lang.'_view' && $type=='recruiting'):?>class="curr"<?php endif;?> href="<?php echo $this->Html->url(array('controller'=>'article', 'action'=>'view', $lang=>true, 'recruiting'))?>">招贤纳才</a>
                    <dl class="sub-meun">
                        <dt><a class="title" href="<?php echo $this->Html->url(array('controller'=>'article', 'action'=>'view', $lang=>true, 'recruiting'))?>">招贤纳才</a></dt>
                    </dl>
                </li>
                <li class="c9">
                    <a <?php if($this->name=='Info'):?>class="curr"<?php endif;?> href="<?php echo $this->Html->url(array('controller'=>'info', 'action'=>'index', $lang=>true))?>">健康资讯</a>
                    <dl class="sub-meun">
                        <dt><a class="title" href="<?php echo $this->Html->url(array('controller'=>'info', 'action'=>'index', $lang=>true))?>">健康资讯</a></dt>
                    </dl>
                </li>
                <li class="c10">
                    <a <?php if($this->name=='Article' && $this->action==$lang.'_view' && $type=='insurance'):?>class="curr"<?php endif;?> href="<?php echo $this->Html->url(array('controller'=>'article', 'action'=>'view', $lang=>true, 'insurance'))?>">保险与付款</a>
                    <dl class="sub-meun">
                        <dt><a class="title" href="<?php echo $this->Html->url(array('controller'=>'article', 'action'=>'view', $lang=>true, 'insurance'))?>">保险与付款</a></dt>
                    </dl>
                </li>
                <li class="c11">
                    <a <?php if($this->name=='Article' && $this->action==$lang.'_view' && $type=='contact'):?>class="curr"<?php endif;?> href="<?php echo $this->Html->url(array('controller'=>'article', 'action'=>'view', $lang=>true, 'contact'))?>">联系我们</a>
                    <dl class="sub-meun">
                        <dt><a class="title" href="<?php echo $this->Html->url(array('controller'=>'article', 'action'=>'view', $lang=>true, 'contact'))?>">联系我们</a></dt>
                    </dl>
                </li>
            </ul>
        </div>
    </div>
    <?php echo $content_for_layout;?>
    <div id="footer">
        <div class="footerWarp">
            <div class="follow">
                <span>Follow us:</span>
                <a class="weiboQQ" href="#"></a>
                <a class="weiboSINA" href="#"></a>
            </div>
        </div>
    </div>
</div>
<div style="display:none">
    <div id="none">
        <h3><span>正在建设中...</span>敬请期待!</h3>
    </div>
</div>
<?php echo $this->element('sql_dump'); ?>
</body>
</html>
