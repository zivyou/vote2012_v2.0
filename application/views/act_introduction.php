

<div id="act_center">
  <div id="title"><p><a name="show">活动介绍</a></p></div>
  <div id="content">
  <p class="css">
    <?php 
	foreach($activity as $row):
	echo $row->introduction;
	endforeach;

	?>
	</p>
  </div>
 </div>


