<div id="content">
    <div class="mainPoster"><img src="<?php echo $this->Format->getBoard($board['Board'])?>" /><span class="tInformation"></span></div>
    <div class="main newsPage">
        <h2 class="newsTitle"><?php echo h($info['Info']['title'])?></h2>
        <span class="newsInfo"><?php echo $this->Format->toDate($info['Info']['news_date'], 'Y年m月d日')?> | <?php echo h($info['Info']['source'])?></span>
        <div id="Cms">
            <?php echo $info['Info']['content']?>
        </div>
        <!-- Baidu Button BEGIN -->
        <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
            <span class="bds_more">分享到：</span>
            <a class="bds_qzone"></a>
            <a class="bds_tsina"></a>
            <a class="bds_tqq"></a>
            <a class="bds_renren"></a>
            <a class="shareCount"></a>
        </div>
        <script type="text/javascript" id="bdshare_js" data="type=tools" ></script>
        <script type="text/javascript" id="bdshell_js"></script>
        <script type="text/javascript">
            document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
        </script>
        <!-- Baidu Button END -->
    </div>
    <div class="sidebar">
        <ul class="sideNav">
            <li class="curr"><a href="<?php echo $this->Html->url(array($lang=>true))?>">HEALTH</a></li>
        </ul>
        <div class="qLink"></div>
    </div>
</div>