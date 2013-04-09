<div id="containerHolder">
    <div id="container">
        <div id="main" class="main">
            <?php echo $this->Form->create('Brand', array('class'=>'jNice', 'type'=>'post', 'url'=>array('action'=>'index', 'admin'=>true)));?>
                <fieldset>
                    <dl class="search">
                        <dd>
                            <label>商铺名称</label>
                        	<?php echo $this->Form->text('title', array('class'=>'text-medium'))?>
                        </dd>
                        <dd>
                            <label>商铺类型</label>
                            <?php echo $this->Form->select('cate', $categories, null, array('empty'=>'全部'))?>
                        </dd>
                        <dd>
                            <label>楼层</label>
                            <?php echo $this->Form->select('floor', Configure::read('Brand.floor'), null, array('empty'=>'全部'))?>
                        </dd>
                        <dd>
                        	<label>楼层编号</label>
                        	<?php echo $this->Form->text('guide_id', array('class'=>'text-small'))?>
                        </dd>
                        <dd class="submti"><input type="submit" value="搜 索" /></dd>
                        <dd class="add">
                       		<button type="button" onclick="window.location='<?php echo $this->Form->url(array('action'=>'new', 'admin'=>true))?>';"><span><span>添加一个品牌</span></span></button>
                       	</dd>
                    </dl>
                </fieldset>
            <?php echo $this->Form->end();?>
            <ul class="brand_list">
            	<?php foreach ($brands as $brand):?>
                <li <?php if(!$brand['Brand']['is_display']):?>class="hide"<?php endif;?>>
                    <?php echo $this->Html->image('/attachments/photos/brand_logo/'.$brand['Brand']['logo'], array('width'=>80, 'height'=>80))?>
                    <h3><?php if ($brand['Brand']['title']) { echo h($brand['Brand']['title']); } else { echo h($brand['Brand']['title_en']); }?></h3>
                    <span><?php echo $brand['Brand']['shop_id']?></span>
                    <a class="edit" title="编辑" href="<?php echo $this->Html->url(array('action'=>'edit', 'admin'=>true, $brand['Brand']['id']))?>">编辑</a>
                    <a class="delete" title="删除" href="<?php echo $this->Html->url(array('action'=>'delete', 'admin'=>true, $brand['Brand']['id']))?>">删除</a>
                </li>
            	<?php endforeach;?>
            </ul>
            <div class="flip">
            	<?php echo $this->Paginator->numbers(array('separator'=>''))?>
            </div>                    
        </div>
        <?php echo $this->Html->script('admin/brands/index', false)?>
        <!-- // #main -->
        <div class="clear"></div>
    </div>
    <!-- // #container -->
</div>  
<!-- // #containerHolder -->
