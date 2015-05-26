

<div class="admin_content fr">
	<h1>活动管理
	<?php 
	if(!$activity)
	{
		?>
		<a href="<?php echo site_url('admin/act_add'); ?>">新 增</a>
		<?php
	};
	?>
	</h1>
    <h2>
    	<span class="tab"></span>
    </h2>
    <table>
    	<thead>
        	<tr>
            <th>编号</th>
            <th>活动介绍</th>
            <th>投票说明</th>
            <th>投票机会</th>
            <th>操作</th>
            </tr>
        </thead>
        <tbody>
        	<?php foreach($activity as $row): ?>
            <tr>
            	<td><?php echo $row->aid; ?></td>
                <td><?php echo strip_tags(substr($row->introduction,0,120)).'...'; ?></td>
                <td><?php echo strip_tags(substr($row->requirement,0,120)).'...';?></td>
                <td><?php echo $row->chance; ?></td>
                <td><a href="<?php echo site_url('admin/act_editor'); ?>">编辑</a><a href="<?php echo site_url('admin/delete_act'); ?>" onclick="return confirm('删除后不可恢复，您确定要删除吗？')">删除</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p align="center">共 1 页</p>
</div>