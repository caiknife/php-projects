<div id="main">
    <div class="subNav">
        <?php echo $this->element('volunteer/'.$lang.'_menu')?>
    </div>
    <div class="p_20">
        <div id="Cms">
            <?php echo $vblock['Vblock']['content_'.$lang]?>
        </div>
    </div>
    <div style="display:none">
        <div id="VolunteerApply" class="fromStyle">
            <h3>Volunteer recruitment</h3>
            <?php echo $this->Form->create('FormVolunteer', array('type'=>'file', 'url'=>array('controller'=>'form', 'action'=>'volunteer')))?>
                <?php $formVolunteer = Configure::read('FormVolunteer')?>
                <fieldset class="c1">
                    <div>
                        <label>Name<?php echo $this->Form->text('name', array('require'=>true))?></label>
                        <label>ID number<?php echo $this->Form->text('identity', array('class'=>'slightly', 'require'=>true))?></label>
                        <label>Gender<?php echo $this->Form->select('gender', $formVolunteer[$lang]['gender'], null, array('empty'=>false))?></label>
                        <label>Age<?php echo $this->Form->text('age', array('class'=>'short', 'require'=>true))?></label>
                        <label>Nation<?php echo $this->Form->text('race', array('class'=>'short', 'require'=>true))?></label>
                    </div>
                    <div>
                        <label>Address<?php echo $this->Form->text('address', array('class'=>'long', 'require'=>true))?></label>
                        <label>Postcode<?php echo $this->Form->text('post', array('require'=>true))?></label>
                    </div>
                    <div>
                        <label>Phone<?php echo $this->Form->text('tel', array('require'=>true))?></label>
                        <label>Mobile<?php echo $this->Form->text('mobile', array('require'=>true))?></label>
                        <label>Occupation<?php echo $this->Form->text('job', array('require'=>true))?></label>
                        <label>Email<?php echo $this->Form->text('email', array('require'=>true))?></label>
                    </div>
                    <div>
                        <label>Academic Degree
                            <?php echo $this->Form->select('degree', $formVolunteer[$lang]['degree'], null, array('empty'=>false))?>
                            <?php echo $this->Form->text('education', array('class'=>'long', 'style'=>'color:#999', 'value'=>'Education', 'require'=>true))?>
                        </label>
                    </div>
                </fieldset>
                <fieldset>Work Experience<?php echo $this->Form->textarea('work_history', array('require'=>true))?></fieldset>
                <fieldset class="radioLine">Injured or Disabled?
                    <?php echo $this->Form->radio('has_sick', $formVolunteer[$lang]['has_sick'], array('legend'=>false, 'value'=>$formVolunteer[$lang]['no']))?>
                    <?php echo $this->Form->textarea('has_sick_comment', array('require'=>true))?>
                </fieldset>
                <fieldset class="radioLine">Experienced as volunteer?
                    <?php echo $this->Form->radio('has_volunteer', $formVolunteer[$lang]['has_volunteer'], array('legend'=>false, 'value'=>$formVolunteer[$lang]['no']))?>
                    <?php echo $this->Form->textarea('has_volunteer_comment', array('require'=>true))?>
                </fieldset>
                <fieldset class="checkboxLine">
                    <p>Description of experience</p>
                    <?php foreach($formVolunteer[$lang]['service'] as $key=>$val):?>
                    <label>
                        <input id="service<?php echo $key?>" name="service[<?php echo $key?>]" type="checkbox" class="checkbox" value="<?php echo $key?>" /><?php echo h($val)?>
                        <?php if($key==3):?>
                        <?php echo $this->Form->text('service_translate', array('value'=>'language'))?>
                        <?php elseif($key==4):?>
                        <?php echo $this->Form->text('service_other')?>
                        <?php endif;?>
                    </label>
                    <?php endforeach;?>
                </fieldset>
                <fieldset class="checkboxLine">
                    <p>Estimated Service Period</p>
                    <?php foreach($formVolunteer[$lang]['service_term'] as $key=>$val):?>
                    <label>
                        <input id="term<?php echo $key?>" name="term[<?php echo $key?>]" type="checkbox" class="checkbox" value="<?php echo $key?>" /><?php echo h($val)?>
                        <?php if($key==4):?>
                        <?php echo $this->Form->text('term_other')?>
                        <?php endif;?>
                    </label>
                    <?php endforeach;?>
                </fieldset>
                <fieldset class="checkboxLine">
                    <p>Proper Service Time</p>
                    <?php foreach($formVolunteer[$lang]['service_time'] as $key=>$val):?>
                    <label>
                        <input id="time<?php echo $key?>" name="time[<?php echo $key?>]" type="checkbox" class="checkbox" value="<?php echo $key?>" /><?php echo h($val)?>
                    </label>
                    <?php endforeach;?>
                </fieldset>
                <fieldset class="checkboxLine">
                    <p>Information Source</p>
                    <?php foreach($formVolunteer[$lang]['via'] as $key=>$val):?>
                    <label>
                        <input id="via<?php echo $key?>" name="via[<?php echo $key?>]" type="checkbox" class="checkbox" value="<?php echo $key?>" /><?php echo h($val)?>
                        <?php if($key==9):?>
                        <?php echo $this->Form->text('via_other')?>
                        <?php endif;?>
                    </label>
                    <?php if($key==6):?>
                    <br />
                    <?php endif?>
                    <?php endforeach;?>
                </fieldset>
                <a class="btn1 fancybox2" href="#SubmitPop"><span>Submit</span></a> <a class="btn2 close" href="#"><span>Cancel</span></a>
            <?php echo $this->Form->end();?>
        </div>
        <div id="SubmitPop" class="fromStyle">
            <h3>Volunteer recruitment</h3>
            <h4>申请已经提交，我们将尽快与您取得联系</h4>
            <p>(<span class="count">5</span>)秒后返回首页 <a class="btn1 home" href="/en"><span>Confirm</span></a> <a class="btn2 close" href="#"><span>Cancel</span></a></p>
        </div>
    </div>
</div>
<?php echo $this->Html->script('jquery.fancybox.pack')?>
<?php echo $this->Html->script('frontend/volunteer/apply', false)?>