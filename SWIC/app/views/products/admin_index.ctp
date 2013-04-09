<div id="content">
	<h2><?php echo h($wineType[$type])?> <a href="<?php echo $this->Html->url(array('controller'=>'products', 'action'=>'add', 'admin'=>true, 'type'=>$type))?>">添加</a></h2>
	<div class="page">
		<?php echo $this->Form->create('Wine', array('type'=>'post', 'url'=>array('controller'=>'products', 'action'=>'index', 'admin'=>true, 'type'=>$type)));?>
		<?php echo $this->element('products/paginate')?>
		<?php echo $this->Form->select('year', $this->Format->setWineAge(), null, array('empty'=>'年份'))?>
		<?php echo $this->Form->select('country_id', $countries, null, array('empty'=>'国家'))?>
		<?php echo $this->Form->select('regions_id', $regions, null, array('empty'=>'产区'))?>
		<?php echo $this->Form->select('winery_id', $wineries, null, array('empty'=>'酒庄'))?>
		<?php echo $this->Form->end();?>
	</div>
	<table class="tab productList">
		<thead>
			<tr>
				<td class="title">名称 | 年份</td>
				<td>进口商</td>
				<td>国家 | 地区</td>
				<td>产区 | 酒庄</td>
				<td class="operate">操作</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach($wines as $wine):?>
			<tr>
				<td title="<img src='<?php echo $this->Format->getWineLogo($wine['Wine'])?>' />" class="title"><?php echo h($wine['Wine']['title_cn'])?> | <?php echo h($wine['Wine']['title_en'])?> | <?php echo h($wine['Wine']['year'])?></td>
				<td class="title">进口商中文名 | 进口商英文名</td>
				<td><?php echo h($countries[$wine['Wine']['country_id']])?> | 地区</td>
				<td><?php echo h($regions[$wine['Wine']['regions_id']])?> | <?php echo h($wineries[$wine['Wine']['winery_id']])?></td>
				<td class="operate">
					<a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $wine['Wine']['id']))?>" class="edit">编辑</a> 
					<a href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $wine['Wine']['id']))?>" class="delete">删除</a>
				</td>
			</tr>
			<?php endforeach;?>
		<tbody>
	</table>
	<div class="page">
		<?php echo $this->Form->create('Wine', array('type'=>'post', 'url'=>array('controller'=>'products', 'action'=>'index', 'admin'=>true, 'type'=>$type)));?>
		<?php echo $this->element('products/paginate')?>
		<?php echo $this->Form->select('year', $this->Format->setWineAge(), null, array('empty'=>'年份'))?>
		<?php echo $this->Form->select('country_id', $countries, null, array('empty'=>'国家'))?>
		<?php echo $this->Form->select('regions_id', $regions, null, array('empty'=>'产区'))?>
		<?php echo $this->Form->select('winery_id', $wineries, null, array('empty'=>'酒庄'))?>
    	<?php echo $this->Form->end();?>
	</div>
</div>
<?php echo $this->Html->script('admin/products/index')?>