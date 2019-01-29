<?php
	if(file_exists("config.php")) {
		require "config.php";
	} else {
		define("title","MeowChat - A Public Chat System");
		define("wpassword","admin");
	};
	if(!defined("title")){
		define("title","MeowChat - A Public Chat System");
	};
	if(!defined("wpassword")){
		define("wpassword","admin");
	};
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0"/>
      <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="renderer" content="webkit"/>
  <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <title><?php echo title ?></title>
<script type="text/javascript">
function sendimgbtn() {
	document.getElementById("sendmessage").style.display = "none";
	document.getElementById("sendimage").style.display = "block";
}
function sendchatbtn() {
	document.getElementById("sendmessage").style.display = "block";
	document.getElementById("sendimage").style.display = "none";
}
function uploadimage() {
	document.getElementById('image').submit();
	sendchatbtn();
}
		window.onload=function(){
			check();
			scroll();
		}
		document.onkeydown = function(){
    if(window.event && window.event.keyCode == 13){ 
                checkmsg()
            }
}
function checkHtml(htmlStr) {
     var reg = /<[^>]+>/g;
     return reg.test(htmlStr);
 }
function checkmsg(){
     var html=document.getElementById('text').value;
     if (!checkHtml(html)) {
		 send();
	 };
 };
		function send()
		{
		var xmlhttp;
		var get = document.getElementById('text').value;
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		if (document.getElementById('text').value != "") {
		     if (document.getElementById('name').value != "") {
		xmlhttp.open("GET","./write.php?password=<?php echo wpassword; ?>&message=" + get + "&username=" + document.getElementById('name').value,true);
		xmlhttp.send();
		document.getElementById('text').value = "";
		setTimeout("scroll()",320);
		} else {
		window.alert("非法请求"); 
		}
		}
		}
		
		function scroll(){
			document.getElementById('allspace').scrollTop = document.getElementById('allspace').scrollHeight;
			setTimeout("document.getElementById('allspace').scrollTop = document.getElementById('allspace').scrollHeight;",550)
		};
		function check()
		{
		var xmlhttp;
		if (window.XMLHttpRequest)
		  {
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("allspace").innerHTML=xmlhttp.responseText;
			}
		  }
		  if (document.getElementById('name').value!="")
		  {
		xmlhttp.open("GET","read.php?username=" + document.getElementById('name').value,true);
		xmlhttp.send();
		} else {
				document.getElementById("allspace").innerHTML="<center style=\"-webkit-app-region: drag;\"><font color=\"#C2C2DA\">非法请求</font></center>"
				document.getElementById("footer").style="display:none";
			}
		setTimeout("check()",1000)
		}
	</script>
	<style>
		.me_space{
		width:55%;
		height:auto;
		float:right;
		margin:7.5px 10px 0 7.5px;
		}

		.me_talk{
			float:right;
			word-break:break-all;
			font-size:15px;
			background-color:#FFDEAD;
			-webkit-border-radius: 5px; 
			box-shadow:0 0 1.5px #000;
		}
		
		.other_space{
		width:100%;
		height:auto;
		float:left;
		// margin:7.5px 0 10px 7.5px;
		}

		.other_talk{
			float:left;
			word-break:break-all;
			font-size:15px;
		}
		
		.all_space{
			position:fixed;
			margin:0 0 30px 0;
			height: 80%;
			width:100%;
			overflow:auto;
		}
		
		.send{
			width:100%;
			position: absolute;
			top:0px;
			height:auto;
			left:0px;
			z-index:999;
		}
		
		.file{
			width:85%;
			position:absolute;
			top:33%;
			left:8%;
		}
		
		.send_img{
			display:none;
			width:100%;
			position: absolute;
			height:100%;
			background-color:#3C291E;
		}
		
		.emoji{
			width:70px;
			height:70px;
		}
		
		input[type="button"]{
			-webkit-border-radius:5px; 
			background-color:transparent;
			border:1px solid #fff;
			color:#fff;
		}
		
		* {
			margin:0;
			padding:0;
		} 
		html, body {
			height: 100%;
		}
		#wrap {
			min-height: 90%;
			height: 90%;
		}
		#main {
			overflow:auto;
   			padding-bottom: 60px;
		} 
		#footer {
			position: absolute;
			width: 100%;
			height: auto;
    		clear:both;
		} 
 		body:before {
			content:"";
			height:100%;
			float:left;
			width:0;
			margin-top:-32767px;
		}
	</style>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/app.css">
	<link rel="stylesheet" href="css/amazeui.flat.css">
	<link rel="stylesheet" href="css/buttons.css">
</head>
<body style="background-color:#3C291E;">
<input style="display:none;" id="name" type="text" value="<?php if(isset($_POST['username'])){echo $_POST['username'];};?>"></input>
    <div id="wrap">
   		<div id="main">
        	<div id="allspace" class="all_space">
        	</div>
    	</div>
	</div>
    <div id="footer">
        <div class="send" id="sendmessage">
  <div class="input-group" style="bottom:15px;">
  <span class="input-group-addon" style="-webkit-app-region: drag;">内容</span>
  <input id="text" type="text" class="form-control" style="height:28px;" maxlength="64"/>
  <span class="input-group-btn"><button onclick="sendimgbtn();" class="btn btn-info"/><span class="glyphicon glyphicon-picture"></span></button><button onclick="checkmsg();" class="btn btn-info"/><span class="am-icon-paper-plane-o"></span></button>
  </span>
</div>
        </div>
        <div class="send" id="sendimage" style="display:none;">
  <div class="input-group" style="bottom:15px;">
  <span class="input-group-addon" style="-webkit-app-region: drag;">图片</span>
  <form action="image.php" method="post" id="image" enctype="multipart/form-data" target="_blank">
	<input style="display:none;" id="username"  name="username" type="text" value="<?php if(isset($_POST['username'])){echo $_POST['username'];};?>"></input>
    <input type="file" name="file" class="form-control" size="20" style="height:28px;" />

</form>
  <span class="input-group-btn"><button onclick="sendchatbtn();" class="btn btn-info"/><span class="glyphicon glyphicon-pencil"></span></button>
    <button onclick="uploadimage();" class="btn btn-info"/><span class="am-icon-paper-plane-o"></span></button>
  </span>
</div>
        </div>
	</div>
</body>
</html>