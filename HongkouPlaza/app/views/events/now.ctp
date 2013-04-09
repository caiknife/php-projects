<div id="content">
    <div id="main">
        <?php echo $this->element('events/left')?>
        <div id="right">
            <div class="activitiesList" id="event_content">
                <ul>
                    <?php foreach($events as $event):?>
                    <li>
                        <a href="<?php echo $this->Html->url(array('action'=>'detail', $event['Event']['id']))?>" _title='<?php echo $this->element('events/related_link', array('event'=>$event))?>' >
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
<?php echo $this->Html->script('frontend/events/paginate', false)?>