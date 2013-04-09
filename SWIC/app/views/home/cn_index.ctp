<div id="content" class="index">
	<?php if($banners):?>
	<div id="idTransformView">
		<ul id="idSlider">
			<?php foreach($banners as $banner):?>
			<?php if($banner['Banner']['url']):?>
			<li><a title="<?php echo h($banner['Banner']['title'])?>" href="<?php echo h($banner['Banner']['url'])?>" target="_blank"><img src="<?php echo $this->Format->getBanner($banner['Banner'])?>" /></a></li>
			<?php else:?>
			<li><img src="<?php echo $this->Format->getBanner($banner['Banner'])?>" /></li>
			<?php endif?>
			<?php endforeach;?>
		</ul>
		<div id="idNum"></div>
	</div>
	<?php endif;?>
	<div class="left">
		<div class="plateBox">
			<h3 class="switch"><span>消费指数</span></h3>
			<ul class="switchBtn">
				<?php foreach($displayIndexes as $key=>$val):?>
				<li <?php if($key==0):?>class="curr"<?php endif;?> type="<?php echo $val['Subindex']['pid']?>" subtype="<?php echo $val['Subindex']['id']?>"><?php echo h($val['Subindex']['title'])?></li>
				<?php endforeach;?>
			</ul>
			<div class="exponentIndex">
				<span class="updateTime"><?php echo date('Y')?>年<?php echo date('n')?>月<?php echo date('j')?>日更新</span>
				<?php foreach($displayIndexes as $key=>$val):?>
				<div data="<?php echo h($val['Subindex']['title'])?>" class="chart <?php if($key!=0):?>disn<?php endif;?>" id="chart_<?php echo $val['Subindex']['id']?>" style="margin:auto; width:640px; height:230px" type="<?php echo $val['Subindex']['pid']?>" subtype="<?php echo $val['Subindex']['id']?>"></div>
				<?php endforeach;?>
			</div>
			<div class="exponentLiquorList">
				<table>
					<thead>
						<tr>
							<th class="title">名称</th>
							<th class="title">英文 </th>
							<th>产地</th>
							<th>年份</th>
							<th>评分</th>
							<th>本月零售指导价</th>
							<th>涨幅</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
		<div class="plateBox Declaration">
			<h3><span>评级评分酒品申报流程</span></h3>
			<a class="more" href="<?php echo $this->Html->url(array('controller'=>'rating', 'action'=>'process', 'cn'=>true))?>">更多</a>
			<div class="DeclarationBox">
				<a class="stpe1" href="<?php echo $this->Html->url(array('controller'=>'rating', 'action'=>'process', 'cn'=>true, '#'=>'step1'))?>"></a>
				<a class="stpe2" href="<?php echo $this->Html->url(array('controller'=>'rating', 'action'=>'process', 'cn'=>true, '#'=>'step2'))?>"></a>
				<a class="stpe3" href="<?php echo $this->Html->url(array('controller'=>'rating', 'action'=>'process', 'cn'=>true, '#'=>'step3'))?>"></a>
				<a class="stpe4" href="<?php echo $this->Html->url(array('controller'=>'rating', 'action'=>'process', 'cn'=>true, '#'=>'step4'))?>"></a>
			</div>
		</div>
	</div>
	<div class="right">
		<div class="plateLead">
			<h3>评审团队</h3>
			<a class="more" href="<?php echo $this->Html->url(array('controller'=>'about', 'action'=>'department', 'cn'=>true))?>">更多</a>
			<div class="leadBox"><img src="/images/cn/pake.jpg" width="300" height="245" />
				<dl>
					<dt>帕克</dt>
					<dd><p>法国葡萄酒业最怕的人不是其他国家的葡萄酒生产商，而是一位美国人，他的名字叫罗伯特·帕克。葡萄酒圈内有一种说法：帕克既可以成就一个法国葡萄园，也可以毁灭它。</p></dd>
					<dd class="bg"></dd>
				</dl>
			</div>
		</div>
		<?php foreach($displayNews as $key=>$news):?>
		<div class="plateNews">
			<h3><?php echo h($newsType[$key])?></h3>
			<a class="more" href="<?php echo $this->Html->url(array('controller'=>'news', 'action'=>'lists', 'cn'=>true, 'type'=>$key))?>">更多</a>
			<ul>
				<?php foreach($news as $item):?>
				<li><a href="<?php echo $this->Html->url(array('controller'=>'news', 'action'=>'detail', 'cn'=>'true', $item['News']['id']))?>"><?php echo h($item['News']['title'])?></a> <span><?php echo h($item['News']['article_date'])?></span></li>
				<?php endforeach;?>
			</ul>
		</div>
		<?php endforeach;?>
	</div>
	<div class="clear"></div>
	<div class="plateBox bootomPartners">
		<h3><span>合作伙伴</span></h3>
		<a class="more" href="<?php echo $this->Html->url(array('controller'=>'about', 'action'=>'partners', 'cn'=>true))?>">更多</a>
		<ul class="partnersList">
            <?php foreach($partners as $partner):?>
			<li><img src="<?php echo $this->Format->getPartnerLogo($partner['Partner'])?>" /><?php echo h($partner['Partner']['title'])?></li>
            <?php endforeach;?>
		</ul>
	</div>
</div>
<?php echo $this->Html->script('frontend/home/SliderShow')?>
<?php echo $this->Html->script('highcharts/highcharts')?>
<?php echo $this->Html->script('frontend/index/highchartsconfig')?>
<?php echo $this->Html->script('frontend/home/index')?>