<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="南湖青年工作室" />
<title>2012大学生年度人物</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/css/reset.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/css/admin.css'); ?>">
<script type="text/javascript" src="js/common.js"></script>

</head>

<body class="login">

<?php
	//页面状态的显示
	/*
	1：用户已经登录了;
 
	*/

	if($this->session->flashdata('state') === 1) {echo "<script language='javascript'>alert('该用户已经登录了！');</script>";$this->session->set_flashdata('state',0);$this->session->userdata('state');}
 ?>

<div class="loginFace">
	<h1>2012大学生年度人物后台管理</h1>
    <form action="<?php echo site_url('login/check_login') ?>" method="post">
    	<fieldset>
        <legend>管理员登陆</legend>
    		<p><label>用户名:</label><input class="text" type="text" name="username" /></p>
        	<p><label>密　码:</label><input class="text" type="password" name="password" /></p>
        	<p><input class="button" type="submit" value="登 录" /></p>
    	</fieldset>
    </form>
</div>

</body>
</html>