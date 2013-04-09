<div id="main">
    <div class="subNav">
        <?php echo $this->element('help/'.$lang.'_menu')?>
    </div>
    <div class="p_20">
        <div id="Cms">
            <?php echo $hblock['Hblock']['content_'.$lang]?>            
        </div>
    </div>
    <div style="display:none">
        <div id="HelpApply" class="fromStyle">
            <h3>网上申请求助</h3>
            <?php echo $this->Form->create('FormHelp', array('type'=>'file', 'url'=>array('controller'=>'form', 'action'=>'help')))?>
                <?php $formHelp = Configure::read('FormHelp')?>
                <fieldset class="c1">
                    <div>
                        <label>患者姓名<?php echo $this->Form->text('name', array('require'=>true))?></label>
                        <label>性别<?php echo $this->Form->select('gender', $formHelp[$lang]['gender'], null, array('empty'=>false))?></label>
                        <label>出生日期<?php echo $this->Form->text('birthday', array('require'=>true))?></label>
                        <label>体重<?php echo $this->Form->text('weight', array('class'=>'short', 'require'=>true))?> kg</label>
                    </div>
                    <div>
                        <label>家庭地址<?php echo $this->Form->text('address', array('class'=>'long', 'require'=>true))?></label>
                        <label>邮编<?php echo $this->Form->text('post', array('require'=>true))?></label>
                    </div>
                    <div>
                        <label>座机电话<?php echo $this->Form->text('tel')?></label>
                        <label>手机<?php echo $this->Form->text('mobile', array('require'=>true))?></label>
                                                户口类型 <?php echo $this->Form->radio('residence', $formHelp[$lang]['residence'], array('legend'=>false))?>
                    </div>
                    <div>
                        <label>监 护 人 <?php echo $this->Form->text('gurdian', array('require'=>true))?></label>
                        <label>与患者的关系<?php echo $this->Form->text('relation', array('require'=>true))?></label>
                    </div>
                </fieldset>
                <fieldset>
                    <p>患病类型：</p>
                    <?php echo $this->Form->radio('sick_type', $formHelp[$lang]['sick_type'], array('legend'=>false))?>
                </fieldset>
                <fieldset>
                    <p>是否已做过唇腭裂手术？</p>
                    <?php echo $this->Form->radio('sick_operation', $formHelp[$lang]['sick_operation'], array('legend'=>false))?>
                </fieldset>
                <fieldset>
                    <p>是否有其他病史（心血管系统、呼吸系统、血液系统、传染病等）</p>
                    <?php echo $this->Form->radio('sick_history', $formHelp[$lang]['sick_history'], array('legend'=>false))?>
                </fieldset>
                <fieldset class="uploadBox" url="<?php echo $this->Html->url(array('controller'=>'upload', 'action'=>'helpupload'))?>">
                    <p>附件上传</p>
                    <div class="con">
                        <span>唇裂患者提供正面照片，腭裂患者提供口腔内部照片 <i style="display:none"></i></span>
                        <div><span id="spanButtonPlaceholder0"></span></div>
                        <div class="loading disn"><img src="/images/loading.gif"></div>
                    </div>
                    <div class="con">
                        <span>家庭所在地区居委会或街道以上政府部门出具的贫困证明 <i style="display:none"></i></span>                        
                        <div><span id="spanButtonPlaceholder1"></span></div>
                        <div class="loading disn"><img src="/images/loading.gif"></div>
                    </div>
                    <div class="con">
                        <span>患者的出生证明或者身份证 <i style="display:none"></i></span>
                        <div><span id="spanButtonPlaceholder2"></span></div>
                        <div class="loading disn"><img src="/images/loading.gif"></div>
                    </div>
                    <div class="con">
                        <span>患者监护人的身份证 <i style="display:none"></i></span>
                        <div><span id="spanButtonPlaceholder3"></span></div>
                        <div class="loading disn"><img src="/images/loading.gif"></div>
                    </div>
                    <div class="con">
                        <span>当地县级以上医院的诊断报告 <i style="display:none"></i></span>
                        <div><span id="spanButtonPlaceholder4"></span></div>
                        <div class="loading disn"><img src="/images/loading.gif"></div>
                    </div>
                    <div class="con">
                        <span>血常规的检查结果 <i style="display:none"></i></span>
                        <div><span id="spanButtonPlaceholder5"></span></div>
                        <div class="loading disn"><img src="/images/loading.gif"></div>
                    </div>
                </fieldset>
                <fieldset>备注<?php echo $this->Form->textarea('comment')?></fieldset>
                <a class="btn1 fancybox2" href="#SubmitPop"><span>提交申请</span></a> <a class="btn2 close" href="#"><span>取消</span></a>
            <?php echo $this->Form->end();?>
        </div>
        <div id="SubmitPop" class="fromStyle">
            <h3>网上申请求助</h3>
            <h4>申请已完成，感谢您对嫣然天使基金的信任，请等待我们的通知。</h4>
            <p>(<span class="count">5</span>)秒后返回首页 <a class="btn1 home" href="/cn"><span>确定</span></a> <a class="btn2 close" href="#"><span>取消</span></a></p>
        </div>
    </div>
</div>
<?php echo $this->Html->css('ui-lightness/jquery-ui-1.8.16.custom', 'stylesheet', array('media'=>'screen', 'inline'=>false));?>
<?php echo $this->Html->script('jquery.ui.datepicker-zh-CN')?>
<?php echo $this->Html->script('jquery.fancybox.pack')?>
<?php echo $this->Html->script(array('/swfupload/swfupload.js', '/swfupload/swfupload.queue.js', '/swfupload/fileprogress.js'))?>
<?php echo $this->Html->script('frontend/help/handler')?>
<?php echo $this->Html->script('frontend/help/apply')?>