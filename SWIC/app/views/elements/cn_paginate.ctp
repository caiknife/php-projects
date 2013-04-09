<?php if($this->Paginator->numbers()):?>
<div class="page">
    <span>页数 <strong><?php echo $this->Paginator->counter(array('format'=>'%page%/%pages%'))?></strong></span>
    <ul>
    	<?php if ($this->Paginator->first()):?>
        <?php echo $this->Paginator->first('首页', array('tag'=>'li', 'class'=>'first'))?>
        <?php else:?>
        <li class="first"><a class="none" href="#">首页</a></li>
        <?php endif;?>
        
        <?php if ($this->Paginator->hasPrev()):?>
        <?php echo $this->Paginator->prev('上一页', array('tag'=>'li', 'class'=>'previous'))?>
        <?php else:?>
        <li class="previous"><a class="none" href="#">上一页</a></li>
        <?php endif;?>
        
        <?php echo $this->Paginator->numbers(array('separator'=>'', 'tag'=>'li'))?>
        
        <?php if ($this->Paginator->hasNext()):?>
        <?php echo $this->Paginator->next('下一页', array('tag'=>'li', 'class'=>'next'))?>
        <?php else:?>
        <li class="next"><a class="none" href="#">下一页</a></li>
        <?php endif;?>
        
        <?php if ($this->Paginator->last()):?>
        <?php echo $this->Paginator->last('末页', array('tag'=>'li', 'class'=>'last'))?>
        <?php else:?>
        <li class="last"><a class="none" href="#">末页</a></li>
        <?php endif?>
    </ul>
</div>
<?php endif;?>