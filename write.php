<?php
	$stime=microtime(true);
	if(file_exists("config.php")) {
		require "config.php";
	} else {
		define("storage",dirname(__FILE__)."/storage/");
		define("chatfile","chat.log");
		define("linkchar1","&");
		define("linkchar2","'says'");
		define("wpassword","admin");
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
	if(!defined("wpassword")){
		define("wpassword","admin");
	};
    if($_GET['password'] == wpassword) {
	try{
		date_default_timezone_set('PRC');
		if (getenv('HTTP_CLIENT_IP')) { 
			$ip = getenv('HTTP_CLIENT_IP'); 
		} elseif (getenv('HTTP_X_FORWARDED_FOR')) { 
			$ip = getenv('HTTP_X_FORWARDED_FOR'); 
		} elseif (getenv('HTTP_X_FORWARDED')) { 
			$ip = getenv('HTTP_X_FORWARDED'); 
		} elseif (getenv('HTTP_FORWARDED_FOR')) { 
			$ip = getenv('HTTP_FORWARDED_FOR'); 
		} elseif (getenv('HTTP_FORWARDED')) { 
			$ip = getenv('HTTP_FORWARDED'); 
		} elseif (getenv('REMOTE_ADDR')) { 
			$ip = getenv('REMOTE_ADDR'); 
		} elseif (!empty($_SERVER['REMOTE_ADDR'])) { 
			$ip = $_SERVER['REMOTE_ADDR']; 
		} else {
			$ip = "Unknown"; 
		};
		if (empty($_GET['message'])){
		$etime=microtime(true);
		$totaltime=$etime-$stime;
		echo "Message empty.</br>Total time: ".$totaltime."s.";
			exit;
		};
		if (mb_strlen($_GET['message'], 'UTF-8')>64){
		$etime=microtime(true);
		$totaltime=$etime-$stime;
		echo "Message is too long.</br>Total time: ".$totaltime."s.";
			exit;
		};
		$get = $_GET['message'];
		if (empty($_GET['username'])){
		$etime=microtime(true);
		$totaltime=$etime-$stime;
		echo "User Name empty.</br>Total time: ".$totaltime."s.";
			exit;
		};
		$un = $_GET['username'];
		$time = date('H:i',time());
		$timehidden = date('Y-m-d H:i:s',time());
		if(file_exists(storage.''.chatfile)) {
			$myfile = fopen(storage.''.chatfile, "a") or die("Unable to open file!");
			fwrite($myfile,$ip . "+" . $timehidden . "" . linkchar1 . "[".$time."] [" . $un . "] " .linkchar2 . "" .  $get . "\r\n");
			fclose($myfile);
		} else {
			file_put_contents(storage.''.chatfile, $ip . "+" . $timehidden . "" . linkchar1 . "[".$time."] [" . $un . "] " .linkchar2 . "" . $get . "\r\n");
		};
		$etime=microtime(true);
		$totaltime=$etime-$stime;
		echo "Success.</br>Total time: ".$totaltime."s.";
	}catch(Exception $e){
		echo $e->getMessage();
		exit();
	}
	} else {
		$etime=microtime(true);
		$totaltime=$etime-$stime;
		echo "Password not match.</br>Total time: ".$totaltime."s.";
		exit;
	};
?>