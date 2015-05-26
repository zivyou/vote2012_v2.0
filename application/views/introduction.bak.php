
<!--投票专区----------------------------------------------------------------------------------------------------------------------->

<div id="center">
  <div id="title"><p><a name="show">候选人介绍</a></p></div>
  <div id="content">  
  <?php foreach($introduction as $row): ?>
        <img src="<?php echo base_url('/upload/'."$row->img"); ?>"  />
        <h1><?php echo $row->name; ?></h1>
        <p>
			<?php echo $row->introduction; ?>
		</p>
  <?php endforeach; ?>
 </div>
 </div>

<!-----展示墙------------------------------------------------------------------------------------------------------------------>

<div id="show-top">
  <p><a name="show-wall">展示墙</a></p>
</div>
<DIV class=artist_l>
    <UL >
	
	<?php $i = 2; 
	foreach($candidate as $row): 
	?>
      <LI class=<?php echo 'a'."$i"; ?>><IMG src="<?php echo base_url('/upload/'."$row->img") ?>"><A href="<?php echo site_url('vote/introduction/'."$row->pid"); ?>" ><STRONG><?php echo $row->name; ?></STRONG><BR><SPAN><?php echo $row->department; ?></SPAN><BR>查看详情</A> </LI>
	<?php $i = $i + 1;
	endforeach; 
	?>
	</UL>
</DIV>
