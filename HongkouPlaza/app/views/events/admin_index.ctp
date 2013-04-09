<div id="containerHolder">
	<div id="container">
        <div id="main" class="main">
			<?php echo $this->Form->create('Event', array('class'=>'jNice', 'type'=>'post', 'url'=>array('action'=>'index', 'admin'=>true)))?>
				<fieldset>
					<dl class="search">
						<dd>
							<label>活动名称</label>
							<?php echo $this->Form->text('title', array('class'=>'text-medium'))?>
						</dd>
						<dd>
							<label>活动时间</label>
							<?php $range = array('1'=>'本周', '2'=>'本月')?>
							<?php echo $this->Form->select('date', $range, null, array('empty'=>'全部'))?>
						</dd>
						<dd>
							<label>活动类型</label>
							<?php echo $this->Form->select('cat', Configure::read('Event.cate'), null, array('empty'=>'全部'))?>
						</dd>
						<dd class="submti"><input type="submit" value="搜 索" /></dd>
						<dd class="add">
							<button type="button" onclick="window.location='<?php echo $this->Form->url(array('action'=>'new', 'admin'=>true))?>';"><span><span>添加一个活动</span></span></button>
						</dd>
					</dl>
				</fieldset>
			<?php echo $this->Form->end();?>
			<ul class="activities_list">
				<?php foreach($events as $event):?>
				<li>
					<?php echo $this->Html->image('/attachments/photos/event_image_thumb/'.$event['Event']['image'], array('width'=>224, 'height'=>105))?>
					<h3><?php echo h($event['Event']['title'])?></h3>
					<span><?php echo $event['Event']['start_date']?> - <?php echo $event['Event']['end_date']?></span>
					<strong><?php echo h($event['Event']['intro'])?></strong>
					<a class="edit" title="编辑" href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $event['Event']['id']))?>">编辑</a>
					<a class="delete" title="删除" href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $event['Event']['id']))?>">删除</a>
				</li>
				<?php endforeach;?>
			</ul>
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
<?php echo $this->Html->script('admin/events/index')?>