<div id="main">
    <div class="subNav">
        <?php echo $this->element('volunteer/'.$lang.'_menu')?>
    </div>
    <div class="p_20">
        <div class="subVolunteer">
            <?php $volunteers = Configure::read('Volunteers')?>
            <?php foreach($volunteers[$lang] as $key=>$group):?>
            <a href="#" type="<?php echo $key?>"><em>◆</em><?php echo h($group)?></a> 
            <?php endforeach;?>
        </div>
        <?php foreach($data as $key=>$group):?>
        <ul class="volunteerList disn" type="<?php echo $key?>">
            <?php foreach($group as $volunteer):?>
            <li>
                <img src="<?php echo $this->Format->getVolunteerListImage($volunteer['Volunteer'])?>" alt="<?php echo h($volunteer['Volunteer']['name_'.$lang])?>" />
                <strong><?php echo h($volunteer['Volunteer']['name_'.$lang])?></strong>
                <span><?php echo h($volunteer['Volunteer']['desc_'.$lang])?></span>
            </li>
            <?php endforeach;?>
        </ul>
        <?php endforeach;?>
    </div>
</div>
<?php echo $this->Html->script('frontend/volunteer/volunteer')?>