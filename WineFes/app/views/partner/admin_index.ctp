<div id="content">
    <h2>合作票务公司及链接 <span>(可拖动列表排序)</span></h2>
    <?php echo $this->Form->create('Partner', array('type'=>'file', 'url'=>array('controller'=>'partner', 'action'=>'add', 'admin'=>true)))?>
    <div class="page"></div>
    <div class="kvList workTicketList">
        <ul>
            <?php foreach($partners as $partner):?>
            <li data="<?php echo $partner['Partner']['id']?>">
                <div><img src="<?php echo $this->Format->getPartner($partner['Partner'])?>" title="拖动排序"></div>
                <strong><?php echo h($partner['Partner']['title'])?></strong>
                <span><a href="<?php echo $partner['Partner']['url']?>" target="_blank"><?php echo $partner['Partner']['url']?></a></span>
                <a href="<?php echo $this->Html->url(array('action'=>'edit', $partner['Partner']['id']))?>" class="edit">编辑</a> 
				<a href="<?php echo $this->Html->url(array('action'=>'delete', $partner['Partner']['id']))?>" class="delete">删除</a>
            </li>
            <?php endforeach;?>
            <li class="add">
                <input title="上传图片 200px×100px" type="file" id="banner_pic" name="banner_pic" />
                <input title="标题" type="text" id="banner_title" name="banner_title" />
                <input title="链接" type="text" id="banner_url" name="banner_url" />
                <a href="#" class="add"><strong>添加</strong></a>
            </li>
        </ul>
    </div>
    <?php echo $this->Form->end()?>
</div>
<?php echo $this->Html->script('ajaxfileupload')?>
<?php echo $this->Html->script('admin/partner/index')?>