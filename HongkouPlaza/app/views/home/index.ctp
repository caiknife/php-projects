<div id="content">
	<!--[if IE 6]>
	<script type="text/javascript">DD_belatedPNG.fix('.SliderShow .left i,.SliderShow .graph,idNum .on')</script>
	<![endif]-->
	<div class="SliderShow">
		<div class="left" id="idTransformView">
			<div>
				<ul id="idSlider">
                    <?php foreach ($home_banners as $banner):?>
					<li><a href="<?php echo h($banner['HomeBanner']['url'])?>" title="<?php echo h($banner['HomeBanner']['description'])?>"><img src="/attachments/photos/origin/<?php echo h($banner['HomeBanner']['image'])?>" width="720" height="420" /><i></i></a></li>
                    <?php endforeach;?>
				</ul>
				<div id="idNum"></div>
			</div>
			<span class="graph"></span>
		</div>
		<div class="right">
			<h3>促销活动</h3>
			<a class="more" href="<?php echo $this->Html->url(array('controller'=>'events', 'action'=>'index'))?>">more</a>
			<ul>
				<!-- 鼠标移动到LI img styel="margin-top:0", 没有移动到的LI img style="margin-top:-100px"   -->
                <?php foreach($events as $i => $event):?>
				<li <?php if($i==0):?>class="active"<?php endif;?>><a href="<?php echo $this->Html->url(array('controller'=>'events', 'action'=>'detail', $event['Event']['id']))?>"><img alt="<?php echo h($event['Event']['title'])?>" <?php if($i==0):?>style="margin-top:0"<?php endif;?> <?php ?>src="/attachments/photos/event_image_thumb/<?php echo $event['Event']['image']?>" /><strong><?php echo h($event['Event']['title'])?></strong><span><?php echo $this->Format->toDate($event['Event']['start_date'])?> - <?php echo $this->Format->toDate($event['Event']['end_date'])?></span></a></li>
                <?php endforeach;?>
			</ul>
			<a class="shoppingCard" href="#"></a>
		</div>
	</div>
	<div class="indexBox">
		<div class="brand">
			<h3>潮流品牌</h3>
			<a class="more" href="<?php echo $this->Html->url(array('controller'=>'brands', 'action'=>'index'))?>">more</a>
			<div class="switch">
				<a class="btnLeft" href="#"></a>
				<!-- 左右按钮点击后 li style="margin-left:-46px" 效果滑动 -->
				<div>
					<ul>
					<!-- 点击LI按钮后 ul class="ibrandList" 效果为淡入淡出, style="margin-left:-46px"  ul class="ibrandList" li列表切换至最后自动切换至下一个按钮 -->
						<?php $n=1?>
						<?php foreach($lockedCategories as $i => $cate):?>
						<li title="<?php echo h($cate)?>" class="a_<?php echo sprintf('%02d', $n++)?>" name="<?php echo $this->Html->url(array('action'=>'brands', 'cate'=>$i))?>" <?php if($n>6):?>style="display: none;"<?php endif;?>></li>
						<?php endforeach;?>
					</ul>
				</div>
				<a class="btnRight" href="#"></a>
			</div>
			<!--[if IE 6]>
			<script type="text/javascript">DD_belatedPNG.fix('.ibrandList i')</script>
			<![endif]-->
			<ul class="ibrandList">
                
			</ul>
			<div class="btnIbrandList">
				
			</div>
		</div>
		<div class="weibo">
			<h3>新浪微博 - 凯德龙之梦虹口</h3>
			<a class="attention" target="_blank" href="http://t.sina.com.cn/hongkouplaza">关注我们</a>
			<!-- 列表滚动效果同新浪微博 -->
            <?php if ($weibo):?>
            <div class="weibo-jcarousellite">
            <ul>
                <?php foreach($weibo as $post):?>
                <li>
        			<div class="itemt">
        				<div class="twit_item">
        					<div class="twit_item_pic"><a href="<?php echo $post['user_url']?>" target="_blank" title="<?php echo h($post['user_name'])?>"><img src="<?php echo $post['user_image']?>" title="<?php echo h($post['user_name'])?>" alt="<?php echo h($post['user_name'])?>" /></a></div>
        					<div class="twit_item_content"> <a href="<?php echo $post['user_url']?>" target="_blank" title="<?php echo h($post['user_name'])?>"><?php echo h($post['user_name'])?></a>：<?php echo $post['text']?><div class="twit_item_time"><?php echo $this->Format->printTime($post['created_at'])?></div></div>
        				</div>
        			</div>
                </li>
                <?php endforeach;?>
            </ul>
            </div>
            <?php endif;?>
    		<!--[if IE 6]>
    		<script type="text/javascript">DD_belatedPNG.fix('.mask')</script>
    		<![endif]-->
    		<i class="mask"></i>
		</div>
    	<div class="calendar">
			<h3>活动日历</h3>
			<a class="more" href="<?php echo $this->Html->url(array('controller'=>'events', 'action'=>'index'))?>">more</a>
			<!--[if IE 6]>
			<script type="text/javascript">DD_belatedPNG.fix('.calendar i')</script>
			<![endif]-->
			<ul>
                <?php foreach ($home_events as $event):?>
				<li><a href="<?php echo h($event['HomeEvent']['url'])?>" title="<?php echo $event['HomeEvent']['url']?>"><img src="/attachments/photos/origin/<?php echo h($event['HomeEvent']['image'])?>" width="260" height="60" /><i></i></a></li>
                <?php endforeach;?>
			</ul>
		</div>
	</div>
</div>
<?php echo $this->Html->script('frontend/home/index', false);?>