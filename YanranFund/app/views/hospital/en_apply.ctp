<div id="main">
    <div class="subNav">
        <?php echo $this->element('hospital/'.$lang.'_menu')?>
    </div>
    <div class="p_20">
        <div id="Cms">
            <?php echo $sblock['Sblock']['content_'.$lang]?>
        </div>
    </div>
    <div style="display:none">
        <div id="HospitalApply" class="fromStyle">
            <h3>Online submitting</h3>
            <?php echo $this->Form->create('FormHospital', array('type'=>'file', 'url'=>array('controller'=>'form', 'action'=>'hospital')))?>
                <?php $formHospital = Configure::read('FormHospital')?>
                <fieldset class="c1">
                    <div>
                        <label>Institution Name<?php echo $this->Form->text('title', array('class'=>'long', 'require'=>true))?></label>
                    </div>
                    <div>
                        <label>Declarer <?php echo $this->Form->text('name', array('require'=>true))?></label>
                        <label>Phone <?php echo $this->Form->text('tel', array('require'=>true))?></label>
                        <label>Mobile <?php echo $this->Form->text('mobile', array('require'=>true))?></label>
                        <label>Email <?php echo $this->Form->text('email', array('require'=>true))?></label>
                    </div>
                    <div>
                        <label>Quantity of Patients <?php echo $this->Form->text('patients_amount', array('require'=>true))?></label>
                        <label>Quantity of Operations <?php echo $this->Form->text('operation_amount', array('require'=>true))?></label>
                        <label>Billing Cycle <?php echo $this->Form->text('period', array('require'=>true))?></label>
                    </div>
                    <div>
                        <label>Amount<?php echo $this->Form->text('fee_amount', array('require'=>true))?></label>
                        <label>Quantity and Amount of Remissions<?php echo $this->Form->text('discount_amount', array('require'=>true))?></label>
                    </div>
                </fieldset>
                <fieldset>Remarks <?php echo $this->Form->textarea('comment', array('require'=>true))?></fieldset>
                <fieldset class="upload">
                    <p>上传结算申请、结算统计表和病患者病例资料（请把文件打包上传，文件最大不超过5M,仅支持.zip; .rar格式）</p>
                    <input type="file" name="banner" id="banner" /> 
                    <button class="button_logo" url="<?php echo $this->Html->url(array('controller'=>'form', 'action'=>'upload'))?>">上传</button> 
                    <img id="loading_logo" src="/images/loading.gif" width="100" height="15" class="disn" />
                    <a class="download disn" href="#">Download</a>
                    <?php echo $this->Form->hidden('banner_file_path')?>
                </fieldset>
                <a class="btn1 fancybox2" href="#SubmitPop"><span>Submit</span></a> <a class="btn2 close" href="#"><span>Cancel</span></a>
            <?php echo $this->Form->end();?>
        </div>
        <div id="SubmitPop" class="fromStyle">
            <h3>Online submitting</h3>
            <h4>申请已经提交，我们将尽快与您取得联系</h4>
            <p>(<span class="count">5</span>)秒后返回首页 <a class="btn1 home" href="/en"><span>Confirm</span></a> <a class="btn2 close" href="#"><span>Cancel</span></a></p>
        </div>
    </div>
</div>
<?php echo $this->Html->script('jquery.fancybox.pack')?>
<?php echo $this->Html->script('ajaxfileupload')?>
<?php echo $this->Html->script('frontend/hospital/apply', false)?>