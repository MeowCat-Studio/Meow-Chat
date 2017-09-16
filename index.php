<?php
	if(file_exists("config.php")) {
		require "config.php";
	} else {
		define("title","MeowChat - A Public Chat System");
	};
	if(!defined("title")){
		define("title","MeowChat - A Public Chat System");
	};
?><!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
		<title><?php echo title ?></title>
		<link rel="stylesheet" href="css/buttons.css"/>
	<link rel="stylesheet" href="css/bootstrap.css">
	</head>
	<body style="background-color:#2588cb;color:#fff;text-align:center;padding:0;margin:0;overflow:hidden;" scroll="no">
	<div id="body">
		<img style="margin-top:10%;height:140px;width:140px;background-color:white;" src="favicon.ico"/>
		<h1>Meow-Chat</h1>
		<form action="chat.php">
		<div class="input-group">
  <span class="input-group-addon">用户名</span>
      <input type="text" class="form-control" name="username" id="username" placeholder="您的用户名" maxlength="16" minlength="4">
</div>
        <button class="button button-3d button-primary button-rounded" type="sumbit">进入</button>
        </form>
		</div>
	</body>
</html>