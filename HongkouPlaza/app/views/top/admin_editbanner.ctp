<div id="containerHolder">
    <div id="container">
        <div id="sidebar">
            <ul class="sideNav">
                <li><a class="active" href="<?php echo $this->Html->url(array('action'=>'index', 'admin'=>true))?>">首页海报 </a></li>
                <li><a href="<?php echo $this->Html->url(array('action'=>'brands', 'admin'=>true))?>">潮流品牌</a></li>
                <li><a href="<?php echo $this->Html->url(array('action'=>'calendar', 'admin'=>true))?>">活动日历</a></li>
            </ul>
            <!-- // .sideNav -->
        </div>    
        <!-- // #sidebar -->
        <div id="main">
            <?php echo $this->Form->create(null, array('type'=>'file', 'class'=>'jNice', 'url'=>array('action'=>'updatebanner', 'admin'=>true)))?>
                <?php echo $this->Form->hidden('HomeBanner.id')?>
                <?php echo $this->Form->hidden('HomeBanner.image')?>
                <div class="posters_edit">
                    <h3>必填信息</h3>
                    <fieldset>
                        <?php echo $this->Html->image('/attachments/photos/origin/'.$this->data['HomeBanner']['image'], array('alt'=>$this->data['HomeBanner']['description']))?>
                        <p>
                            <label>上传海报 <span>宽:720px 高:420px</span></label>
                            <?php echo $this->Form->file('HomeBanner.upload', array('class'=>'text-long'))?>
                            <?php echo $this->Form->error('HomeBanner.upload')?>
                        </p>
                    </fieldset>
                </div>
                <div class="posters_right">
                    <h3>选填信息</h3>
                    <fieldset>
                        <p>
                        	<label>自定义链接</label>
                        	<?php echo $this->Form->text('HomeBanner.url', array('class'=>'text-long'))?>
                        	<?php echo $this->Form->error('HomeBanner.url')?>
                        </p>
                        <p>
                        	<label>文字描述</label>
                        	<?php echo $this->Form->textarea('HomeBanner.description', array('rows'=>1, 'cols'=>1))?>
                        </p>
                    </fieldset>
                </div>
                <br clear="all" />
                <input type="submit" value="提交信息" />
            <?php echo $this->Form->end()?>
        </div>
        <!-- // #main -->
        <div class="clear"></div>
    </div>
    <!-- // #container -->
</div>  
<!-- // #containerHolder -->
