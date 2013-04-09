<div id="content">
	<h2>添加酒</h2>
	<?php echo $this->Form->create('Wine', array('type'=>'file', 'url'=>array('controller'=>'products', 'action'=>'update', 'admin'=>true)))?>
	<?php echo $this->Form->hidden('id')?>
	<div class="tabDetails">
		<div class="tabRight">
			<div class="release">
				<p><a class="save" href="#">发布</a><a class="del" href="#">删除</a></p>
			</div>
			<div class="tabRightBox">
				<h3>酒评</h3>
				<ul class="spectatorList">
					<?php foreach($tastingScore as $score):?>
					<li>
						<strong><?php echo h($tastingNotes[$score['tasting_notes_id']])?></strong> 
						<a href="<?php echo $this->Html->url(array('action'=>'edit_tasting_score', 'admin'=>true, $score['id']))?>" class="edit_tasting_score">编辑</a> <a href="<?php echo $this->Html->url(array('action'=>'delete_tasting_score', 'admin'=>true, $score['id']))?>" class="delete_tasting_score">删除</a><br />
						酒色:<?php echo h($score['score_color'])?> / 香气:<?php echo h($score['score_aroma'])?> / 
						回味:<?php echo h($score['score_aftertaste'])?> / 潜力:<?php echo h($score['score_potential'])?><br />
						总分:<?php echo h($this->Format->getTotalScore($score))?>
					</li>
					<?php endforeach;?>
					<li>
						<?php echo $this->Form->select('AddTastingScore.year', $years, null, array('empty'=>false))?>
					    <?php echo $this->Form->select('AddTastingScore.tasting_notes_id', $notes, null, array('empty'=>false))?>
						<?php echo $this->Form->text('AddTastingScore.score_color', array('title'=>'酒色', 'style'=>'color:#999', ))?>
						<?php echo $this->Form->text('AddTastingScore.score_aroma', array('title'=>'香气', 'style'=>'color:#999', ))?>
						<?php echo $this->Form->text('AddTastingScore.score_aftertaste', array('title'=>'回味', 'style'=>'color:#999', ))?>
						<?php echo $this->Form->text('AddTastingScore.score_potential', array('title'=>'潜力', 'style'=>'color:#999', ))?>
						<a href="#" class="add_tasting_score"><strong>增加</strong></a>
					</li>
				</ul>
			</div>
			<div class="tabRightBox">
				<h3>基准价格</h3>
				<fieldset>
					<div>
						<?php echo $this->Form->text('benchmark_price')?>
						<?php echo $this->Form->select('benchmark_year', $this->Format->setYearRange(), null, array('empty'=>false))?>
						<?php echo $this->Form->select('benchmark_month', $this->Format->setMonthRange(), null, array('empty'=>false))?>
						<?php echo $this->Form->select('benchmark_day', $this->Format->setDayRange(), null, array('empty'=>false))?>
					</div>
				</fieldset>
			</div>
			<div class="tabRightBox">
				<h3>酒价格历史</h3>
				<ul class="price_history">
					<?php foreach($priceMonthly as $price):?>
					<li>
						<strong><?php echo h($price['price'])?></strong> / <?php echo h($price['year'])?>年<?php echo h($price['month'])?>月 
						<a href="<?php echo $this->Html->url(array('action'=>'edit_price_monthly', 'admin'=>true, $price['id']))?>" class="edit_price_monthly">编辑</a> <a href="<?php echo $this->Html->url(array('action'=>'delete_price_monthly', 'admin'=>true, $price['id']))?>" class="delete_price_monthly">删除</a>
					</li>
					<?php endforeach;?>
					<li>
						<?php echo $this->Form->text('AddPriceMonthly.price', array('title'=>'价格', 'style'=>'color:#999', ))?>
						<?php echo $this->Form->select('AddPriceMonthly.year', $this->Format->setYearRange(), null, array('empty'=>'年份'))?>
						<?php echo $this->Form->select('AddPriceMonthly.month', $this->Format->setMonthRange(), null, array('empty'=>'月份'))?>
						<a href="#" class="add_price_monthly"><strong>增加</strong></a>
					</li>
				</ul>
			</div>
		</div>
		<div class="tabLeft">
			<fieldset>
				<legend>名称</legend>
				<div>
					<?php echo $this->Form->text('title_cn', array('title'=>'中文名', 'style'=>'color:#999', ))?>
				</div>
				<div>
					<?php echo $this->Form->text('title_en', array('title'=>'英文名', 'style'=>'color:#999', ))?>
				</div>
				<div>
					<?php echo $this->Form->text('title_other', array('title'=>'原国家名', 'style'=>'color:#999', ))?>
				</div>
			</fieldset>
			<table class="tabP2">
				<tr>
					<td>
						<fieldset>
							<legend>年份</legend>
							<?php echo $this->Form->select('year', $this->Format->setWineAge(), null, array('empty'=>'选择年份'))?>
						</fieldset>
					</td>
					<td>
						<fieldset>
							<legend>类型</legend>
							<?php echo $this->Form->select('index_type', $wineType, null, array('empty'=>'选择类型'))?>
						</fieldset>
					</td>
					<td id="subindexes">
						<fieldset>
							<legend>指数分类</legend>
							<?php echo $this->Form->select('index_sub_id', $subindexes, null, array('empty'=>'选择指数分类'))?>
						</fieldset>
					</td>
				</tr>
			</table>
			<hr />
			<? if(in_array($wine['index_type'],array(1,2))){?>
			<table class="tabP">
				<tr>
					<td>
						<fieldset>
							<legend>国家</legend>
							<?php echo $this->Form->select('country_id', $countries, null, array('empty'=>'选择国家'))?>
						</fieldset>
					</td>
					<td>
						<fieldset>
							<legend>产区</legend>
							<?php echo $this->Form->select('regions_id', $regions, null, array('empty'=>'选择产区'))?>
						</fieldset>
					</td>
					<td><!-- 仅葡萄酒才有酒庄-->
						<fieldset>
							<legend>酒庄</legend>
							<?php echo $this->Form->select('winery_id', $wineries, null, array('empty'=>'选择酒庄'))?>
						</fieldset>
					</td>
				</tr>
			</table>
			<?}?>
			<? if(!in_array($wine['index_type'],array(1,2))){?>
			<table class="tabP2">
				<tr>
					<td>
						<fieldset>
							<legend>酒厂</legend>
							<?php echo $this->Form->text('factories', array('class'=>'short'))?>
						</fieldset>
					</td>
					<td><!-- 仅国酒才有品牌-->
						<fieldset>
							<legend>品牌</legend>
							<?php echo $this->Form->text('brands', array('class'=>'short'))?>
						</fieldset>
					</td>
				</tr>
			</table>
			<?}?>
			<hr />
			<table class="tabP">
				<tr>
					<td>
						<fieldset>
							<legend>容量  </legend>
							<?php echo $this->Form->text('capacity')?>
							<?php echo $this->Form->select('capacity_type', Configure::read('Wine.capacity_type'), null, array('empty'=>false))?>
						</fieldset>
					</td>
					<td>
						<fieldset>
							<legend>酒精度%</legend>
							<?php echo $this->Form->text('alcohol')?>
						</fieldset>
					</td>
				</tr>
			</table>
			<div class="addWineType">
				<table>
					<tr>
						<td>
							<legend>葡萄品种</legend>
							<?php echo $this->Form->select('grape_variety_id', $grapeVarieties, null, array('empty'=>'选择葡萄品种'))?>
						</td>
						<td>
							<legend>百分比%</legend>
							<?php echo $this->Form->text('percent')?> <a href="#" class="add_grape">添加</a>
						</td>
					</tr>
				</table>
				<div class="grape_variety">
					<?php foreach($wineGrapeVarieties as $item):?>
					<a title="移除" href="<?php echo $this->Html->url(array('action'=>'disconnect_wine_grape', $item['id']))?>" ><?php echo h($grapeVarieties[$item['grape_varieties_id']])?>, <?php echo h($item['percent'])?>%</a>
					<?php endforeach;?>
				</div>
			</div>
			<fieldset>
				<legend>法定级别</legend>
				<div>
					<?php echo $this->Form->select('statutory_level_id', $statutoryLevels, null, array('empty'=>'选择级别'))?>
				</div>
			</fieldset>
			<fieldset class="searchBar">
				<legend>进口商</legend>
				<input name="importer" type="text" id="importer" />
				<ul class="disn" id="importer_list"></ul>
				<div class="importer"><?php if($importer):?><a href="#" title="<?php echo h($importer['title_cn'])?>"><?php echo h($importer['title_cn'])?></a><?php endif;?></div>
			</fieldset>
			<fieldset>
				<legend>简介</legend>
				<div>
				    <?php echo $this->Form->textarea('content')?>
				</div>
			</fieldset>
			<div class="tabLeftBox photoList productPhoto">
				<h3>产品相册 <input type="file" id="wine_logo" name="wine_logo" /> <button class="button_logo">上传</button> <img src="/img/loading.gif" class="disn" id="loading_logo" /></h3>
				<ul class="logo_list">
					<?php if($wine['media_url_1']):?>
					<li data="<?php echo $wine['media_url_1']?>"><img title="拖动排序" src="/attachments/photos/wine_logo/<?php echo $wine['media_url_1']?>" /><a href="#">刪除</a></li>
					<?php endif;?>
					<?php if($wine['media_url_2']):?>
					<li data="<?php echo $wine['media_url_2']?>"><img title="拖动排序" src="/attachments/photos/wine_logo/<?php echo $wine['media_url_2']?>" /><a href="#">刪除</a></li>
					<?php endif;?>
					<?php if($wine['media_url_3']):?>
					<li data="<?php echo $wine['media_url_3']?>"><img title="拖动排序" src="/attachments/photos/wine_logo/<?php echo $wine['media_url_3']?>" /><a href="#">刪除</a></li>
					<?php endif;?>
					<?php if($wine['media_url_4']):?>
					<li data="<?php echo $wine['media_url_4']?>"><img title="拖动排序" src="/attachments/photos/wine_logo/<?php echo $wine['media_url_4']?>" /><a href="#">刪除</a></li>
					<?php endif;?>
					<?php if($wine['media_url_5']):?>
					<li data="<?php echo $wine['media_url_5']?>"><img title="拖动排序" src="/attachments/photos/wine_logo/<?php echo $wine['media_url_5']?>" /><a href="#">刪除</a></li>
					<?php endif;?>
				</ul>
			</div>
		</div>
	</div>
	<?php echo $this->Form->end()?>
</div>
<?php echo $this->Html->script('ajaxfileupload', false)?>
<?php echo $this->Html->script('admin/products/edit')?>