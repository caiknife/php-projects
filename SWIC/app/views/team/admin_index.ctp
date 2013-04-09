<div id="content">
	<h2>中国酒类商品评审委员会 <span>(拖动排序)</span> <a href="<?php echo $this->Html->url(array('action'=>'add', 'admin'=>'true'))?>">添加</a></h2>
	<form method="post">
	<div class="page">
		<?php echo $this->Form->select('type', Configure::read('ReviewTeam.type'), null, array('empty'=>'请选择类别'))?>
	</div>
	<?php foreach($results as $key=>$result):?>
	<?php if($current==$key || !$current):?>
	<div class="separtmentList">
		<h3><?php echo h($teamType[$key])?></h3>
		<?php if($result):?>
		<ul>
			<?php foreach($result as $team):?>
			<li data="<?php echo $team['ReviewTeam']['id']?>">
				<img src="<?php echo $this->Format->getTeamAvatar($team['ReviewTeam'])?>" /><strong><?php echo h($team['ReviewTeam']['title'])?></strong>
				<a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $team['ReviewTeam']['id']))?>">编辑</a> 
				<a href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $team['ReviewTeam']['id']))?>" class="delete">删除</a>
			</li>
			<?php endforeach;?>
		</ul>
		<?php endif;?>
	</div>
	<?php endif;?>
	<?php endforeach;?>
	</form>
</div>
<?php echo $this->Html->script('admin/team/index')?>