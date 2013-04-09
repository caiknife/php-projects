<div id="content">
    <table class="tab formDetail">
        <tr>
            <th>编号</th>
            <td>#<?php echo h($data['FormVolunteer']['id'])?></td>
        </tr>
        <tr>
            <th>身份证号</th>
            <td><?php echo h($data['FormVolunteer']['identity'])?></td>
        </tr>
        <tr>
            <th>姓名</th>
            <td><?php echo h($data['FormVolunteer']['name'])?></td>
        </tr>
        <tr>
            <th>性别</th>
            <td><?php echo h($data['FormVolunteer']['gender'])?></td>
        </tr>
        <tr>
            <th>年龄</th>
            <td><?php echo h($data['FormVolunteer']['age'])?>岁</td>
        </tr>
        <tr>
            <th>民族</th>
            <td><?php echo h($data['FormVolunteer']['race'])?></td>
        </tr>
        <!-- 
        <tr>
            <th>城市</th>
            <td>上海</td>
        </tr>
         -->
        <tr>
            <th>家庭地址</th>
            <td><?php echo h($data['FormVolunteer']['address'])?></td>
        </tr>
        <tr>
            <th>邮编</th>
            <td><?php echo h($data['FormVolunteer']['post'])?></td>
        </tr>
        <tr>
            <th>电话 / 手机</th>
            <td><?php echo h($data['FormVolunteer']['tel'])?> / <?php echo h($data['FormVolunteer']['mobile'])?></td>
        </tr>
        <tr>
            <th>职业</th>
            <td><?php echo h($data['FormVolunteer']['job'])?></td>
        </tr>
        <tr>
            <th>邮箱</th>
            <td><?php echo h($data['FormVolunteer']['email'])?></td>
        </tr>
        <tr>
            <th>教育程度</th>
            <td><?php echo h($data['FormVolunteer']['degree'])?></td>
        </tr>
        <tr>
            <th>教育经历</th>
            <td><?php echo h($data['FormVolunteer']['education'])?></td>
        </tr>
        <tr>
            <th>工作经历</th>
            <td><?php echo nl2br(h($data['FormVolunteer']['work_history']))?></td>
        </tr>
        <tr>
            <th>是否有伤残/病例</th>
            <td><?php echo h($data['FormVolunteer']['has_sick'])?></td>
        </tr>
        <tr>
            <th>病历</th>
            <td><?php echo h($data['FormVolunteer']['has_sick_comment'])?></td>
        </tr>
        <tr>
            <th>是否有志愿者经验</th>
            <td><?php echo h($data['FormVolunteer']['has_volunteer'])?></td>
        </tr>
        <tr>
            <th>志愿者经验描述</th>
            <td><?php echo h($data['FormVolunteer']['has_volunteer_comment'])?></td>
        </tr>
        <tr>
            <th>志愿者服务内容</th>
            <td><?php echo h($data['FormVolunteer']['service'])?></td>
        </tr>
        <tr>
            <th>预计服务期限</th>
            <td><?php echo h($data['FormVolunteer']['service_term'])?></td>
        </tr>
        <tr>
            <th>适合服务时间</th>
            <td><?php echo h($data['FormVolunteer']['service_time'])?></td>
        </tr>
        <tr>
            <th>信息途径</th>
            <td><?php echo h($data['FormVolunteer']['via'])?></td>
        </tr>
    </table>
</div>