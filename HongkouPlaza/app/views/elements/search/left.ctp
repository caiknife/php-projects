<!--[if IE 6]>
<script type="text/javascript">DD_belatedPNG.fix('#main h2')</script>
<![endif]-->
<div id="left">
    <h2 class="tSearch">品牌介绍</h2>
    <dl class="advancedSearchNav">
        <dt>品牌搜索</dt>
        <dd class="brandSearch">
        <?php echo $this->Form->create(false, array('type'=>'post', 'url'=>array('action'=>'searchbrands')))?>
            <?php echo $this->Form->select('Brand.floor', Configure::read('Brand.floor'), null, array('empty'=>'选择楼层'))?>
            <?php echo $this->Form->select('Brand.cate', Configure::read('Brand.cate'), null, array('empty'=>'品牌类型'))?>
            <?php echo $this->Form->text('Brand.title')?>
            <a class="btnSearch" href="#">搜索</a>
        <?php echo $this->Form->end()?>
        </dd>
        <dt>活动搜索</dt>
        <dd class="activitiesSearch">
        <?php echo $this->Form->create(false, array('type'=>'post', 'url'=>array('action'=>'searchevents')))?>
            <?php echo $this->Form->select('Event.cat', Configure::read('Event.cate'), null, array('empty'=>'活动类型'))?>
            <?php echo $this->Form->text('Event.title')?>
            <a class="btnSearch" href="#">搜索</a>
        <?php echo $this->Form->end()?>
        </dd>
    </dl>
</div>
<?php echo $this->Html->script('frontend/search/index')?>