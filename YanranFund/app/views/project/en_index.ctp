<div id="main">
    <ul class="projectList_01">
        <?php foreach($projects as $project):?>
        <li>
            <a href="<?php echo $this->Html->url(array('action'=>'view', $project['Project']['id']))?>"><img alt="<?php echo h($project['Project']['title_'.$lang])?>" src="<?php echo $this->Format->getProjectListImage($project['Project'])?>" width="160" height="120" /></a>
            <strong><a href="<?php echo $this->Html->url(array('action'=>'view', $project['Project']['id']))?>"><?php echo h($project['Project']['title_'.$lang])?></a></strong>
            <span><em><?php echo $this->Format->toDate($project['Project']['created'], 'Y.m.d')?></em></span>
            <p><?php echo h($project['Project']['desc_'.$lang])?></p>
        </li>
        <?php endforeach;?>
    </ul>
    <div class="clear"></div>
    <div class="pageBar">
        <?php echo $this->element('plan/'.$lang.'_paginate')?>
    </div>
</div>