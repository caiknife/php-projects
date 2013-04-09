<div id="content">
    <table class="tab applicationDetail">
        <tr>
            <th>性别</th>
            <td><?php echo h($item['Reservation']['gender'])?></td>
        </tr>
        <tr>
            <th>姓名</th>
            <td><?php echo h($item['Reservation']['name'])?></td>
        </tr>
        <tr>
            <th>生日</th>
            <td><?php echo $this->Format->toDate($item['Reservation']['birthday'], 'Y年m月d日')?></td>
        </tr>
        <tr>
            <th>城市/地址/邮编</th>
            <td><?php echo h($item['Reservation']['address'])?>/<?php echo h($item['Reservation']['address'])?>/<?php echo h($item['Reservation']['post'])?></td>
        </tr>
        <tr>
            <th>电话</th>
            <td><?php echo h($item['Reservation']['tel'])?></td>
        </tr>
        <tr>
            <th>电邮</th>
            <td><?php echo h($item['Reservation']['email'])?></td>
        </tr>
        <tr>
            <th>科室</th>
            <td><?php echo h($item['Reservation']['department'])?></td>
        </tr>
        <tr>
            <th>医师</th>
            <td><?php echo h($item['Reservation']['doctor'])?></td>
        </tr>
        <tr>
            <th>预约日期</th>
            <td><?php echo $this->Format->toDate($item['Reservation']['reserved_date'], 'Y年m月d日')?></td>
        </tr>
        <tr>
            <th>预约时间</th>
            <td><?php echo h($item['Reservation']['reserved_time'])?></td>
        </tr>
        <tr>
            <th>备注</th>
            <td><?php echo h($item['Reservation']['comment'])?></td>
        </tr>
        <tr>
            <th>途径</th>
            <td><?php echo h($item['Reservation']['via'])?></td>
        </tr>
        <tr>
            <th>提交时间</th>
            <td><?php echo $this->Format->toDate($item['Reservation']['created'], 'Y年m月d日 H:i')?></td>
        </tr>
    </table>
</div>