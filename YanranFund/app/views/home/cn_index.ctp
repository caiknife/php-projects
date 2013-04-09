<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>嫣然天使儿童基金</title>
<?php echo $this->Html->meta(array('name'=>'robots', 'content'=>'noindex, nofollow'))?>
<?php echo $this->Html->css('frontend/style_cn', 'stylesheet', array('media'=>'screen'));?>
<?php echo $this->Html->script(array('jquery-1.7.2.min', 'jquery-ui-1.8.19.custom.min', 'frontend/home/index'));?>
</head>
<body>
<div id="wrap">
    <div id="menu">
        <?php echo $this->element($lang.'_menu')?>
    </div>
    <div id="topBar">
        <?php echo $this->element($lang.'_topbar')?>
    </div>
    <div id="content">
        <div class="indexCooperation">
        <!-- 
            <h3>合作伙伴</h3>
            <ul>
                <li><img src="/images/cooperation/01.png" /></li>
                <li><img src="/images/cooperation/02.png" /></li>
                <li><img src="/images/cooperation/03.png" /></li>
                <li><img src="/images/cooperation/04.png" /></li>
                <li><img src="/images/cooperation/05.png" /></li>
                <li><img src="/images/cooperation/06.png" /></li>
                <li><img src="/images/cooperation/07.png" /></li>
                <li><img src="/images/cooperation/08.png" /></li>
                <li><img src="/images/cooperation/09.png" /></li>
            </ul>
         -->
        </div>
        <div class="indexFooter">
            <?php echo $this->element($lang.'_footer')?>
        </div>
    </div>
    <div class="bgBigPhotoList">
        <i class="l"></i><i class="r"></i>
        <div class="wrap">
            <img src="/images/bigPhoto_01.jpg" width="1360" height="777" />
            <img src="/images/bigPhoto_02.jpg" width="1360" height="777" class="disn" />
            <img src="/images/bigPhoto_03.jpg" width="1360" height="777" class="disn" />
        </div>
    </div>
</div>
</body>
</html>
