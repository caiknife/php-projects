<li>
	<strong><?php echo h($tastingNotes[$score['tasting_notes_id']])?></strong> 
	<a href="<?php echo $this->Html->url(array('action'=>'edit_tasting_score', 'admin'=>true, $score['id']))?>" class="edit_tasting_score">编辑</a> <a href="<?php echo $this->Html->url(array('action'=>'delete_tasting_score', 'admin'=>true, $score['id']))?>" class="delete_tasting_score">删除</a><br />
	酒色:<?php echo h(sprintf('%.2f', $score['score_color']))?> / 香气:<?php echo h(sprintf('%.2f', $score['score_aroma']))?> / 
	回味:<?php echo h(sprintf('%.2f', $score['score_aftertaste']))?> / 潜力:<?php echo h(sprintf('%.2f', $score['score_potential']))?><br />
	总分:<?php echo h($this->Format->getTotalScore($score))?>
</li>