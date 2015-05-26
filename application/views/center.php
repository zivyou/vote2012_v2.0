<?php
	//页面状态的显示
	/*
	1：投票成功;
	2：投票失败！请检查你填写的信息！
	3:你还没有选择投票项
	4：你选择的投票项太多了
	5：
	*/

	if($this->session->flashdata('state') === 1) {echo "<script language='javascript'>alert('投票成功');</script>";$this->session->set_flashdata('state',0);$this->session->userdata('state');}
	if($this->session->flashdata('state') === 2) {echo "<script language='javascript'>alert('投票失败！请检查你填写的信息！');</script>"; $this->session->set_flashdata('state',0);$this->session->userdata('state');}
	if($this->session->flashdata('state') === 3) {echo "<script language='javascript'>alert('你还没有选择投票项...');</script>"; $this->session->set_flashdata('state',0);$this->session->userdata('state');}
	if($this->session->flashdata('state') === 4) {echo "<script language='javascript'>alert('你选择的投票项太多了');</script>";$this->session->set_flashdata('state',0); $this->session->userdata('state');}
	if($this->session->flashdata('state') === 5) {echo "<script language='javascript'>alert('亲，你已经投过了。。');</script>";$this->session->set_flashdata('state',0); $this->session->userdata('state');}	
 ?>
 <script type="text/javascript">

//去掉输入字符串两边的空格

function trim(s) {   
   var count = s.length;   
   var st    = 0;       // start   
   var end   = count-1; // end   
   
   if (s == "") return s;   
   while (st < count) {   
     if (s.charAt(st) == " ")   
       st ++;   
     else  
       break;   
   }   
   while (end > st) {   
     if (s.charAt(end) == " ")   
       end --;   
     else  
       break;   
   }   
   return s.substring(st,end + 1);   
 }
 
function isEmpty(){   
    //form1是form中的name属性   
    var _form = document.form1;

	//以下判断是否选中复选框
	var objs=document.getElementsByName('voteok[]');
	var isSel=false;
	for(var i = 0;i < objs.length;i++)
	{
	  if(objs[i].checked==true)
	   {
			isSel=true;
			break;
	   }
	}
	if(isSel==false)
	{
		alert("请选择投票项！"); 
		return false;
	}
       
    if(trim(_form.sname.value)==""){   
        alert("姓名不能为空!");           
        return false;   
    }   
    if(trim(_form.sid.value)==""){   
        alert("学号不能为空!");          
        return false;   
    } 

    return true;

}
</script>
<!---tab活动说明vs投票须知...............................................................................................................-->

<div id="tab">
	<div id="bg" class="xixi1">
		<div id="font1" class="tab1" onMouseOver="setTab03Syn(1);document.getElementById('bg').className='xixi1'"><a name="act">活动说明</a></div>
		<div id="font2" class="tab2" onMouseOver="setTab03Syn(2);document.getElementById('bg').className='xixi2'"><a name="know">投票须知</a></div>
	</div>
    <div id="TabCon1">        
        <p>
		<a href="<?php echo site_url("vote/act_introduction"); ?>">
		<?php 
		foreach($activity as $row)  
		echo  strip_tags(substr($row->introduction,0,1200));
		//endforeach; 
		?>
		</a>
        </p>
    </div>
	<div id="TabCon2" style="display:none">
        <p>
		<a href="<?php echo site_url("vote/act_requirement"); ?>">
		<?php 
			foreach($activity as $row):  
				echo strip_tags(substr($row->requirement,0,1200));
			endforeach; 
		?>
		</a>
		</p>
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
	if($i == 2 || $i ==15) $img_class_name='232';
	else if($i == 9) $img_class_name = '110232';
	else $img_class_name = '110';
	?>
      <LI class=<?php echo 'a'."$i"; ?>><IMG class="img<?php echo $img_class_name; ?>"src="<?php echo base_url('/upload/'."$row->img") ?>"><A href="<?php echo site_url('vote/introduction/'."$row->pid"); ?>" ><STRONG><?php echo $row->name; ?></STRONG><BR><SPAN><?php echo $row->department; ?></SPAN><BR>查看详情</A> </LI>
	<?php $i = $i + 1;
	if($i > 15) break;
	endforeach; 
	?>
	</UL>
</DIV>

<!--投票专区----------------------------------------------------------------------------------------------------------------------->

<div id="title"><p><a name="vote-area">投票专区</a></p><span>亲，您只能选<?php if($chance) echo $chance->chance; else echo '0' ?>项哦！</span></div>
  <form  action="<?php echo site_url('vote/voted'); ?>" method="post" name="form1" onsubmit="return isEmpty()">    
    <div id="select">
	<?php foreach($candidate as $row): ?>
         <dl class="show"> 
            <dt><h1><input type="checkbox" name="voteok[]" value="<?php echo $row->pid ?>" /><span><?php echo $row->name; ?></span><i><?php echo $row->votes; ?>票</i></h1></dt>
            <dd class="image"><img src="<?php echo base_url('/upload/'."$row->img"); ?>"  /></dd>
            <dd class="describe"><p><a href="<?php echo site_url('vote/introduction/'."$row->pid"); ?>"><?php echo strip_tags(substr("$row->introduction",0,120).'...'); ?></a></p></dd>
         </dl>
	<?php endforeach; ?>
   </div>
     <!--------投票------------------------------------------------------------------------------------------->
     <div id="votearea">
         <dl>
            <dd><p id="pass">姓名：</p><input type="text" name="sname" id="pass-sno"/></dd>
            <dd><p id="pass">学号：</p><input type="text" name="sid" id="pass-no"/></dd>
            <!--<dd><p id="pass">验证码：</p><input type="text" name="auth" id="pass-in"/></dd>-->
            <!--<dd><input type="text" name="pass" id="pass-get" value="JEK5U"/></dd>-->
            <dd><input type="submit" name="submit" id="submit" value="提交"  /></dd>
         </dl>       
     </div>
  </form>
