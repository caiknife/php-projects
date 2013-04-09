<div id="content">
    <div class="sidebar">
        <h2>酒节概况</h2>
        <ul>
            <?php foreach($blocks as $key=>$val):?>
            <li <?php if($key==$block['Block']['id']):?>class="curr"<?php endif;?>>
                <a href="<?php echo $this->Html->url(array('action'=>'view', 'cn'=>true, $key))?>"><?php echo h($val)?></a>
            </li>
            <?php endforeach;?>
        </ul>
        <?php echo $this->element('cn_quicklink')?>   
    </div>
    <div class="main">
        <div class="mainbav"><a class="home" href="/">首页</a><span>酒节概况</span><strong><?php echo h($block['Block']['title'])?></strong></div>
        <div class="planList">
            <!-- 
            缩略图:宽度220，高度自适应
            弹出图：1000*1000，宽高等比缩放，不用留白边
            下载图：后台上传原图
            
            请屏蔽鼠标移动到连接上浮出title信息，可以问下小苏
            -->
            <?php foreach($plans as $plan):?>
            <li>
                <a _fbtitle="<a href='<?php echo $this->Format->getPlan($plan['Plan'], 'origin')?>'>下载<?php echo h($plan['Plan']['title'])?></a>" href="<?php echo $this->Format->getPlan($plan['Plan'], 'big')?>">
                    <img src="<?php echo $this->Format->getPlan($plan['Plan'])?>" /><?php echo h($plan['Plan']['title'])?>
                </a>
            </li>
            <?php endforeach;?>
        </div>
    </div>
</div>
<?php echo $this->Html->script('jquery.fancybox.pack')?>
<script type="text/javascript">
    $(document).ready(function() {
        $(".planList li a").fancybox({padding:0, openEffect:'elastic', openSpeed:250, closeEffect:'elastic', closeSpeed:150, closeClick:true});
    });
</script>