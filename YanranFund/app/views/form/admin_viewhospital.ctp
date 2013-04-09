<div id="content">
    <table class="tab formDetail">
        <tr>
            <th>编号</th>
            <td>#<?php echo h($data['FormHospital']['id'])?></td>
        </tr>
        <tr>
            <th>机构名称</th>
            <td><?php echo h($data['FormHospital']['title'])?></td>
        </tr>
        <tr>
            <th>申报人</th>
            <td><?php echo h($data['FormHospital']['name'])?></td>
        </tr>
        <tr>
            <th>电话 / 手机</th>
            <td><?php echo h($data['FormHospital']['tel'])?> / <?php echo h($data['FormHospital']['mobile'])?></td>
        </tr>
        <!-- 
        <tr>
            <th>城市</th>
            <td>上海</td>
        </tr>
        <tr>
            <th>地址</th>
            <td>长宁区 定西路727号2号楼3A</td>
        </tr>
        <tr>
            <th>邮编</th>
            <td>200001</td>
        </tr>
         -->
        <tr>
            <th>患者数量</th>
            <td><?php echo h($data['FormHospital']['patients_amount'])?></td>
        </tr>
        <tr>
            <th>手术数量</th>
            <td><?php echo h($data['FormHospital']['operation_amount'])?></td>
        </tr>
        <tr>
            <th>结算周期</th>
            <td><?php echo h($data['FormHospital']['period'])?></td>
        </tr>
        <tr>
            <th>结算金额</th>
            <td><?php echo h($data['FormHospital']['fee_amount'])?>元</td>
        </tr>
        <tr>
            <th>已减免手术量及金额</th>
            <td><?php echo h($data['FormHospital']['discount_amount'])?>元</td>
        </tr>
        <tr>
            <th>备注</th>
            <td><?php echo nl2br(h($data['FormHospital']['comment']))?></td>
        </tr>
        <tr>
            <th>附件下载</th>
            <td>
                <?php if($data['FormHospital']['banner_file_path']):?>
                <a href="/attachments/files/<?php echo $data['FormHospital']['banner_file_path']?>">下载</a>
                <?php else:?>
                                无
                <?php endif;?>
            </td>
        </tr>
    </table>
</div>