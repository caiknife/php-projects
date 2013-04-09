<div id="content">
    <div id="main">
        <?php echo $this->element('search/left')?>
        <div id="right">
            <h2 class="advancedSearch">搜索 “<?php echo $keyword?>”共产生 <?php echo $this->Paginator->counter(array('format'=>'%count%'))?> 条结果</h2>
            <!--搜索结果格式HTML 品牌参考：brand.html； 活动参考：activities_list.html-->
            <div class="activitiesList" id="result_content">
                <ul>
                    <?php foreach($events as $event):?>
					<li>
						<a href="<?php echo $this->Html->url(array('controller'=>'events', 'action'=>'detail', $event['Event']['id']))?>" >
							<img src="/attachments/photos/event_image_thumb/<?php echo $event['Event']['image']?>" />
                            <strong><?php echo h($event['Event']['title'])?></strong>
                            <small><?php echo $this->Format->toDate($event['Event']['start_date'])?> - <?php echo $this->Format->toDate($event['Event']['end_date'])?></small>
                            <span><?php echo h($event['Event']['title_sub'])?></span>
						</a>
					</li>
                    <?php endforeach;?>
				</ul>
            </div>
            <?php echo $this->element('events/paginate')?>
        </div>
        <br clear="all" />
    </div>
</div>