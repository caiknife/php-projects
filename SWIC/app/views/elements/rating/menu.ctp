<dl>
    <dt>评级评分</dt>
    <dd>
        <ul>
            <li><a <?php if($this->action=='cn_upcoming'):?>class="curr"<?php endif;?> href="<?php echo $this->Html->url(array('controller'=>'rating', 'action'=>'upcoming', 'cn'=>true))?>">待评预告</a></li>
            <li><a <?php if($this->action=='cn_history' || $this->action=='cn_detail' || $this->action=='cn_lists'):?>class="curr"<?php endif;?> href="<?php echo $this->Html->url(array('action'=>'history', 'cn'=>true))?>">酒评历史</a>
                <ul id="history">
                    <?php foreach($years as $key=>$val):?>
                    <li><a <?php if(isset($year)&& $year==$val):?>class="curr"<?php endif;?> href="<?php echo $this->Html->url(array('action'=>'lists', 'cn'=>true, 'year'=>$val))?>"><?php echo h($val)?>年</a></li>
                    <?php endforeach;?>
                </ul>
            </li>
            <li><a <?php if($this->action=='cn_process'):?>class="curr"<?php endif;?> href="<?php echo $this->Html->url(array('controller'=>'rating', 'action'=>'process', 'cn'=>true))?>">申报流程</a></li>
        </ul>
    </dd>
</dl>