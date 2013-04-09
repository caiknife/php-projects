<?php if ($this->Paginator->hasPrev()):?>
<?php echo $this->Paginator->prev('PREV', array('class'=>'prev'))?>
<?php endif;?>

<?php echo $this->Paginator->numbers(array('separator'=>'/'))?>

<?php if ($this->Paginator->hasNext()):?>
<?php echo $this->Paginator->next('NEXT', array('class'=>'next'))?>
<?php endif;?>