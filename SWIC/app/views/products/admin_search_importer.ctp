<?php foreach($importers as $importer):?>
<li><a href="<?php echo $this->Html->url(array('action'=>'set_importer', 'admin'=>true, $importer['Importer']['id']))?>" title="<?php echo h($importer['Importer']['title_cn'])?>"><?php echo h($importer['Importer']['title_cn'])?></a></li>
<?php endforeach;?>