<?php foreach($wines as $n => $wine):?>
<tr <?php if($n%2):?>class="bg"<?php endif;?>>
	<td class="title"><?php echo h($wine['Wine']['title_cn'])?></td>
	<td class="title"><?php echo h($wine['Wine']['title_en'])?></td>
	<td><?php echo h($wine['Region']['title'])?></td>
	<td><?php echo h($wine['Wine']['year'])?></td>
	<td><?php echo $this->Format->getWineScore($wine)?></td>
	<?php $this->Format->setCurrentMonthPriceAndRatio($wine)?>
	<td><?php if($wine['Wine']['current_month_price']):?><s>&yen;</s><?php echo h($wine['Wine']['current_month_price'])?><?php endif;?></td>
	<td><?php if($wine['Wine']['price_ratio']):?><span class="<?php echo $this->Format->getPriceRatioClass($wine['Wine']['price_ratio'])?>"><?php echo $this->Format->getPriceRadioDisplayValue($wine['Wine']['price_ratio'])?>%</span><?php else:?><span>-</span><?php endif;?></td>
</tr>
<?php endforeach;?>