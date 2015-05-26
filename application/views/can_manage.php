

<div class="admin_content fr">
    <h1>投票项管理
	<?php if($act_num)
	{
		?>
		<a href="<?php echo site_url('admin/can_add'); ?>">新增</a>
		<?php
	}
	?>
	</h1>
    <table>
    	<thead>
        	<tr>
            <th>编号</th>
            <th>姓名</th>
            <th>图片预览</th>
            <th>所在院系</th>
            <th>人物简介</th>
			<th>得票数</th>
            <th>操作</th>
            </tr>
        </thead>
        <tbody>
        	<?php  $i=0;	
			foreach($candidate as $row): 
				if($i >= 4) break;
				$i++;
			?>
            <tr>
            	<td><?php echo $row->pid;?></td>
                <td><?php echo $row->name;?></td>
                <td><img src="<?php echo base_url('/upload/'."$row->img"); ?>" title="<?php echo $row->name; ?>" height=96 width=120 /></td>
                <td><?php echo $row->department;?></td>
                <td><?php echo substr($row->introduction,0,120); ?></td>
				<td><?php echo $row->votes; ?></td>
                <td><a href="<?php echo site_url('/admin/can_editor/'."$row->pid"); ?>">编辑</a><a href="<?php echo site_url('/admin/change_img/'."$row->pid"); ?>">更换图片</a><a href="<?php echo site_url('/admin/delete_can/'."$row->pid") ?>" onclick="return confirm('删除后不可恢复，您确定要删除吗？')">删除</a></td>
            </tr>
            <?php endforeach; ?>		
        </tbody>
    </table>
	<p align="center"><?php echo $this->pagination->create_links(); ?></p>
</div>
