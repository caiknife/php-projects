<?php foreach($results as $note):?>
<li class="historyList">
    <h4><a href="<?php echo $this->Html->url(array('action'=>'detail', 'cn'=>true, $note['TastingNotes']['id']))?>"><?php echo h($note['TastingNotes']['title'])?></a></h4>
    <div class="overview">
        <ul>
            <li>评审日期：<?php echo $this->Format->toDate($note['TastingNotes']['date_time'], 'Y年m月d日')?></li>
            <li>评审场地：<?php echo h($note['TastingNotes']['address'])?></li>
            <li>品酒数量：<?php echo sizeof($note['TastingScore'])?>款</li>
        </ul>
        <p><?php echo $this->Text->truncate(strip_tags($note['TastingNotes']['content']), 100)?></p>
    </div>
</li>
<?php endforeach;?>