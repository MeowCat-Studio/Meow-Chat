<?php
	$stime=microtime(true);
	if(file_exists("config.php")) {
		require "config.php";
	} else {
		define("storage",dirname(__FILE__)."/storage/");
		define("chatfile","chat.log");
		define("history",dirname(__FILE__)."/history/");
		define("password","admin");
	};
	if(!defined("storage")){
		define("storage",dirname(__FILE__)."/storage/");
	};
	if(!defined("chatfile")){
		define("chatfile","chat.log");
	};
	if(!defined("history")){
		define("history",dirname(__FILE__)."/history/");
	};
	if(!defined("password")){
		define("password","admin");
	};
	if(!file_exists(storage.''.chatfile)) {
		$etime=microtime(true);
		$totaltime=$etime-$stime;
		echo "File does not exist, needn't to operate.</br>Total time: ".$totaltime."s.";
		exit;
	};
    $time = time();
    $filename = "chat_".$time.".log";
    if($_GET['password'] == password) {
        rename(storage.''.chatfile,$filename);
		copy($filename,history.$filename);
		unlink($filename);
		file_put_contents(storage.''.chatfile, "");
		$etime=microtime(true);
		$totaltime=$etime-$stime;
		echo "Success.</br>Total time: ".$totaltime."s.";
	} else {
		$etime=microtime(true);
		$totaltime=$etime-$stime;
		echo "Password not match.</br>Total time: ".$totaltime."s.";
		exit;
	};
?>