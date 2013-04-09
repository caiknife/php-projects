<div id="content">
    <div id="main">
        <?php echo $this->element('brands/left')?>
        <div id="right">
            <div class="logoList" id="content">
            <!--[if IE 6]>
            <script type="text/javascript">DD_belatedPNG.fix('.logoList i')</script>
            <![endif]-->
                <!-- 当前ul为第二页,翻页使用AJAX,左右偏移760px -->
                <ul>
                <?php foreach ($brands as $brand):?>
                    <li>
                        <a title="<?php echo h($brand['Brand']['title'])?> <?php echo h($brand['Brand']['title_en'])?>" href="<?php echo $this->Html->url(array('action'=>'detail', $brand['Brand']['id']))?>">
                        	<img src="/attachments/photos/brand_logo/<?php echo $brand['Brand']['logo']?>" alt="<?php echo h($brand['Brand']['title'])?> <?php echo h($brand['Brand']['title_en'])?>" /><i></i>
                        </a>
                        <strong><?php if ($brand['Brand']['title']) { echo h($brand['Brand']['title']); } else { echo h($brand['Brand']['title_en']); }?></strong>
                        <span><?php echo h($brand['Brand']['shop_id'])?></span>
                    </li>
                <?php endforeach;?>
                </ul>
            </div>
            <?php echo $this->element('brands/paginate')?>
        </div>
        <br clear="all" />
    </div>
</div>
<?php echo $this->Html->script('frontend/brands/paginate', false)?>