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
	</head>
	<body style="background-color:#2588cb;color:#fff;text-align:center;padding:0;margin:0;overflow:hidden;" scroll="no">
	<div id="body">
		<img style="margin-top:10%;" src="images/icon.png"/>
		<h1>Meow-Chat</h1>
		<h2>解放双手，创造无限可能</h2>
		<a onClick="signin();" class="button button-3d button-primary button-rounded">进入云签*</a>
		</div>
	</body>
</html>