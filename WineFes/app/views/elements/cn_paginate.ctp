<?php if($this->Paginator->numbers()):?>

<?php if ($this->Paginator->hasPrev()):?>
<?php echo $this->Paginator->prev('上一页', array('class'=>'prev'))?>
<?php endif;?>

<?php echo $this->Paginator->numbers(array('separator'=>'', 'first'=>2, 'last'=>2, 'modulus'=>5))?>

<?php if ($this->Paginator->hasNext()):?>
<?php echo $this->Paginator->next('下一页', array('class'=>'next'))?>
<?php endif;?>

<?php endif;?>