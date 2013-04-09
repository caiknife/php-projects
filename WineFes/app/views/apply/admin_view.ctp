<div id="content">
    <table class="tab applicationDetail">
        <tr>
            <th>参展商</th>
            <td><?php echo h($application['Application']['title'])?></td>
        </tr>
        <tr>
            <th>地址</th>
            <td><?php echo h($application['Application']['address'])?></td>
        </tr>
        <tr>
            <th>联系人</th>
            <td><?php echo h($application['Application']['contactor'])?></td>
        </tr>
        <tr>
            <th>电话</th>
            <td><?php echo h($application['Application']['tel'])?></td>
        </tr>
        <tr>
            <th>手机</th>
            <td><?php echo h($application['Application']['mobile'])?></td>
        </tr>
        <tr>
            <th>经营范围</th>
            <td><?php echo h($application['Application']['business'])?></td>
        </tr>
        <tr>
            <th>诉求</th>
            <td><?php echo nl2br(h($application['Application']['comment']))?></td>
        </tr>
    </table>
</div>