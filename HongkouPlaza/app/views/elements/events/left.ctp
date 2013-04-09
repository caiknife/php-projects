<!--[if IE 6]>
<script type="text/javascript">DD_belatedPNG.fix('#main h2')</script>
<![endif]-->
<div id="left">
    <h2 class="tActivities">最新活动</h2>
    <ul class="submenu">
        <li <?php if($this->action=='index'):?>class="curr"<?php endif;?>><a href="<?php echo $this->Html->url(array('action'=>'index'))?>">全部</a></li>
        <li <?php if(($this->action=='lists' || $this->action=='detail') && $this->params['named']['cat']=='1'):?>class="curr"<?php endif;?>><a href="<?php echo $this->Html->url(array('action'=>'lists', 'cat'=>1))?>">促销</a></li>
        <li <?php if(($this->action=='lists' || $this->action=='detail') && $this->params['named']['cat']=='2'):?>class="curr"<?php endif;?>><a href="<?php echo $this->Html->url(array('action'=>'lists', 'cat'=>2))?>">活动</a></li>
        <li <?php if($this->action=='now'):?>class="curr"<?php endif;?>><a href="<?php echo $this->Html->url(array('action'=>'now'))?>">NOW GALLERY</a></li>
        <li <?php if($this->action=='review'):?>class="curr"<?php endif;?>><a href="<?php echo $this->Html->url(array('action'=>'review'))?>">回顾</a></li>
    </ul>
    <div id="cont"></div>
</div>
<?php echo $this->Html->script('jscal2', false)?>