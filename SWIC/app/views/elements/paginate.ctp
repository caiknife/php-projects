<span>共<?php echo $this->Paginator->counter(array('format'=>'%count%'))?>条数据</span>

<?php if ($this->Paginator->first()):?>
<?php echo $this->Paginator->first('«')?>
<?php endif;?>

<?php if ($this->Paginator->hasPrev()):?>
<?php echo $this->Paginator->prev('‹')?> 
<?php endif;?>

页数 <?php echo $this->Paginator->counter(array('format'=>'%page%/%pages%'))?>

<?php if ($this->Paginator->hasNext()):?> 
<?php echo $this->Paginator->next('›')?>
<?php endif;?>

<?php if ($this->Paginator->last()):?>
<?php echo $this->Paginator->last('»')?>
<?php endif;?>

<?php echo $this->Form->text('Page.page')?><a class="btnGo" href="#">GO</a>