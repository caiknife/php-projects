<?php if ($this->Paginator->hasPrev()):?>
<?php echo $this->Paginator->prev('<i></i>', array('class'=>'prev', 'escape'=>false))?>
<?php endif;?>

<?php echo $this->Paginator->numbers(array('separator'=>'', 'first'=>2, 'last'=>2, 'modulus'=>5))?>

<?php if ($this->Paginator->hasNext()):?>
<?php echo $this->Paginator->next('<i></i>', array('class'=>'next', 'escape'=>false))?>
<?php endif;?>