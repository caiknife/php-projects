<div id="idTransformView">
    <ul id="idSlider">
        <!-- 最多5张 -->
        <?php foreach($banners as $banner):?>
        <li>
            <?php if($banner['Banner']['url']):?>
            <a href="<?php echo $banner['Banner']['url']?>" target="_blank" title="<?php echo h($banner['Banner']['title'])?>"><img src="<?php echo $this->Format->getBanner($banner['Banner'])?>" alt="<?php echo h($banner['Banner']['title'])?>" /></a>
            <?php else:?>
            <img src="<?php echo $this->Format->getBanner($banner['Banner'])?>" alt="<?php echo h($banner['Banner']['title'])?>" />
            <?php endif;?>
        </li>
        <?php endforeach;?>
    </ul>
    <div id="idNum"></div>
    <i class="s1"></i>
    <i class="s2"></i>
</div>
<?php echo $this->Html->script('jquery.SliderShow')?>