<div id="content">
    <div class="sidebar">
        <h2>酒节服务</h2>
        <ul>
            <?php echo $this->element('service/cn_menu')?>
        </ul>
        <?php echo $this->element('cn_quicklink')?>
    </div>
    <div class="main">
        <div class="mainbav"><a class="home" href="/">首页</a><span>酒节服务</span><strong>合作票务公司</strong></div>
        <div class="workTicketList">
            <ul>
                <?php foreach($partners as $partner):?>
                <li>
                    <div>
                        <a href="<?php echo $partner['Partner']['url']?>" target="_blank">
                            <img src="<?php echo $this->Format->getPartner($partner['Partner'])?>" alt="<?php echo h($partner['Partner']['title'])?>">
                        </a>
                     </div>
                    <strong><?php echo h($partner['Partner']['title'])?></strong>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>