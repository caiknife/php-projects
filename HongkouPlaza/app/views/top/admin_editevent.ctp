<div id="containerHolder">
    <div id="container">
        <div id="sidebar">
            <ul class="sideNav">
                <li><a href="<?php echo $this->Html->url(array('action'=>'index', 'admin'=>true))?>">首页海报 </a></li>
                <li><a href="<?php echo $this->Html->url(array('action'=>'brands', 'admin'=>true))?>">潮流品牌</a></li>
                <li><a class="active" href="<?php echo $this->Html->url(array('action'=>'calendar', 'admin'=>true))?>">活动日历</a></li>
            </ul>
            <!-- // .sideNav -->
        </div>    
        <!-- // #sidebar -->
        <div id="main">
            <?php echo $this->Form->create(null, array('type'=>'file', 'class'=>'jNice', 'url'=>array('action'=>'updateevent', 'admin'=>true)))?>
            	<?php echo $this->Form->hidden('HomeEvent.id')?>
                <?php echo $this->Form->hidden('HomeEvent.image')?>
                <div class="posters_edit">
                    <h3>必填信息</h3>
                    <fieldset>
                        <?php echo $this->Html->image('/attachments/photos/origin/'.$this->data['HomeEvent']['image'], array('alt'=>$this->data['HomeEvent']['description']))?>
                        <p>
                        	<label>上传小图 <span>宽:260px 高:60px</span></label>
                        	<?php echo $this->Form->file('HomeEvent.upload', array('class'=>'text-long'))?>
                        	<?php echo $this->Form->error('HomeEvent.upload')?>
                        </p>
                    </fieldset>
                </div>
                <div class="posters_right">
                    <h3>选填信息</h3>
                    <fieldset>
                        <p>
                        	<label>自定义连接</label>
                        	<?php echo $this->Form->text('HomeEvent.url', array('class'=>'text-long'))?>
                        	<?php echo $this->Form->error('HomeEvent.url')?>
                        </p>
                        <p>
                        	<label>文字描述</label>
                        	<?php echo $this->Form->textarea('HomeEvent.description', array('rows'=>1, 'cols'=>1))?>
                        </p>
                    </fieldset>
                </div><br clear="all" />
                <input type="submit" value="提交信息" />
            <?php echo $this->Form->end()?>
        </div>
        <!-- // #main -->
        <div class="clear"></div>
    </div>
    <!-- // #container -->
</div>  
<!-- // #containerHolder -->