<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="南湖青年工作室" />
<title>华中农业大学大学生年度人物—后台管理</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/css/reset.css') ?>" >
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/css/admin.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/css/index.css') ?>">
</head>

<body>

<div class="admin_banner clearfix">
	<h1>华中农业大学大学生年度人物</h1>
    <p>欢迎您，<?php echo $this->session->userdata('username'); ?> | <a href="<?php echo base_url('index.php'); ?>" target="_blank">前台首页</a> | <a href="<?php echo site_url('admin/user_editor'); ?>">修改密码</a> | <a href="<?php echo site_url('admin/logout'); ?>">退出</a></p>
</div>
