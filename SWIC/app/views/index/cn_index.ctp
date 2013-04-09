<div id="content" class="indexCenter">
	<div class="plateBox indexCenterTop">
		<h3 class="switch"><span>价格指数</span></h3>
		<ul class="switchBtn">
			<?php foreach($wineType as $key=>$wine):?>
			<li <?php if($key==$type):?>class="curr"<?php endif;?>><a href="<?php echo $this->Html->url(array('action'=>'index', 'cn'=>true, 'type'=>$key))?>"><?php echo h($wine)?></a></li>
			<?php endforeach;?>
		</ul>
		<div class="info">
			<!-- 
			<div class="index_1">
				<h4><?php echo h($wineType[$type])?><span><?php echo date('Y')?>年<?php echo date('n')?>月<?php echo date('j')?>日更新</span></h4>
				<div url="<?php echo $this->Html->url(array('action'=>'detail', 'cn'=>true, 'type'=>$type))?>" id="container_0" data="<?php echo h($wineType[$type])?>" type="<?php echo $type?>" subtype=""></div>
				<a class="more" href="<?php echo $this->Html->url(array('action'=>'detail', 'cn'=>true, 'type'=>$type))?>"><span>了解详情</span></a>
			</div>
		 	-->
			<?php $n = 1;?>
			<?php foreach($subindexes as $key=>$index):?>
			<div class="index_<?php echo $n++?>">
				<h4><?php echo h($index)?><span><?php echo date('Y')?>年<?php echo date('n')?>月<?php echo date('j')?>日更新</span></h4>
				<div class="chart"url="<?php echo $this->Html->url(array('action'=>'detail', 'cn'=>true, 'type'=>$type, 'subtype'=>$key))?>" id="container_<?php echo $key?>" data="<?php echo h($index)?>" type="<?php echo $type?>" subtype="<?php echo $key?>"></div>
				<a class="more" href="<?php echo $this->Html->url(array('action'=>'detail', 'cn'=>true, 'type'=>$type, 'subtype'=>$key))?>"><span>了解详情</span></a>
			</div>
			<?php endforeach;?>
		</div>
	</div>
	<div class="plateBox indexIntroduction">			
		<h3 class="switch"><span><strong class="curr">国际背景</strong> <strong>国内现状</strong> <strong>产生条件</strong> <strong>编制目的</strong> <strong>理论基础</strong> <strong>计算公式</strong> <strong>数据来源</strong></span></h3>
			<div class="info">
    			<ul>    
    				<li>据相关数据统计，中国已经成为全球第五大葡萄酒消费国和第六大葡萄酒生产国。2011年，中国葡萄酒消费量达到37亿瓶，超越意大利和法国成为全球最大的葡萄酒市场，而2011年中国共计消费了19亿瓶葡萄酒，成为增长最快的国家之一。预测未来5年，亚太地区将会成为酒精饮料增长最快的地区，并将很快超越欧洲，进而取代美国，成为世界第二大酒类消费区，其中预测中国增长率将达到63.2%。</li>    
    				<li>据相关统计数据显示， 2011年葡萄酒进口总量为36.16万千升，其中瓶装葡萄酒(2L以下)进口量为24.14万千升，散装葡萄酒(2L以上)进口量为12.02万千升。</li>
    				<li>2009年，我国进口瓶装酒量首次超过散装酒。2011年，散装酒首次呈现下滑趋势，表明进口葡萄酒市场正在由低端向高端转移。</li>
    			</ul>
			</div>
			<div class="info disn"><!--国内现状-->
				<ul>
					<li>目前，中国已经拥有东北、北京、天津、河北、山东、山西、黄河故道、新疆、甘肃、陕西、宁蒙、西南高山、广西等13个葡萄酒产区，几乎覆盖了国内全部适合种植酿酒葡萄的区域，中国的葡萄酒地图正日渐清晰，相关的投资和产业链建设也正在向这些区域聚集。 </li>
					<li>2010年1-11月，葡萄酒制造业销售收入总额达到285.828亿元，同比增长26.97%。葡萄酒制造业利润总额达到33.266亿元，同比增长21.10%。2010年的中国葡萄酒市场，无论生产、进口、营销、流通、投资以及对葡萄酒的理解、热爱和消费程度上，都有着空前的非凡表现。此时的国内市场，正在发展成为世界级葡萄酒及烈酒集散的枢纽。这种持续增长的趋势和不断成长的市场潜力，犹如一块巨大的磁石，吸引了新旧世界葡萄酒国家竞相进入中国开拓市场。 </li>
					<li>2011年前三季度全国葡萄酒行业增长平稳，产销两旺，在进口酒大兵压境的状况下，市场仍保持着稳健有序的发展态势，压力虽有，并未受到过多冲击。2011年1-10月，全国葡萄酒累计产量为909,676.36千升，比上年同期增长了12.37%。近几年，进口葡萄酒在中国展现出了惊人的爆发力，中国巨大的市场潜力将吸引越来越多的进口葡萄酒进入。但目前进口葡萄酒仍没有在中国落地生根，在进口葡萄酒当中，除了拉菲、卡斯特等少数几个品牌外，为消费者普遍熟悉的品牌并不多，中国消费者对进口葡萄酒的认知度总体而言并不高。 </li>
					<li>由于目前葡萄酒行业仍没出现一个指导市场、规范市场的行业评分标准，这将使得葡萄酒行业呈现参差不齐、良莠共存的局面。 </li>
					<li>巨大的市场消费背景与行业评分标准盲区形成鲜明对比，市场呼吁一款公正、公平、公信的行业评分标准尽快出台指导消费者、规范行业市场。中国酒类消费指数（CWPI）应需而生。</li>
				</ul>
			</div>
			<div class="info  disn"><!--产生条件-->
				<ul>
					<li>中国酒类商品消费持续高速增长。</li>
					<li>中国酒类商品交易正从传统的个体型经济向规模化经济转型。</li>
					<li>具有消费和投资双重概念的葡萄酒投资应运而生，葡萄酒金融产品得到了市场的认可。</li>
					<li>中国酒类消费市场急需整顿和规范。</li>
				</ul>
			</div>
			<div class="info  disn"><!--编制目的-->
				<ul>
					<li>CWPI可以加快中国酒类商品和国际接轨的步伐。</li>
					<li>为相关监管部门准确了解和及时掌握中国及世界酒类商品贸易动态，了解市场的运行状况，制定相关行业政策和发展规划提供依据；</li>
					<li>同时引领上海酒类商品产业发展和打造上海酒类行业金融中心，为广大业内人士提供最有参考价值的市场信息。</li>
					<li>建立和完善中国葡萄酒级评分体系，推动中国葡萄酒市场的健康稳定发展。</li>
					<li>为上海酒文化展示中心增加新的服务和热点。</li>
				</ul>
			</div>
			<div class="info  disn"><!--理论基础-->
				<p>上海酒类消费指数以目前中国酒类商品的实际供求数据作为理论基础，参考国际流行的酒类商品指数(LIV-EX指数)而设计的，一个依据价格和权重计算得到的中国酒类商品消费权价指数。该指数能及时、准确、全面地反映上海甚至全中国酒类商品的价格总体水平和变动情况，同时可藉以预测后期价格的发展趋势。</p>
				<p>上海酒类消费指数的编制原理是：以2012年的一月为基期，基期指数为1000，以上海酒类商品消费指数中心收集到的各经销商、交易中心、渠道商的当期价格为基础，运用加权平均公式编制而成。</p>
				<p>上海酒类消费指数每周编制，分周指数、月指数、年指数，定期在中国酒类商品消费指数中心平台、各大合作伙伴及媒体公开发布。</p>
				<p><strong>	上海酒类消费指数每个一级指标由2-3个二级指标来反映和合成。</strong></p>
				<ul>
					<li>中国白酒价格指数：中国白酒价格标准指数</li>
					<li>中国葡萄酒价格指数: 中国葡萄酒价格指数</li>
					<li>中国进口葡萄酒价格指数</li>
					<li>CWPI-100：世界名庄酒消费价格指数</li>
					<li>CWPI-C：优质进口葡萄酒价格指数</li>
					<li>CWPI : 中国进口葡萄酒指数</li>
				</ul>
			</div>
			<div class="info  disn"><!--计算公式-->
				<p>CWPI=（指数酒按当期价格计算的价值/指数酒按基期价格计算的价值）×100。</p>
				<p>采用的是固定权数按加权算术平均指数公式计算，即ΣKW/ΣW，固定权数为W，其中公式中分子的K为各种销售量的个体指数。</p>
				<ul>
					<li><strong>新成分酒加入</strong>：新指数酒第二月计入指数，即当月不计入指数，而于当月修正指数</li>
					<li><strong>修正方法为</strong>：当月的指数价总值/原除数=当月的指数市价总值+新酒当月基本价/修正后的除数</li>
				</ul>
			</div>
			<div class="info  disn"><!--数据采集-->
				<!-- 
				<p>中国酒类消费指数(CWPI)编制中使用的数据均来自当月实际进口和销售数据，主要包括外高桥保税区进口数据、中国主要酒类经销商当月实际销售价格、主流销售渠道实际采集价格等。今后，SWIC将进一步加大和上海工商、税务及更多的渠道经销商合作，以步提高上海酒类消费指数的精确度和市场影响力</p>
				 -->
				 <p>
				 	<?php foreach($importers as $importer):?>
				 	<?php echo h($importer)?>&nbsp;
				 	<?php endforeach;?>
				 </p>
			</div>
			<a class="btnLeft" href="#"></a>
			<a class="btnRight" href="#"></a>
		</div>
	</div>
</div>
<?php echo $this->Html->script('highcharts/highcharts')?>
<?php echo $this->Html->script('frontend/index/highchartsconfig')?>
<?php echo $this->Html->script('frontend/index/index')?>
