<div id="content">
    <div class="tabRight">
        <div class="tabRightBox">
            <h3>下载附件</h3>
            <div class="downloadBox">
                <strong>唇裂患者提供正面照片，腭裂患者提供口腔内部照片</strong>
                <p>
                    <?php foreach($data['Attach0'] as $attach):?>
                    <a href="<?php echo $this->Format->getHelpAttachmentImage($attach, true)?>" target="_blank"><?php echo h($attach['banner_file_name'])?></a>
                    <?php endforeach;?>
                </p>
                <strong>家庭所在地区居委会或街道以上政府部门出具的贫困证明</strong>
                <p>
                    <?php foreach($data['Attach1'] as $attach):?>
                    <a href="<?php echo $this->Format->getHelpAttachmentImage($attach, true)?>" target="_blank"><?php echo h($attach['banner_file_name'])?></a>
                    <?php endforeach;?>
                </p>
                <strong>患者的出生证明或者身份证</strong>
                <p>
                    <?php foreach($data['Attach2'] as $attach):?>
                    <a href="<?php echo $this->Format->getHelpAttachmentImage($attach, true)?>" target="_blank"><?php echo h($attach['banner_file_name'])?></a>
                    <?php endforeach;?>
                </p>
                <strong>患者监护人的身份证</strong>
                <p>
                    <?php foreach($data['Attach3'] as $attach):?>
                    <a href="<?php echo $this->Format->getHelpAttachmentImage($attach, true)?>" target="_blank"><?php echo h($attach['banner_file_name'])?></a>
                    <?php endforeach;?>
                </p>
                <strong>当地县级以上医院的诊断报告</strong>
                <p>
                    <?php foreach($data['Attach4'] as $attach):?>
                    <a href="<?php echo $this->Format->getHelpAttachmentImage($attach, true)?>" target="_blank"><?php echo h($attach['banner_file_name'])?></a>
                    <?php endforeach;?>
                </p>
                <strong>血常规的检查结果</strong>
                <p>
                    <?php foreach($data['Attach5'] as $attach):?>
                    <a href="<?php echo $this->Format->getHelpAttachmentImage($attach, true)?>" target="_blank"><?php echo h($attach['banner_file_name'])?></a>
                    <?php endforeach;?>
                </p>
            </div>
        </div>
    </div>
    <div class="tabLeft">
        <table class="tab formDetail">
            <tr>
                <th>编号</th>
                <td>#<?php echo h($data['FormHelp']['id'])?></td>
            </tr>
            <tr>
                <th>患者姓名</th>
                <td><?php echo h($data['FormHelp']['name'])?></td>
            </tr>
            <tr>
                <th>性别</th>
                <td><?php echo h($data['FormHelp']['gender'])?></td>
            </tr>
            <tr>
                <th>出生日期</th>
                <td><?php echo $this->Format->toDate($data['FormHelp']['birthday'], 'Y年m月d日')?></td>
            </tr>
            <tr>
                <th>患者体重</th>
                <td><?php echo h($data['FormHelp']['weight'])?> KG</td>
            </tr>
            <!-- 
            <tr>
                <th>城市</th>
                <td>上海</td>
            </tr>
             -->
            <tr>
                <th>家庭地址</th>
                <td><?php echo h($data['FormHelp']['address'])?></td>
            </tr>
            <tr>
                <th>邮编</th>
                <td><?php echo h($data['FormHelp']['post'])?></td>
            </tr>
            <tr>
                <th>电话 / 手机</th>
                <td><?php echo h($data['FormHelp']['tel'])?> / <?php echo h($data['FormHelp']['mobile'])?></td>
            </tr>
            <tr>
                <th>户口类型</th>
                <td><?php echo h($data['FormHelp']['residence'])?></td>
            </tr>
            <tr>
                <th>监护人</th>
                <td><?php echo h($data['FormHelp']['gurdian'])?></td>
            </tr>
            <tr>
                <th>与患者关系</th>
                <td><?php echo h($data['FormHelp']['relation'])?></td>
            </tr>
            <tr>
                <th>患病类型</th>
                <td><?php echo h($data['FormHelp']['sick_type'])?></td>
            </tr>
            <tr>
                <th>已做过唇腭裂手术</th>
                <td><?php echo h($data['FormHelp']['sick_operation'])?></td>
            </tr>
            <tr>
                <th>其他病史</th>
                <td><?php echo h($data['FormHelp']['sick_history'])?></td>
            </tr>
            <tr>
                <th>备注</th>
                <td><?php echo nl2br(h($data['FormHelp']['comment']))?></td>
            </tr>
        </table>
    </div>
</div>