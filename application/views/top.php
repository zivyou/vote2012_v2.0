
<!---顶部...............................................................................................................-->

<div id="top">
    <div id="link-to">
       <ul >
          <li><a href="http://www.nhqn.com/">南湖青年网</a></li>
          <li><a href="http://news.hzau.edu.cn/">南湖新闻网</a></li>
          <li><a href="http://www.hzau.edu.cn/ch/home/">华中农业大学</a></li>
       </ul>
    </div>
   <span class="school">华中农业大学</span>
   <span class="act">大学生年度人物评选</span>
   <ul id="menu">
		<?php if(!$this->uri->segment(2)) {$m1='#act';$m2='#know';} else{$m1=site_url();$m2=site_url();} ?>
        <li class="menu-1"><a href="<?php echo $m1; ?>">Item 1</a></li>
        <li class="menu-2"><a href="<?php echo $m2; ?>">Item 2</a></li>
        <li class="selected" class="item3"><a href="<?php echo site_url(); ?>">Item 3</a></li>
        <li class="menu-3"><a href="#show-wall">Item 4</a></li>
		<?php if($this->uri->segment(2)){ ?>
			<li class="menu-5"><a href="#show">Item 5</a></li>
			<?php }
			else
			{ ?>
			<li class="menu-4"><a href="#vote-area">Item 5</a></li>
			<?php }
		?>
   </ul>
</div>
