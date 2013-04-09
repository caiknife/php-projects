<dl>
    <dt>指数中心</dt>
    <dd>
        <ul>
            <li>
                <span <?php if($this->action=='cn_detail'):?>class="curr"<?php endif;?>>价格指数</span>
                <ul>
                    <?php foreach($wineType as $key=>$wine):?>
                    <li>
                        <a href="<?php echo $this->Html->url(array('action'=>'index', 'cn'=>true, 'type'=>$key))?>"><?php echo h($wine)?>指数</a>
                        <ul>
                            <?php 
                                App::import('Model', 'Subindex');
                                $subindex = new Subindex();
                                $subindexes = $subindex->getList($key); 
                            ?>
                            <?php if($subindexes):?>
                            <?php foreach($subindexes as $i=>$index):?>
                            <li><a href="<?php echo $this->Html->url(array('action'=>'detail', 'cn'=>true, 'type'=>$key, 'subtype'=>$i))?>" <?php if($subtype==$i):?>class="curr"<?php endif;?>><?php echo h($index)?></a></li>
                            <?php endforeach;?>
                            <?php endif;?>
                        </ul>
                    </li>
                    <?php endforeach;?>
                </ul>
            </li>
            <li><a <?php if($this->action=='cn_purchase'):?>class="curr"<?php endif;?> href="<?php echo $this->Html->url(array('action'=>'purchase', 'cn'=>true))?>">采购指数</a></li>
        </ul>
    </dd>
</dl>