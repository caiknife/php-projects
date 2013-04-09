<?php foreach($projects as $project):?>
<li><a href="<?php echo $this->Html->url(array('action'=>'connect', $newsId, $project['Project']['id']))?>" class="connect"><?php echo h($project['Project']['title_cn'])?> | <?php echo h($project['Project']['title_en'])?></a></li>
<?php endforeach;?>
