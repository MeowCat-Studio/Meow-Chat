<?php
	if(file_exists("config.php")) {
		require "config.php";
	} else {
		define("storage",dirname(__FILE__)."/storage/");
		define("chatfile","chat.log");
		define("linkchar1","&");
		define("linkchar2","'says'");
	};
	if(!defined("storage")){
		define("storage",dirname(__FILE__)."/storage/");
	};
	if(!defined("chatfile")){
		define("chatfile","chat.log");
	};
	if(!defined("linkchar1")){
		define("linkchar1","&");
	};
	if(!defined("linkchar2")){
		define("linkchar2","'says'");
	};
	$time = date('H:i',time());
	if(!file_exists(storage.''.chatfile)) {
		echo "<div class=\"other_space\"><div class=\"other_talk\"><font color=\"#CD8E76\">[".$time."] [System] Welcome to Meow Chat. Meow Chat is a public chat system.</br>[".$time."] [System] Here is empty. Click <span class=\"am-icon-paper-plane-o\"></span> to send your first message.</font></div></div>";
		exit;
	};
	$myfile = fopen(storage.''.chatfile, "r") or die("<div class=\"other_space\"><div class=\"other_talk\"><font color=\"#CD8E76\">[".$time."] [System] Unable to read chat program history file.</font></div></div>");
	while(!feof($myfile)) {
  		$read =  fgets($myfile);
		$arr = explode(linkchar1,$read);
		$array = explode(linkchar2,$arr[1]);
		echo "<div class=\"other_space\"><div class=\"other_talk\"><font color=\"#009D9D\">" .$array[0]. "</font><font color=\"#C2C2DA\">". $array[1] . "</font></div></div>";   	
	};
	fclose($myfile);
?>