<div id="main">
    <div class="function">
        <span class="time"><?php echo $this->Format->toDate($project['Project']['created'], 'Y.m.d H:i')?></span>
        <!-- Baidu Button BEGIN -->
        <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
            <span class="bds_more">Share:</span>
            <a class="bds_tsina"></a>
            <a class="bds_tqq"></a>
            <a class="bds_renren"></a>
            <a class="bds_kaixin001"></a>
            <a class="bds_fbook"></a>
            <a class="bds_twi"></a>
        </div>
        <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=777755" ></script>
        <script type="text/javascript" id="bdshell_js"></script>
        <script type="text/javascript">
            document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
        </script>
        <!-- Baidu Button END -->
    </div>
    <div class="projectDetail">
        <h2><?php echo h($project['Project']['title_'.$lang])?></h2>
        <div id="Cms">
            <?php echo $project['Project']['content_'.$lang]?>
        </div>
        <div class="toTopWrap"><a class="toBack" href="<?php echo $this->Html->url(array('action'=>'index'))?>">Back to List</a></div>
    </div>
    <div class="clear"></div>
</div>