<a title="移除" href="<?php echo $this->Html->url(array('action'=>'disconnect_wine_grape', $item['id']))?>" ><?php echo h($grapeVarieties[$item['grape_varieties_id']])?>, <?php echo h(sprintf('%.2f', $item['percent']))?>%</a>