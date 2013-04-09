<div id="content">
    <div class="sidebar">
        <h2>酒节服务</h2>
        <ul>
            <?php echo $this->element('service/cn_menu')?>
        </ul>
        <?php echo $this->element('cn_quicklink')?>
    </div>
    <div class="main">
        <div class="mainbav"><a class="home" href="/">首页</a><span>酒节服务</span><strong>参展在线申请</strong></div>
        <?php echo $this->Form->create('Application', array('type'=>'file', 'url'=>array('controller'=>'apply', 'action'=>'post', 'cn'=>true)))?>
        <div class="applicationDown">
                    请下载 <a class="download" href="/download/apply_2012.doc">申请表</a> 发送至传真：021-56433919 或 邮箱：<a href="mailto:akas.ge@shwpi.org">akas.ge@shwpi.org</a>，我们将尽快与您取得联系。
        </div>        
        <table class="applicationTab">
            <tr>
                <th>参展商</th>
                <td><?php echo $this->Form->text('title', array('valid'=>1))?></td>
            </tr>
            <tr>
                <th>地址</th>
                <td><?php echo $this->Form->text('address', array('valid'=>1))?></td>
            </tr>
            <tr>
                <th>联系人</th>
                <td><?php echo $this->Form->text('contactor', array('style'=>'width:180px', 'valid'=>1))?></td>
            </tr>
            <tr>
                <th>座机</th>
                <td><?php echo $this->Form->text('tel', array('style'=>'width:180px', 'valid'=>1))?></td>
            </tr>
            <tr>
                <th>手机</th>
                <td><?php echo $this->Form->text('mobile', array('style'=>'width:180px', 'valid'=>1))?></td>
            </tr>
            <tr>
                <th>经营范围</th>
                <td><?php echo $this->Form->textarea('business', array('valid'=>1))?></td>
            </tr>
            <tr>
                <th>诉求</th>
                <td><?php echo $this->Form->textarea('comment')?></td>
            </tr>
            <tr>
                <th>&nbsp;</th>
                <td class="submit"><button class="submit">提交</button> <button class="reset">重置</button></td>
            </tr>
        </table>
        <?php echo $this->Form->end()?>
    </div>
</div>
<?php echo $this->Html->script('frontend/service/apply')?>