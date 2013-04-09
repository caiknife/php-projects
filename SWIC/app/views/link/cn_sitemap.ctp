<div id="content" class="indexCenter">
    <div class="sidebar">
        <dl>
            <dt>相关信息</dt>
            <dd>
                <ul>
                    <?php foreach($links as $link):?>
                    <li><a <?php if($link['Link']['id']==$block['Link']['id']):?>class="curr"<?php endif;?> href="<?php echo $this->Html->url(array('controller'=>'link', 'action'=>'view', 'cn'=>true, $link['Link']['id']))?>"><?php echo h($link['Link']['title'])?></a></li>
                    <?php endforeach;?>
                </ul>
            </dd>
        </dl>
        <div class="AdBox"><a href="#"><img src="/images/cn/ad_1.png" width="300" height="200" /></a></div>  
    </div>
    <div class="main">
        <div class="globalnav">
            <a class="home" href="<?php echo $this->Html->url(array('controller'=>'home', 'action'=>'index', 'cn'=>true))?>">首页</a>
            <span>相关信息</span>
            <a href="<?php echo $this->Html->url(array('action'=>'view', 'cn'=>true, $block['Link']['id']))?>"><?php echo h($block['Link']['title'])?></a>
        </div>
        <div class="siteMap">
            <ul>
                <li><a href="<?php echo $this->Html->url(array('controller'=>'home', 'action'=>'index', 'cn'=>true))?>">首页</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller'=>'index', 'action'=>'index', 'cn'=>true))?>">指数中心</a>
                    <ul>
                        <li><a href="<?php echo $this->Html->url(array('controller'=>'home', 'action'=>'index', 'cn'=>true))?>">价格指数</a>
                            <ul>
                                <?php foreach($wineType as $key=>$wine):?>                                
                                <li><a href="<?php echo $this->Html->url(array('controller'=>'index', 'action'=>'index', 'cn'=>true, 'type'=>$key))?>"><?php echo h($wine)?>指数</a></li>
                                <?php endforeach;?>
                            </ul>
                        </li>
                        <li><a href="<?php echo $this->Html->url(array('controller'=>'index', 'action'=>'purchase', 'cn'=>true))?>">采购指数</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo $this->Html->url(array('controller'=>'rating', 'action'=>'index', 'cn'=>true))?>">评级评分</a>
                    <ul>
                        <li><a href="<?php echo $this->Html->url(array('controller'=>'rating', 'action'=>'upcoming', 'cn'=>true))?>">待评预告</a></li>
                        <li><a href="<?php echo $this->Html->url(array('controller'=>'rating', 'action'=>'history', 'cn'=>true))?>">酒评历史</a></li>
                        <li><a href="<?php echo $this->Html->url(array('controller'=>'rating', 'action'=>'process', 'cn'=>true))?>">申报流程</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo $this->Html->url(array('controller'=>'news', 'action'=>'index', 'cn'=>true))?>">新闻资讯</a>
                    <ul>
                        <?php foreach($newsType as $key=>$news):?>
						<li><a href="<?php echo $this->Html->url(array('controller'=>'news', 'action'=>'lists', 'cn'=>true, 'type'=>$key))?>"><?php echo h($news)?></a></li>
						<?php endforeach;?>
                    </ul>
                </li>
                <li><a href="<?php echo $this->Html->url(array('controller'=>'member', 'action'=>'index', 'cn'=>true))?>">会员中心</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller'=>'about', 'action'=>'index', 'cn'=>true))?>">关于我们</a>
                    <ul>
                        <li><a href="<?php echo $this->Html->url(array('controller'=>'about', 'action'=>'index', 'cn'=>true))?>">中心简介</a></li>
                        <li><a href="<?php echo $this->Html->url(array('controller'=>'about', 'action'=>'department', 'cn'=>true))?>">评审团队</a></li>
                        <li><a href="<?php echo $this->Html->url(array('controller'=>'about', 'action'=>'partners', 'cn'=>true))?>">指导及合作单位</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo $this->Html->url(array('controller'=>'link', 'action'=>'index', 'cn'=>true))?>">相关信息</a>
                    <ul>
                        <?php foreach($links as $link):?>
                    <li><a href="<?php echo $this->Html->url(array('controller'=>'link', 'action'=>'view', 'cn'=>true, $link['Link']['id']))?>"><?php echo h($link['Link']['title'])?></a></li>
                    <?php endforeach;?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <br clear="all" />
</div>