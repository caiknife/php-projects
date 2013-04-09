<div id="main">
    <div class="subNav">
        <?php echo $this->element('info/'.$lang.'_menu')?>
    </div>
    <div class="function">
        <span class="time"><?php echo $this->Format->toDate($news['News']['public_date'], 'Y.m.d H:i')?></span>
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
    <div class="newsDetail">
        <h2><?php echo h($news['News']['title'])?></h2>
        <div id="Cms">
            <?php echo $news['News']['content']?>
        </div>
        <div class="toTopWrap"><a class="toBack" href="<?php echo $this->Html->url(array('action'=>'news'))?>">Back to List</a></div>
    </div>
    <div class="newsRelevant">
        <div class="relevantProject">
            <?php if($news['Project']):?>
            <h3>Related Projects</h3>
            <?php foreach($news['Project'] as $project):?>
            <a href="<?php echo $this->Html->url(array('controller'=>'project', 'action'=>'view', $project['id']))?>"><img src="<?php echo $this->Format->getProjectListImage($project)?>" width="160" height="120" /><span><?php echo h($project['title_'.$lang])?></span></a>
            <?php endforeach;?>
            <?php endif;?>
        </div>
        <div class="relevantNews">
            <?php if($relativeNews):?>
            <h3>Related News</h3>
            <ul>
                <?php foreach($relativeNews as $item):?>
                <li><a href="<?php echo $this->Html->url(array('action'=>'viewnews', $item['News']['id']))?>"><?php echo h($item['News']['title'])?></a></li>
                <?php endforeach;?>
            </ul>
            <?php endif;?>
        </div>
    </div>
    <div class="clear"></div>
</div>