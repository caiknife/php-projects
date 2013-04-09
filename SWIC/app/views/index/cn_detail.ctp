<div id="content" class="indexCenter">
	<div class="sidebar">
		<?php echo $this->element('index/menu')?>
		<div class="AdBox"><a href="#"><img src="/images/cn/ad_1.png" width="300" height="200" /></a></div>	
	</div>
	<div class="main">
		<div class="globalnav">
			<a class="home" href="<?php echo $this->Html->url(array('controller'=>'home', 'action'=>'index', 'cn'=>true))?>">首页</a>
			<a href="<?php echo $this->Html->url(array('action'=>'index', 'cn'=>true))?>">指数中心</a>
			<span>价格指数</span>
			<span><?php echo h($wineType[$type])?>指数</span>
			<?php if($subtype):?>
			<strong><?php echo h($indexes[$subtype])?></strong>
			<?php endif;?>
			<span class="updateTime"><?php echo date('Y')?>年<?php echo date('n')?>月<?php echo date('j')?>日更新</span>
		</div>
		<div class="exponentBig">
            <?php if(sizeof($years) > 1):?>
            <div class="switchYear">
            <?php foreach($years as $key=>$year):?>
            <a <?php if($key==0):?>class="curr"<?php endif;?> href="#" data="<?php echo $year?>"><?php echo $year?>年</a> 
            <?php endforeach;?>
            </div>
            <?php endif;?>
			<?php echo $this->Form->hidden('Index.type', array('value'=>$type))?>
			<?php echo $this->Form->hidden('Index.subtype', array('value'=>$subtype))?>			
			<div id="container" style="width:640px; height: 300px; margin: 0 auto" data="<?php if($subtype){echo h($indexes[$subtype]);}else{echo h($wineType[$type]);}?>"></div>
		</div>
        <div class="plateBox">
            <h3><span>指数简介</span></h3>
            <p class="exponentDetail">
            <?php echo nl2br(h($subindex['Subindex']['desc']))?>
            </p>
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
					<?php foreach($wines as $n=>$wine):?>
					<tr <?php if($n%2):?>class="bg"<?php endif;?>>
						<td class="title"><?php echo h($wine['Wine']['title_cn'])?></td>
						<td class="title"><?php echo h($wine['Wine']['title_en'])?></td>
						<td><?php echo h($wine['Region']['title'])?></td>
						<td><?php echo h($wine['Wine']['year'])?></td>
						<td><?php echo $this->Format->getWineScore($wine)?></td>
						<?php $this->Format->setCurrentMonthPriceAndRatio($wine)?>
						<td><?php if($wine['Wine']['current_month_price']):?><s>&yen;</s><?php echo h($wine['Wine']['current_month_price'])?><?php endif;?></td>
						<td><?php if($wine['Wine']['price_ratio']):?><span class="<?php echo $this->Format->getPriceRatioClass($wine['Wine']['price_ratio'])?>"><?php echo $this->Format->getPriceRadioDisplayValue($wine['Wine']['price_ratio'])?>%</span><?php else:?><span>-</span><?php endif;?></td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
			<?php echo $this->element('index/cn_paginate')?>
		</div>
	</div>
	<br clear="all" />
</div>
<?php echo $this->Html->script('highcharts/highcharts')?>
<?php echo $this->Html->script('frontend/index/highchartsconfig')?>
<?php echo $this->Html->script('frontend/index/detail')?>

