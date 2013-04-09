<div id="containerHolder">
	<div id="container">
        <div id="main" class="main">
			<?php echo $this->Form->create('News', array('class'=>'jNice', 'type'=>'post', 'url'=>array('action'=>'index')))?>
				<fieldset>
					<dl class="search">
						<dd>
							<label>标题</label>
							<?php echo $this->Form->text('title', array('class'=>'text-medium'))?>
						</dd>
						<dd>
							<label>年份</label>
							<?php $range = range(2009, date('Y'))?>
							<?php echo $this->Form->select('year', array_combine($range, $range), null, array('empty'=>'全部'))?>
						</dd>
						<dd>
							<label>类型</label>
							<?php echo $this->Form->select('cat', Configure::read('News.cate'), null, array('empty'=>'全部'))?>
						</dd>
						<dd class="submti"><input type="submit" value="搜 索" /></dd>
						<dd class="add">
							<button type="button" onclick="window.location='<?php echo $this->Form->url(array('action'=>'new', 'admin'=>true))?>';"><span><span>添加一条新闻</span></span></button>
						</dd>
					</dl>
				</fieldset>
			<?php echo $this->Form->end()?>
			<ul class="news_list">
				<?php foreach($news as $item):?>
				<li>
					<?php if($item['News']['image']):?>
					<img src="/attachments/photos/news_image/<?php echo $item['News']['image']?>" />
					<?php endif;?>
					<h3><?php echo h($item['News']['title'])?></h3>
					<span><?php if($item['News']['source']): ?><?php echo $item['News']['source']?> |<?php endif;?> <?php echo $item['News']['date']?></span>
					<a class="edit" title="编辑" href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $item['News']['id']))?>">编辑</a>
					<a class="delete" title="删除" href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $item['News']['id']))?>">删除</a>
				</li>
				<?php endforeach;?>
			</ul>
			<div class="flip">
				<?php echo $this->Paginator->numbers(array('separator'=>''))?>
			</div>					
        </div>
        <?php echo $this->Html->script('admin/news/index')?>
        <!-- // #main -->
        <div class="clear"></div>
    </div>
    <!-- // #container -->
</div>	
<!-- // #containerHolder -->