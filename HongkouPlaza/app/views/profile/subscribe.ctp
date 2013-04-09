<div id="content">
	<div id="main">
		<?php echo $this->element('profile/left')?>
		<div id="right">
			<div class="brandSwitch">
				<a class="curr" href="<?php echo $this->Html->url(array('action'=>'subscribe'))?>">推荐订阅</a>
				<a href="<?php echo $this->Html->url(array('action'=>'subscribed'))?>">已订阅</a>
			</div>
			<!--[if IE 6]>
			<script type="text/javascript">DD_belatedPNG.fix('.logoList i')</script>
			<![endif]-->
			<dl class="subscribeList">
                <?php foreach($categories as $i=>$item):?>
                <?php if(isset($brands_group[$i])):?>
				<dt class="open"><?php echo h($item)?> <span>(<?php echo sizeof($brands_group[$i])?>)</span></dt> <!-- dd展开 dt class="close", dd关闭 dt class="open" -->
				<dd class="logoList" style="display:none"><!-- 未展开的品牌 DD style="height:0" 点击DT后DD上下滑动展开 -->
					<ul>
						<?php foreach($brands_group[$i] as $brand):?>
						<li>
							<a title="<?php echo h($brand['Brand']['title'])?> <?php echo h($brand['Brand']['title_en'])?>" href=<?php echo $this->Html->url(array('action'=>'detail', $brand['Brand']['id']))?>><img src="/attachments/photos/brand_logo/<?php echo $brand['Brand']['logo']?>" alt="<?php echo h($brand['Brand']['title'])?> <?php echo h($brand['Brand']['title_en'])?>" /><i></i></a>
							<label>
                                <strong><?php echo h($brand['Brand']['title'])?></strong>
                                <span><?php echo h($brand['Brand']['guide_id'])?></span>
                                <?php if (in_array($brand['Brand']['id'], $subscribed)):?>
                                <span>已订阅</span>
                                <?php else:?> 
                                <input type="checkbox" name="<?php echo $brand['Brand']['id']?>" />
                                <?php endif;?>
                            </label>
                        </li>
						<?php endforeach;?>
					</ul>
					<div class="subscribeSubmit"><a class="selectAll" href="#">全选</a><a class="determine" href="#">确认订阅</a></div>
					<br/>
				</dd>
				<?php endif;?>
				<?php endforeach;?>
			</dl>				
		</div>
		<br clear="all" />
	</div>
</div>
<?php echo $this->Html->script('frontend/profile/subscribe')?>