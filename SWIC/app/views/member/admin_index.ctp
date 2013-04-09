<div id="content">
	<h2>会员管理 <span>(拖动排序)</span></h2>
	<form method="post">
	<div class="page">
		<?php echo $this->Form->select('type', Configure::read('Member.type'), null, array('empty'=>'请选择类别'))?>
	</div>
	<?php foreach($results as $key=>$result):?>
	<?php if($current==$key || !$current):?>
	<div class="memberList">
		<h3><?php echo h($teamType[$key])?></h3>
		<?php if($result):?>
		<ul>
			<?php foreach($result as $member):?>
			<li data="<?php echo $member['Member']['id']?>">
				<strong><?php echo h($member['Member']['title'])?></strong>
				<a href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $member['Member']['id']))?>" class="edit">编辑</a> 
				<a href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $member['Member']['id']))?>" class="delete">删除</a>
			</li>
			<?php endforeach;?>
			<li>
				<input type="text" title="会员名称" /> 
				<a data="<?php echo $key?>" href="#" class="add"><strong>添加</strong></a>
			</li>
		</ul>
		<?php endif;?>
	</div>
	<?php endif;?>
	<?php endforeach;?>
	</form>
</div>
<?php echo $this->Html->script('admin/member/index')?>