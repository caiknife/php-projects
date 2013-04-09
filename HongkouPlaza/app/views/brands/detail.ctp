<div id="content">
    <div id="brandDetailed">
        <div id="left">
            <div class="brandBasic">
                <div class="brandLogo">
                    <!--[if IE 6]>
                    <script type="text/javascript">DD_belatedPNG.fix('.brandLogo i')</script>
                    <![endif]-->
                    <img src="/attachments/photos/brand_logo/<?php echo $brand['Brand']['logo']?>" /><i></i>
                    <h2>
                        <?php if ($brand['Brand']['title_en']):?><span class="en"><?php echo h($brand['Brand']['title_en'])?></span><?php endif;?> 
                    	<?php if ($brand['Brand']['title']):?><span class="cn"><?php echo h($brand['Brand']['title'])?></span><?php endif;?>
                    </h2>
                    <?php if ($brand['Brand']['shop_id']):?>
                    <strong><?php echo h($brand['Brand']['shop_id'])?></strong>
                    <?php endif;?>
                </div>
                <ul>
                	<?php if($brand['Brand']['floor']):?>
                    <li><strong>所在楼层：</strong><?php echo h($brand['Brand']['floor'])?></li>
                    <?php endif;?>
                    <?php if($brand['Category']):?>
                    <li><strong>店铺类型：</strong>
                        <?php foreach($brand['Category'] as $index => $item): ?>
                        <?php echo h($item['name'])?><?php if($index+1 < sizeof($brand['Category'])):?>, <?php endif;?>
                        <?php endforeach;?>
                    </li>
                    <?php endif;?>
                	<?php if($brand['Brand']['operation']):?>
                    <li><strong>经营内容：</strong><?php echo h($brand['Brand']['operation'])?></li>
                    <?php endif;?>
                    <?php if($brand['Brand']['website']):?>
                    <li><strong>官方网址：</strong><a target="_blank" href="<?php echo $brand['Brand']['website']?>"><?php echo $brand['Brand']['website']?></a></li>
                    <?php endif;?>
                    <?php if($brand['Brand']['style']):?>
                    <li><strong>品牌风格：</strong><?php echo h($brand['Brand']['style'])?></li>
                    <?php endif;?>
                    <?php if($brand['Brand']['phone']):?>
                    <li><strong>客服电话：</strong><?php echo h($brand['Brand']['phone'])?></li>
                    <?php endif;?>
                    <?php if($brand['Brand']['openhours']):?>
                    <li><strong>营业时间：</strong><?php echo $brand['Brand']['openhours']?></li>
                    <?php endif;?>
                </ul>
                <?php if($brand['Brand']['jh_card']):?>
                <a title="嘉惠卡商户" class="shoppingCard" href="#"></a>
                <?php endif;?>
            </div>
            <?php if ($brand['Event']):?>
            <div class="relatedActivities">
                <h3>相关促销活动</h3>
                <ul>
                	<?php foreach($brand['Event'] as $event):?>
                    <li>
                        <a href="<?php echo $this->Html->url(array('controller'=>'events', 'action'=>'detail', $event['id']))?>">
                            <img src="/attachments/photos/event_image/<?php echo $event['image']?>" />
                            <strong><?php echo h($event['title'])?></strong>
                            <small><?php echo $this->Format->toDate($event['start_date'])?> - <?php echo $this->Format->toDate($event['end_date'])?></small>
                            <span><?php echo h($event['title_sub'])?></span>
                        </a>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>
            <?php endif?>
        </div>
        <div id="right">
            <div class="shopAlbum">
                <ul class="BigImg">
                    <li><img src="/attachments/photos/brand_photo/<?php echo $brand['Brand']['photo1']?>" width="630" height="320" /></li>
                    <?php if($brand['Brand']['photo2']):?>
                    <li><img src="/attachments/photos/brand_photo/<?php echo $brand['Brand']['photo2']?>" width="630" height="320" /></li>
                    <?php endif;?>
                    <?php if($brand['Brand']['photo3']):?>
                    <li><img src="/attachments/photos/brand_photo/<?php echo $brand['Brand']['photo3']?>" width="630" height="320" /></li>
                    <?php endif;?>
                    <?php if($brand['Brand']['photo4']):?>
                    <li><img src="/attachments/photos/brand_photo/<?php echo $brand['Brand']['photo4']?>" width="630" height="320" /></li>
                    <?php endif;?>
                </ul>
                <div class="thumbnail">
                    <?php if($brand['Brand']['photo1'] && ($brand['Brand']['photo2'] || $brand['Brand']['photo3'] || $brand['Brand']['photo4'])):?>
                    <a class="curr" href="javascript:;"><img src="/attachments/photos/brand_photo_thumb/<?php echo $brand['Brand']['photo1']?>" /></a>
                    <?php endif;?>
                    <?php if($brand['Brand']['photo2']):?>
                    <a href="javascript:;"><img src="/attachments/photos/brand_photo_thumb/<?php echo $brand['Brand']['photo2']?>" /></a>
                    <?php endif;?>
                    <?php if($brand['Brand']['photo3']):?>
                    <a href="javascript:;"><img src="/attachments/photos/brand_photo_thumb/<?php echo $brand['Brand']['photo3']?>" /></a>
                    <?php endif;?>
                    <?php if($brand['Brand']['photo4']):?>
                    <a href="javascript:;"><img src="/attachments/photos/brand_photo_thumb/<?php echo $brand['Brand']['photo4']?>" /></a>
                    <?php endif;?>
                </div>
            </div>
            <?php echo nl2br($brand['Brand']['brief'])?>
        </div>
        <br clear="all" />
    </div>
</div>
<?php echo $this->Html->script('frontend/brands/detail')?>