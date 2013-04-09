<div id="main">
    <div class="subNav">
        <?php echo $this->element('hospital/'.$lang.'_menu')?>
    </div>
    <div class="hospitalDetail">
        <h2><?php echo $sblock['Sblock']['title_'.$lang]?></h2>
        <div id="Cms">
            <?php echo $sblock['Sblock']['content_'.$lang]?>
        </div>
    </div>
    <div class="clear"></div>
    <div class="toTopWrap"><a class="toTop" href="#content">回到顶部</a></div>
</div>