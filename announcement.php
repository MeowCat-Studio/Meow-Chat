<?php
	$stime=microtime(true);
	if(file_exists("config.php")) {
		require "config.php";
	} else {
		define("storage",dirname(__FILE__)."/storage/");
		define("announcement","announcement.cfg");
		define("chatfile","chat.log");
		define("password","admin");
		define("linkchar1","&");
		define("linkchar2","'says'");
	};
	if(!defined("storage")){
		define("storage",dirname(__FILE__)."/storage/");
	};
	if(!defined("announcement")){
		define("announcement","announcement.cfg");
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
	if(!defined("password")){
		define("password","admin");
	};
	if(!file_exists(storage.''.announcement)) {
		$etime=microtime(true);
		$totaltime=$etime-$stime;
		echo "File does not exist, can't read announcement config.</br>Total time: ".$totaltime."s.";
		exit;
	};
	if(!file_exists(storage.''.chatfile)) {
		$etime=microtime(true);
		$totaltime=$etime-$stime;
		echo "File does not exist, needn't to operate.</br>Total time: ".$totaltime."s.";
		exit;
	};
    $pw = $_GET['password'];
    if($pw == password) {
    try{
		date_default_timezone_set('PRC');
		$time = date('H:i',time());
		$timehidden = date('Y-m-d H:i:s',time());
			$file=file(storage.''.announcement);
			$count=count($file);
			$random=rand(1,$count);
			$announcement=@$file[$random];
			if (empty($announcement)) {
		$etime=microtime(true);
		$totaltime=$etime-$stime;
				echo "Empty announcement. Unlucky :(</br>Total time: ".$totaltime."s.";
				exit;
			};
		if(file_exists(storage.''.chatfile)) {
			$myfile = fopen(storage.''.chatfile, "a") or die("Unable to open file!");
			fwrite($myfile,"Announcement" . "+" . $timehidden . "" . linkchar1 . "<font color=\"#CD8E76\">[".$time."] [公告]</font> " . linkchar2 . "" . $announcement . "\r\n");
			fclose($myfile);
		} else {
			exit;
		};
		$etime=microtime(true);
		$totaltime=$etime-$stime;
		echo "Announcement write success.</br>Message: ".$announcement.".</br>Total time: ".$totaltime."s.";
	}catch(Exception $e){
		echo $e->getMessage();
		exit();
	};
	} else {
		$etime=microtime(true);
		$totaltime=$etime-$stime;
		echo "Password not match.</br>Total time: ".$totaltime."s.";
		exit;
	};
?>