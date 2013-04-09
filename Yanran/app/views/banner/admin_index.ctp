<div id="content">
    <h2>首页服务科室管理 <span>(可拖动列表排序,只显示前5张)</span></h2>
    <?php echo $this->Form->create('Banner', array('type'=>'file', 'url'=>array('controller'=>'banner', 'action'=>'add', 'admin'=>true)))?>
    <div class="page"></div>
    <div class="kvList indexPic">
        <ul>
            <?php foreach($banners as $banner):?>
            <li data="<?php echo $banner['Banner']['id']?>">
                <img title="拖动排序" src="<?php echo $this->Format->getBanner($banner['Banner'])?>" />
                <strong><?php echo h($banner['Banner']['title_cn'])?> | <?php echo h($banner['Banner']['title_en'])?></strong>
                <span><a href="<?php echo h($banner['Banner']['url'])?>" target="_blank"><?php echo h($banner['Banner']['url'])?></a></span>
                <a href="<?php echo $this->Html->url(array('action'=>'edit', $banner['Banner']['id']))?>" class="edit">编辑</a> 
                <a href="<?php echo $this->Html->url(array('action'=>'delete', $banner['Banner']['id']))?>" class="delete">删除</a>
            </li>
            <?php endforeach;?>
            <li class="add">
                <input title="上传图片 600px×320px" type="file" id="banner_pic" name="banner_pic" />
                <input title="标题 中文" type="text" id="banner_title_cn" name="banner_title_cn" />
                <input title="标题 英文" type="text" id="banner_title_en" name="banner_title_en" />
                <input title="链接" type="text" id="banner_url" name="banner_url" />
                <a href="#" class="add"><strong>添加</strong></a>
            </li>
        </ul>
    </div>
    <?php echo $this->Form->end()?>
</div>
<?php echo $this->Html->script('admin/banner/index')?>