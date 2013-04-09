<div id="content">
    <div class="sidebar">
        <h2>酒节服务</h2>
        <ul>
            <?php echo $this->element('service/cn_menu')?>
        </ul>
        <?php echo $this->element('cn_quicklink')?>   
    </div>
    <div class="main">
        <div class="mainbav"><a class="home" href="/">首页</a><span>酒节服务</span><strong>餐饮旅店</strong></div>
        <div id="Cms">
            <?php echo $article['Article']['content']?>
        </div>
    </div>
</div>