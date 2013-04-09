<div id="content">
	<h2>合作方管理 <span>(拖动排序)</span> <a href="<?php echo $this->Html->url(array('action'=>'add', 'admin'=>'true'))?>">添加</a></h2>
	<form method="post">
	<div class="page">
		<?php echo $this->Form->select('type', Configure::read('Partner.type'), null, array('empty'=>'请选择类别'))?>
	</div>
	<?php foreach($results as $key=>$result):?>
	<?php if($current==$key || !$current):?>
	<div class="cooperationList">
		<h3><?php echo h($teamType[$key])?></h3>
		<?php if($result):?>
		<ul>
			<?php foreach($result as $partner):?>
			<li data="<?php echo $partner['Partner']['id']?>">
				<img src="<?php echo $this->Format->getPartnerLogo($partner['Partner'])?>" /><strong><?php echo h($partner['Partner']['title'])?></strong>
				<a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $partner['Partner']['id']))?>">编辑</a> 
				<a href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $partner['Partner']['id']))?>" class="delete">删除</a>
			</li>
			<?php endforeach;?>
		</ul>
		<?php endif;?>
	</div>
	<?php endif;?>
	<?php endforeach;?>
	</form>
</div>
<?php echo $this->Html->script('admin/partners/index')?>