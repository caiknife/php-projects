<?php if ($this->Paginator->hasPrev()):?>
<?php echo $this->Paginator->prev('上一页', array('class'=>'prev'))?>
<?php endif;?>

<?php echo $this->Paginator->numbers(array('separator'=>'/'))?>

<?php if ($this->Paginator->hasNext()):?>
<?php echo $this->Paginator->next('下一页', array('class'=>'next'))?>
<?php endif;?>