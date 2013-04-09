<div id="content">
    <div class="mainPoster"><img src="<?php echo $this->Format->getBoard($board['Board'])?>" /><span class="tTeam"></span></div>
    <div class="main teamPage">
        <h2>医疗团队</h2>
        <ul>
            <?php foreach($teams as $team):?>
            <li id="team<?php echo $team['Team']['id']?>">
                <img src="<?php echo $this->Format->getTeam($team['Team'])?>" /><strong><?php echo h($team['Team']['name_'.$lang])?></strong> / <span><?php echo h($team['Team']['title_'.$lang])?></span>
                <p><?php echo nl2br(h($team['Team']['content_'.$lang]))?></p>
            </li>
            <?php endforeach;?>
        </ul>
    </div>
    <div class="sidebar">
        <div class="qLink"></div>
    </div>
</div>