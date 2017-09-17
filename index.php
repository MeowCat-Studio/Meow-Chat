<?php
	if(file_exists("config.php")) {
		require "config.php";
	} else {
		define("title","MeowChat - A Public Chat System");
	};
	if(!defined("title")){
		define("title","MeowChat - A Public Chat System");
	};
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
		<title><?php echo title ?></title>
		<link rel="stylesheet" href="css/buttons.css"/>
		<link rel="stylesheet" href="css/bootstrap.css"/>
	</head>
	<body style="background-color:#2588cb;color:#fff;text-align:center;padding:0;margin:0;overflow:hidden;" scroll="no">
	<center>
		<img style="margin-top:10%;height:140px;weigh:140px;background-color:white;border-radius: 15px;" src="favicon.ico"/>
		<h1>Meow-Chat</h1>
   <form class="form-signin" action="chat.php" style="width:300px;">
		<div class="input-group">
  <span class="input-group-addon">用户名</span>
  <input id="username" name="username" type="text" class="form-control" minlength="3" maxlength="12" <?php if(!empty($_GET['username'])){echo 'value="'.$_GET['username'].'"';};?> required placeholder="聊天用户名"/>
  </div>
		<button type="submit" class="button button-3d button-primary button-rounded">进入</button>
        </form>
		</center>
	</body>
</html>