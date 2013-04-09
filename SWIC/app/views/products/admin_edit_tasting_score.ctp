<?php echo $this->Form->select('Edit'.$id.'TastingScore.year', $years, $thisYear, array('empty'=>false))?> 
<?php echo $this->Form->select('EditTastingScore'.$id.'.tasting_notes_id', $notes, null, array('empty'=>false))?> 
<?php echo $this->Form->text('EditTastingScore'.$id.'.score_color', array('title'=>'酒色', 'style'=>'color:#999', ))?> 
<?php echo $this->Form->text('EditTastingScore'.$id.'.score_aroma', array('title'=>'香气', 'style'=>'color:#999', ))?> 
<?php echo $this->Form->text('EditTastingScore'.$id.'.score_aftertaste', array('title'=>'回味', 'style'=>'color:#999', ))?> 
<?php echo $this->Form->text('EditTastingScore'.$id.'.score_potential', array('title'=>'潜力', 'style'=>'color:#999', ))?> 
<a href="#" class="cancel_tasting_score">取消</a> 
<a href="<?php echo $this->Html->url(array('action'=>'save_tasting_score', 'admin'=>'true', $id))?>" class="save_tasting_score"><strong>保存</strong></a>