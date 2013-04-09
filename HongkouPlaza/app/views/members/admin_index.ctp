<div id="containerHolder">
	<div id="container">
        <div id="main" class="main">
			<?php echo $this->Form->create('Member', array('class'=>'jNice', 'type'=>'post', 'url'=>array('action'=>'index', 'admin'=>true)))?>
				<fieldset>
					<dl class="search">
						<dd>
							<label>电子邮箱</label>
							<?php echo $this->Form->text('email', array('class'=>'text-medium'))?>
						</dd>
						<dd class="small">
							<label>性别</label>
							<?php $gender = Configure::read('Member.gender')?>
							<?php echo $this->Form->select('gender', Configure::read('Member.gender'), null, array('empty'=>'选择'))?>						
						</dd>
						<dd class="medium">
							<label>岁数</label>
							<?php $age = array('<18'=>'18岁以下', '18-25'=>'18-25岁', '25-35'=>'25-35岁', '35-55'=>'35-55岁', '>55'=>'55岁以上')?>
							<?php echo $this->Form->select('age', $age, null, array('empty'=>'选择'))?>
						</dd>
						<dd class="medium">
							<label>区/县</label>
							<?php echo $this->Form->select('district', Configure::read('Member.district'), null, array('empty'=>'选择'))?>
						</dd>
						<dd class="medium">
							<label>最后登入时间</label>
							<?php $login_date = array('today'=>'今天', 'week'=>'本周', 'month'=>'本月', '3months'=>'3个月未登入')?>
							<?php echo $this->Form->select('last_login_time', $login_date, null, array('empty'=>'选择'))?>
						</dd>
						<dd class="medium">
							<label>订阅数量</label>
							<?php $subscribe = array('none'=>'没有订阅', '<10'=>'10个以下', '<30'=>'30个以下', '>30'=>'30个以上')?>
							<?php echo $this->Form->select('subscribe', $subscribe, null, array('empty'=>'选择'))?>
						</dd>
						<dd class="submti"><input type="submit" value="搜 索" /></dd>
						<dd class="add"><button type="button" onclick="window.open('<?php echo $csv_url?>')"><span><span>导出CSV列表</span></span></button></dd>
					</dl>
				</fieldset>
			<?php echo $this->Form->end();?>
			<table class="member_list">
				<thead>
					<tr>
						<td>ID</td>
						<td>电子邮箱</td>
						<td>昵称</td>
						<td>性别</td>
						<td>手机 | 座机</td>
						<td>地址</td>
						<td width="95">最后登入IP</td>
						<td width="100">最后登入时间</td>
						<td width="100" class="action">品牌订阅</td>
					</tr>
				</thead>
				<?php foreach ($members as $member):?>
                <?php if (isset($member['User'])) {$index = 'User';} else {$index = 0;}?>
				<tr>
					<td><?php echo $member[$index]['id']?></td>
					<td><?php echo h($member[$index]['email'])?></td>
					<td><?php echo h($member[$index]['nickname'])?></td>
					<td><?php if($member[$index]['gender']):?><?php echo $gender[$member[$index]['gender']]?><?php endif;?></td>
					<td><?php echo $member[$index]['mobile']?> <?php if ($member[$index]['mobile'] && $member[$index]['phone']):?>|<?php endif;?> <?php echo $member[$index]['phone']?></td>
					<td><?php echo h($member[$index]['address'])?></td>
					<td><?php echo $member[$index]['last_login_ip']?></td>
					<td><?php echo $member[$index]['last_login_time']?></td>
					<td class="action"><span title="<?php echo h($this->Format->showBrands($member['Brand']))?>">查看(<?php echo sizeof($member['Brand'])?>)</span></td>
				</tr>
				<?php endforeach;?>
			</table>
			<div class="flip">
				<?php echo $this->Paginator->numbers(array('separator'=>''))?>
			</div>					
        </div>
        <!-- // #main -->
        <div class="clear"></div>
    </div>
    <!-- // #container -->
</div>	
<!-- // #containerHolder -->