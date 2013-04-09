<div id="content">
    <div class="mainPoster"><img src="<?php echo $this->Format->getBoard($board['Board'])?>" /><span class="tAbout"></span></div>
    <div class="main aboutPage">
        <h2>RESERVATION</h2>
        <div class="online">
            <?php echo $this->element('flash')?>
            <?php echo $this->Form->create('Reservation', array('type'=>'post', 'lang'=>$lang, 'url'=>array('controller'=>'reservation', 'action'=>'post')))?>
                <div class="a input">
                    <strong>Title</strong>
                    <?php $genders = Configure::read('Reservation.gender')?>
                    <?php echo $this->Form->radio('gender', $genders[$lang], array('require'=>true, 'legend'=>false, 'value'=>'Boy'))?>
                </div>
                <table>
                    <tr>
                        <td><div class="b input"><strong>Name</strong> <?php echo $this->Form->text('name', array('require'=>true))?></div></td>
                        <td><div class="b input"><strong>Birth Date</strong> <?php echo $this->Form->text('birthday', array('require'=>true))?></div></td>
                    </tr>
                </table>
                <div class="c input">
                    <strong>City / Address / Post Code</strong> 
                    <?php $cities = Configure::read('Reservation.city')?>
                    <?php echo $this->Form->select('city', $cities[$lang], array('require'=>true), array('empty'=>false))?>
                    <?php echo $this->Form->text('address', array('class'=>'long', 'require'=>true))?>
                    <?php echo $this->Form->text('post', array('class'=>'short', 'require'=>true))?>
                </div>
                <table>
                    <tr>
                        <td><div class="b input"><strong>Phone</strong> <?php echo $this->Form->text('tel', array('require'=>true))?></div></td>
                        <td><div class="b input"><strong>E-mail</strong> <?php echo $this->Form->text('email', array('require'=>true))?></div></td>
                    </tr>
                    <tr>
                        <td><div class="b input"><strong>Department</strong> <?php echo $this->Form->text('department', array('require'=>true))?></div></td>
                        <td><div class="b input"><strong>Doctor</strong> <?php echo $this->Form->text('doctor', array('require'=>true))?></div></td>
                    </tr>
                </table>
                <div class="b input">
                    <strong>Reservation Date</strong>
                    <?php echo $this->Form->text('reserved_date', array('require'=>true))?>
                    <?php $times = Configure::read('Reservation.time')?> 
                    <?php echo $this->Form->select('reserved_time', $times[$lang], array('require'=>true), array('empty'=>false))?> 
                </div>
                <div class="c input"><strong>Remarks</strong> <?php echo $this->Form->textarea('comment')?></div>
                <div class="e input">
                    <strong>Information Source</strong> 
                    <?php $vias = Configure::read('Reservation.via')?>
                    <?php foreach($vias[$lang] as $key=>$val):?>
                    <label><?php echo $this->Form->checkbox('via_'.$key)?><?php echo h($val)?></label>
                    <?php if($key==4):?>
                    <div class="clear"></div>
                    <?php endif;?>
                    <?php endforeach;?>
                </div>
                <div class="submit"><input type="submit" value="Submit" /><input type="reset" value="Reset" /></div>
            <?php echo $this->Form->end()?>
        </div>
    </div>
    <div class="sidebar">
        <div class="qLink"></div>
    </div>
</div>
<?php echo $this->Html->css('ui-lightness/jquery-ui-1.8.16.custom', 'stylesheet', array('media'=>'screen', 'inline'=>false));?>
<?php echo $this->Html->script('jquery.ui.datepicker-zh-CN')?>
<?php echo $this->Html->script('jquery.jqtransform')?>
<?php echo $this->Html->script('frontend/reservation/index')?>