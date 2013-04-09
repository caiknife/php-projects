<div id="content">
	<div id="main">
		<?php echo $this->element('events/left')?>
		<div id="right">
			<!--[if IE 6]>
				<script type="text/javascript">DD_belatedPNG.fix('.maySwitch a,.calendar i')</script>
			<![endif]-->
			<div class="maySwitch">
                <?php foreach($range as $item):?>
                    <a <?php if ($item['selected']):?>class="curr"<?php endif;?> href="<?php echo $this->Html->url(array('year'=>$item['year'], 'month'=>$item['month']))?>"><?php echo $item['month']?>月</a>
                <?php endforeach;?>
            </div>
			<div class="calendar">
				<ul class="thead">
					<li>星期日</li>
					<li>星期一</li>
					<li>星期二</li>
					<li>星期三</li>
					<li>星期四</li>
					<li>星期五</li>
					<li>星期六</li>
				</ul>
				<ul class="tbody">
                    <?php foreach($calendar as $day):?>                    
					<li <?php if(!$day['available']):?>class="notThis"<?php elseif($day['today']):?>class="today"<?php endif;?>>
                        <?php if($day['day']==1):?><?php echo $day['month']?>.<?php echo $day['day']?><?php else:?><?php echo $day['day']?><?php endif;?>
                        <?php if(sizeof($day['events']) > 0):?>
                        <a title="共有<?php echo sizeof($day['events'])?>个活动" class="total" href="#">(<?php echo sizeof($day['events'])?>)</a>
                        <div class="alogo">
                            <?php foreach($day['events'] as $event):?>
                            <a _title='<?php echo $this->element('events/related_link', array('event'=>$event))?>' href="<?php echo $this->Html->url(array('action'=>'detail', $event['Event']['id']))?>" title="<?php echo h($event['Event']['title'])?> -/ <?php echo $this->Format->toDate($event['Event']['start_date'])?> - <?php echo $this->Format->toDate($event['Event']['end_date'])?>">
                            	<img src="<?php echo $this->Format->showBrandLogoThumb($event)?>" />
                            	<i></i>
                            </a>
                            <?php endforeach;?>
                        </div>
                        <?php if(sizeof($day['events']) > 1):?>
                        <div class="alogoBtn">
                            <?php foreach($day['events'] as $i=>$event):?><span <?php if($i==0):?>class="curr"<?php endif;?>></span><?php endforeach;?>
                        </div>
                        <?php endif;?>
                        <?php endif;?>
                    </li>
                    <?php endforeach;?>
				</ul>
			</div>
		</div>
		<br clear="all" />
	</div>
</div>
<?php echo $this->Html->script('frontend/events/index', false)?>
<?php echo $this->Html->script('frontend/events/paginate', false)?>