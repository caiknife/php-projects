<div id="content">
    <div class="sidebar">
        <?php echo $this->element('rating/menu')?>
        <div class="AdBox"><a href="#"><img src="/images/cn/ad_1.png" width="300" height="200" /></a></div>
    </div>
    <div class="main">
        <div class="globalnav">
            <a class="home" href="<?php echo $this->Html->url(array('controller'=>'home', 'action'=>'index', 'cn'=>true))?>">首页</a>
            <a href="<?php echo $this->Html->url(array('controller'=>'rating', 'action'=>'index', 'cn'=>true))?>">评级评分</a>
            <strong>酒评历史</strong>
        </div>
        <ul class="historyBox">
            <li class="historyList">
                <h4><?php echo h($note['TastingNotes']['title'])?></h4>
                <div class="overview">
                    <ul>
                        <li>评审日期：<?php echo $this->Format->toDate($note['TastingNotes']['date_time'], 'Y年m月d日')?></li>
                        <li>评审场地：<?php echo h($note['TastingNotes']['address'])?></li>
                        <li>品酒数量：<?php echo sizeof($note['TastingScore'])?>款</li>
                    </ul>
                    <p><?php echo h($note['TastingNotes']['content'])?></p>
                </div>
            </li>
        </ul>
        <div class="liquorBox">
            <!--缩略图片裁切尺寸 高：100  宽88 等比缩放-->
            <script>
                $(document).ready(function(){
                    //$(".liquorList a").colorbox({width:"950", height:"527", iframe:true, opacity:0.6});
                    $('.liquorList').each(function(){
                        $(this).colorbox({width:"950", height:"527", iframe:true, opacity:0.6, href:$('h4 a', $(this)).attr('href')});
                    });
                });
            </script>
            <?php foreach($wines as $wine):?>
            <div class="liquorList">
                <div class="pic"><a href="<?php echo $this->Html->url(array('controller'=>'products', 'action'=>'detail', 'cn'=>true, $wine['Wine']['id']))?>"><img src="<?php echo $this->Format->getWineLogo($wine['Wine'])?>" /></a></div>
                <h4><a href="<?php echo $this->Html->url(array('controller'=>'products', 'action'=>'detail', 'cn'=>true, $wine['Wine']['id']))?>"><?php echo h($wine['Wine']['title_cn'])?></a></h4>
                <ul>
                    <li><span>英文名称：<strong><?php echo h($wine['Wine']['title_en'])?></strong></span> <span>原国家名：<strong><?php echo h($wine['Wine']['title_other'])?></strong></span></li>
                    <li><span>产区：<strong><?php echo h($wine['Region']['title'])?></strong></span> <span>酒庄：<strong><?php echo h($wine['Winery']['title'])?></strong></span> <span>法定等级：<strong><?php echo h($wine['StatutoryLevel']['title'])?></strong></span></li>
                    <li><span>进口商：<strong><?php echo h($wine['Importer']['title_cn'])?></strong></span></li>
                </ul>
                <div class="fractionBar">
                    <div class="bar"><span style="width:<?php echo $this->Format->getWineScore($wine)?>%"></span></div>                     
                    <?php echo $this->Format->getWineScore($wine)?>分
                </div>
            </div>
            <?php endforeach;?>
        </div>
        <?php if($this->Format->isRatingHasMedia($note['TastingNotes'])):?>
        <div class="plateBox">
            <h3><span>现场照片</span></h3>
            <script>
                $(document).ready(function(){
                    $(".photoList a[rel='example1']").colorbox({transition:"fade", opacity:0.6});
                });
            </script>
            <ul class="photoList">
                <?php if($note['TastingNotes']['media_url_1']):?>
                <li>
                    <a rel="example1" href="/attachments/photos/note_big/<?php echo $note['TastingNotes']['media_url_1'];?>" title="<?php echo $note['TastingNotes']['media_desc_1'];?>">
                        <img src="/attachments/photos/note/<?php echo $note['TastingNotes']['media_url_1'];?>" />
                    </a>
                 </li>
                <?php endif;?>
                <?php if($note['TastingNotes']['media_url_2']):?>
                <li>
                    <a rel="example1" href="/attachments/photos/note_big/<?php echo $note['TastingNotes']['media_url_2'];?>" title="<?php echo $note['TastingNotes']['media_desc_2'];?>">
                        <img src="/attachments/photos/note/<?php echo $note['TastingNotes']['media_url_2'];?>" />
                    </a>
                 </li>
                <?php endif;?>
                <?php if($note['TastingNotes']['media_url_3']):?>
                <li>
                    <a rel="example1" href="/attachments/photos/note_big/<?php echo $note['TastingNotes']['media_url_3'];?>" title="<?php echo $note['TastingNotes']['media_desc_3'];?>">
                        <img src="/attachments/photos/note/<?php echo $note['TastingNotes']['media_url_3'];?>" />
                    </a>
                 </li>
                <?php endif;?>
                <?php if($note['TastingNotes']['media_url_4']):?>
                <li>
                    <a rel="example1" href="/attachments/photos/note_big/<?php echo $note['TastingNotes']['media_url_4'];?>" title="<?php echo $note['TastingNotes']['media_desc_4'];?>">
                        <img src="/attachments/photos/note/<?php echo $note['TastingNotes']['media_url_4'];?>" />
                    </a>
                 </li>
                <?php endif;?>
                <?php if($note['TastingNotes']['media_url_5']):?>
                <li>
                    <a rel="example1" href="/attachments/photos/note_big/<?php echo $note['TastingNotes']['media_url_5'];?>" title="<?php echo $note['TastingNotes']['media_desc_5'];?>">
                        <img src="/attachments/photos/note/<?php echo $note['TastingNotes']['media_url_5'];?>" />
                    </a>
                 </li>
                <?php endif;?>
                <?php if($note['TastingNotes']['media_url_6']):?>
                <li>
                    <a rel="example1" href="/attachments/photos/note_big/<?php echo $note['TastingNotes']['media_url_6'];?>" title="<?php echo $note['TastingNotes']['media_desc_6'];?>">
                        <img src="/attachments/photos/note/<?php echo $note['TastingNotes']['media_url_6'];?>" />
                    </a>
                 </li>
                <?php endif;?>
            </ul>
        </div>
        <?php endif;?>
    </div>
    
    <br clear="all" />
</div>