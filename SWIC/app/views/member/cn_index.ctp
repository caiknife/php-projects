<div id="content">
    <div class="memberBox">
        <?php foreach($results as $key=>$result):?>        
        <div class="plateBox" id="part<?php echo $key?>">
            <h3><span><?php echo h($teamType[$key])?></span></h3>
            <ul class="memberList">
                <?php foreach($result as $member):?>
                <li><?php echo h($member['Member']['title'])?></li>
                <?php endforeach;?>
            </ul>
        </div>
        <?php endforeach;?>
    </div>
    <br clear="all" />
</div>