<div id="content">
    <div class="mainPoster"><img src="<?php echo $this->Format->getBoard($board['Board'])?>" /><span class="tNews"></span></div>
    <div class="main newsPage">
        <h2 class="newsTitle"><?php echo h($news['News']['title'])?></h2>
        <span class="newsInfo"><?php echo $this->Format->toDate($news['News']['news_date'], 'Y年m月d日')?> | <?php echo h($news['News']['source'])?></span>
        <div id="Cms">
            <?php echo $news['News']['content']?>
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
            <?php foreach($newsTypes as $key=>$val):?>
            <li <?php if($key==$news['News']['type_id']):?>class="curr"<?php endif;?>><a href="<?php echo $this->Html->url(array('action'=>'index', $lang=>true, 'type'=>$key))?>"><?php echo h($val)?></a></li>
            <?php endforeach;?>
        </ul>
        <div class="qLink"></div>
    </div>
</div>