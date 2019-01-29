<?php
	$stime=microtime(true);
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
		if (empty($_POST['username'])){
		$etime=microtime(true);
		$totaltime=$etime-$stime;
		echo "User Name empty.</br>Total time: ".$totaltime."s.";
			exit;
		};
if($_FILES["file"]["error"])
{
    echo $_FILES["file"]["error"];    
}
else
{
    if(($_FILES["file"]["type"]=="image/png"||$_FILES["file"]["type"]=="image/jpeg")&&$_FILES["file"]["size"]<1048576)
    {
            $filename =storage."img/".time().".png";
            $filename =iconv("gb2312","UTF-8",$filename);
            if(file_exists($filename))
            {
		$etime=microtime(true);
		$totaltime=$etime-$stime;
        echo"File exist.</br>Total time: ".$totaltime."s.";
		exit();
            }
            else
            {  
                move_uploaded_file($_FILES["file"]["tmp_name"],$filename);
            }        
    }
    else
    {
		$etime=microtime(true);
		$totaltime=$etime-$stime;
        echo"Unknown file type.</br>Total time: ".$totaltime."s.";
		exit();
    }
}
		$un = $_POST['username'];
		$time = date('H:i',time());
		$timehidden = date('Y-m-d H:i:s',time());
		if(file_exists(storage.''.chatfile)) {
			$myfile = fopen(storage.''.chatfile, "a") or die("Unable to open file!");
			fwrite($myfile,$ip . "+" . $timehidden . "" . linkchar1 . "[".$time."] [" . $un . "] " .linkchar2 . "" .  "<img src=\"".str_replace(dirname(__FILE__), '', $filename)."\" />" . "\r\n");
			fclose($myfile);
		} else {
			file_put_contents(storage.''.chatfile, $ip . "+" . $timehidden . "" . linkchar1 . "[".$time."] [" . $un . "] " .linkchar2 . "" . "<img src=\"".str_replace(dirname(__FILE__), '', $filename)."\" />" . "\r\n");
		};
		$etime=microtime(true);
		$totaltime=$etime-$stime;
		echo "Success.</br>Total time: ".$totaltime."s.<script>window.opener=null;window.close();</script>";

	}catch(Exception $e){
		echo $e->getMessage();
		exit();
	}