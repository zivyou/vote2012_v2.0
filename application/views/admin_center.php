<?php
	//页面状态的显示
	/*
	1：你填写的用户名已被注册！
	*/

	if($this->session->flashdata('state') === 1) {echo "<script language='javascript'>alert('你填写的用户名已被注册！');</script>";$this->session->set_flashdata('state',0);$this->session->userdata('state');}
	
 ?>


<div class="admin_content fr">
  <h1>后台首页</h1>
    <h2>
        华中农业大学大学生年度人物后台管理系统
    </h2>
    <div class="admin_index">
	<div>Powered by <font color="#3366cc">南湖青年工作室<font></div>

<!--
	<div>
	    <span>开发人员:</span>
	    <p>南湖青年工作室</p>
	</div>
	<div>
	    <span>技术支持:</span>
	    <p>南湖青年工作室</p>
	</div>
-->
    </div>
	    
</div>