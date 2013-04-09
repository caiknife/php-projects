<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>上海酒类消费指数中心 | Shanghai Wine Index Center</title>
<?php echo $this->Html->css('frontend/style_cn', 'stylesheet', array('media'=>'screen'));?>
<?php echo $this->Html->script(array('jquery-1.7.2.min', 'jquery.tinyscrollbar.min'));?>
<?php echo $this->Html->script('highcharts/highcharts')?>
<?php echo $this->Html->script('frontend/index/highchartsconfig')?>
<?php echo $this->Html->script('frontend/products/detail')?>
<script type="text/javascript">
    $(document).ready(function(){
        $('#scrollbar1').tinyscrollbar();
    });
</script>
</head>
<body style="background:none; background:#fff">
<div class="liquorPhoto">
    <!--大图 高320 宽282，缩略图 高54 宽48，等比缩放-->
    <?php echo $this->Form->hidden('Wine.id', array('value'=>$wine['Wine']['id']))?>
    <div class="imgBig"><img src="<?php echo $this->Format->getWineBig($wine['Wine'])?>" /></div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('div.thumbnail a').attr('href',function(){
                $(this).attr('_href',$(this).attr('href'));
                return 'javascript:;';
            }).click(function(){
                $('div.thumbnail a').attr('class','');
                $(this).attr('class','curr');
                $('.imgBig img').attr('src',$(this).attr('smallImage'));
            })
        });
    </script>
    <div class="thumbnail"><!-- 最多五张图片,如果只有一张图片则不出现缩略图 -->
    	<?php if($wine['Wine']['media_url_1']):?>
        <a class="curr" smallImage="/attachments/photos/wine_big/<?php echo $wine['Wine']['media_url_1']?>">
        	<img src="/attachments/photos/wine_thumb/<?php echo $wine['Wine']['media_url_1']?>" />
        </a>
        <?php endif;?>
        <?php if($wine['Wine']['media_url_2']):?>
        <a smallImage="/attachments/photos/wine_big/<?php echo $wine['Wine']['media_url_2']?>">
        	<img src="/attachments/photos/wine_thumb/<?php echo $wine['Wine']['media_url_2']?>" />
        </a>
        <?php endif;?>
        <?php if($wine['Wine']['media_url_3']):?>
        <a smallImage="/attachments/photos/wine_big/<?php echo $wine['Wine']['media_url_3']?>">
        	<img src="/attachments/photos/wine_thumb/<?php echo $wine['Wine']['media_url_3']?>" />
        </a>
        <?php endif;?>
        <?php if($wine['Wine']['media_url_4']):?>
        <a smallImage="/attachments/photos/wine_big/<?php echo $wine['Wine']['media_url_4']?>">
        	<img src="/attachments/photos/wine_thumb/<?php echo $wine['Wine']['media_url_4']?>" />
        </a>
        <?php endif;?>
        <?php if($wine['Wine']['media_url_5']):?>
        <a smallImage="/attachments/photos/wine_big/<?php echo $wine['Wine']['media_url_5']?>">
        	<img src="/attachments/photos/wine_thumb/<?php echo $wine['Wine']['media_url_5']?>" />
        </a>
        <?php endif;?>                       
    </div>
</div>
<div class="liquorDetail">
    <h1><?php echo h($wine['Wine']['title_cn'])?> <?php echo h($wine['Wine']['year'])?></h1>
    <div class="exponentSmall">本月参考价格：<strong>￥<?php echo h($wine['Wine']['benchmark_price'])?></strong>
    	<div style="width:240px; height:156px; margin-top:5px" id="container"></div>
    </div>
    <div class="fractionBar">       
        <div class="bar"><span style="width:<?php echo $this->Format->getWineScore($wine)?>%"></span></div>
        <?php echo $this->Format->getWineScore($wine)?>分
    </div>
    <ul class="overview">
        <li><strong>英文名称</strong> <?php echo h($wine['Wine']['title_en'])?></li>
        <li><strong>国家</strong>  <?php echo h($wine['Country']['title_cn'])?></li>
        <li><strong>产区</strong> <?php echo h($wine['Region']['title'])?></li>
        <li><strong>容量</strong> <?php echo h($wine['Wine']['capacity'])?><?php echo h($capacityType[$wine['Wine']['capacity_type']])?></li>
        <li><strong>酒精度</strong> <?php echo h($wine['Wine']['alcohol'])?>%</li>
        <li><strong>葡萄品种</strong> <?php foreach($wine['WineGrapeVariety'] as $grape):?><?php echo h($grapeType[$grape['grape_varieties_id']])?>(<?php echo h($grape['percent'])?>%) <?php endforeach;?></li>
        <li><strong>法定等级</strong> <?php echo h($wine['StatutoryLevel']['title'])?></li>
    </ul>
    <div id="scrollbar1">
        <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
        <div class="viewport">
             <div class="overview">
                <p><?php echo nl2br(h($wine['Wine']['content']))?></p>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
