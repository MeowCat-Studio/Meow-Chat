<?php
// Load config file start.
	if(file_exists("config.php")) {
		require "config.php";
	} else {
		define("password","admin");
		define("wpassword","admin");
		define("storage",dirname(__FILE__)."/storage/");
		define("history",dirname(__FILE__)."/history/");
		define("chatfile","chat.log");
		define("announcement","announcement.cfg");
		define("linkchar1","&");
		define("linkchar2","'says'");
		define("adminuser","Admin");
	};
	if(file_exists(storage."version.php")) {
		require storage."version.php";
	} else {
		define("version","Unknown");
	};
	if(!defined("version")){
		define("version","Unknown");
	};
	if(!defined("adminuser")){
		define("adminuser","Admin");
	};
	if(!defined("wpassword")){
		define("wpassword","admin");
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
	if(!defined("linkchar1")){
		define("linkchar1","&");
	};
	if(!defined("linkchar2")){
		define("linkchar2","'says'");
	};
	if(!defined("announcement")){
		define("announcement","announcement.cfg");
	};
// Load config file end.
// Count message.
if(file_exists(storage.''.chatfile)) {
$file=file(storage.''.chatfile);
$count=count($file);
} else {
	$count=0;
};
/**
 * Count folder files.
 * @param string $url
 * @return number
 */
function cff($url)
{
    $number=0;
    $arr = glob($url);
    foreach ($arr as $file)
    {
        if(is_file($file))
        {
            $number++;
        }
        else
        {
            $number+=cff($v."/*");
        }
    }
    return $number;
};
$hm = cff(history.'*');
?>
<!DOCTYPE HTML>
<html>
	<head>
	<title>Meow Chat Admin Console</title>
	    <style type="text/css">
      .bodynologin {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }
      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
    </style>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/app.css">
	<link rel="stylesheet" href="css/amazeui.flat.css">
	<link rel="stylesheet" href="css/buttons.css">
	<link rel="stylesheet" href="css/glyphicons.css">
	<link rel="stylesheet" href="css/console.css">
	<script src="js/bootstrap.min.js"></script>
	</head>
	<?php if (empty($_GET['password'])) {
	echo '<body class="bodynologin">
<div class="container">
   <form class="form-signin">
<h3 class="form-signin-heading">喵聊控制台 - 登录</h3>
<div class="row"><span class="glyphicon glyphicon-user"></span> 用户名 *
      <input type="text" class="form-control" value="'.adminuser.'" disabled>
</div><div class="row"><span class="glyphicon glyphicon-certificate"></span> 密码 *
      <input type="password" class="form-control" name="password" id="password" placeholder="您的管理员密码">
        <button class="btn btn-default" type="sumbit">登录</button>
</div>
        </form>
</div>
</body>
</html>';
};
if ($_GET['password'] != password && !empty($_GET['password'])) {
	echo '<body class="bodynologin">
<div class="container">
   <form class="form-signin" action="admin.php">
<h3 class="form-signin-heading">喵聊控制台 - 登录</h3>
<div>
<p>您输入的密码有误，请重新输入!</p>
        <button class="btn btn-default" type="sumbit">返回</button>
</div>
        </form>
</div>
</body>
</html>';
};
if ($_GET['password'] == password) {
	switch ($_GET['mode']) {
case command:
echo '<body>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Meow Chat</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="admin.php?password='.$_GET['password'].'"><span class="glyphicon glyphicon-scale"></span> 总览<span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="admin.php?password='.$_GET['password'].'&mode=command"><span class="glyphicon glyphicon-console"></span> 指令执行</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php?username='.adminuser.'" target="_blank">返回聊天 <span class="glyphicon glyphicon-share-alt"></span></a></li>
        <li><a href="http://www.meowcat.org/" target="_blank">小喵工作室</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>';
if (!empty($_GET['consolecmd'])) {
  switch ($_GET['consolecmd']) {
case clear:
  echo '<div class="panel panel-default">
  <div class="panel-body">
  执行指令：Clear Message.</br>
  输出：<div class="panel panel-default">
  <div class="panel-body">
  <iframe src="clear.php?password='.$_GET['password'].'" style="height:auto;width:100%;" frameborder="0"/>
  </div>
  </div>
</div>
  </div>
</body>
</html>';
  break;
case broadcast:
  echo '<div class="panel panel-default">
  <div class="panel-body">
  执行指令：Add an Announcement.
  </br>
  输出：<div class="panel panel-default">
  <div class="panel-body">
  <iframe src="announcement.php?password='.$_GET['password'].'" style="height:auto;width:100%;" frameborder="0"/>
  </div>
  </div>
</div>
  </div>
</body>
</html>';
  break;
case send:
if (empty($_GET['msg'])) {
  echo '<div class="panel panel-default">
  <div class="panel-body">
  执行指令 Send a message 时需要以下附加条件：
  </br>
   <form action="admin.php">
  <div class="row">
      <input type="password" class="form-control" name="password" id="password" value="'.$_GET['password'].'" style="display:none;">
      <input type="text" class="form-control" name="mode" id="mode" value="command" style="display:none;">
      <input type="text" class="form-control" name="consolecmd" id="consolecmd" value="send" style="display:none;">
      <input type="text" class="form-control" name="msg" id="msg" placeholder="需发送的消息，上限64位，不得含有&等字符">
        <button class="btn btn-default" type="sumbit">提交</button>
</div>
</form>
</div>
  </div>
</body>
</html>';
} else {
  echo '<div class="panel panel-default">
  <div class="panel-body">
  执行指令：Send a message & message='.$_GET['msg'].'.
  </br>
  输出：<div class="panel panel-default">
  <div class="panel-body">
  <iframe src="write.php?password='.wpassword.'&message=<font color=\'5BA783\'>'.$_GET['msg'].'</font>&username=<font color=\'5BA783\'>[管理员]'.adminuser.'</font>&admin='.password.'" style="height:auto;width:100%;" frameborder="0"/>
  </div>
  </div>
</div>
  </div>
</body>
</html>';
};
  break;
default:
  echo '<div class="panel panel-default">
  <div class="panel-body">
  执行指令：Unknown.</br>
  输出：<div class="panel panel-default">
  <div class="panel-body">
  Failed.</br>Command Not Specified.</br>
  Total time: none.
  </div>
  </div>
</div>
  </div>
</body>
</html>';
};
} else {
  echo '<div class="panel panel-default">
  <div class="panel-body">
  <h1>指令执行 <small>Meow Chat Admin Console</small></h1>
  输入指令：
   <form action="admin.php">
  <div class="row">
      <input type="password" class="form-control" name="password" id="password" value="'.$_GET['password'].'" style="display:none;">
      <input type="text" class="form-control" name="mode" id="mode" value="command" style="display:none;">
      <input type="text" class="form-control" name="consolecmd" id="consolecmd" placeholder="控制台指令">
        <button class="btn btn-default" type="sumbit">执行</button>
</div>
</form>
<p>指令提示：</br>broadcast（Add an announcement）插入一条随机公告</br>clear（Clear messages）清空所有消息并保存至历史文件</br>send（Send a message）以管理员身份发送一条消息</p>
  </div>
  </div>
</div>
  </div>
</body>
</html>';
};
  break;
default:
	echo '<body>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Meow Chat</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="admin.php?password='.$_GET['password'].'"><span class="glyphicon glyphicon-scale"></span> 总览<span class="sr-only">(current)</span></a></li>
        <li><a href="admin.php?password='.$_GET['password'].'&mode=command"><span class="glyphicon glyphicon-console"></span> 指令执行</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php?username='.adminuser.'" target="_blank">返回聊天 <span class="glyphicon glyphicon-share-alt"></span></a></li>
        <li><a href="http://www.meowcat.org/" target="_blank">小喵工作室</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  <div class="panel-body">
<div class="page-header">
  <h1>Meow Chat Admin Console <small>喵聊管理控制台</small></h1>
</div>
  	<div id="dashboard">
    <div class="row-fluid">
        <div class="thumbnails">
            <div class="responsive span3" style="display:inline;">
			<a href="https://github.com/MeowCat-Studio/Meow-Chat" target="_blank" class="ga-event">
                    <div class="thumbnail purple">
					<div class="visual">
                            <span class="glyphicon glyphicon-record"></span>
                        </div>
                        <div class="number">'.version.'</div>
                                                    <h4 class="tile-label">程序版本</h4>
													<div class="manage">检测更新（Github） <span class="glyphicon glyphicon-new-window"></span></div>
                    </div>
                </a>
            </div>
            <div class="responsive span3" style="display:inline;">
			<a href="index.php?mod=baiduid" class="ga-event">
                    <div class="thumbnail blue">
					<div class="visual">
                            <span class="glyphicon glyphicon-list"></span>
                        </div>
                        <div class="number"><?php
			<span id="baiduid_used">'.$count.'</span></div>
                                                    <h4 class="tile-label">消息数量/条</h4>
													<div class="manage" style="text-transform: uppercase;">发送消息 <span class="glyphicon glyphicon-chevron-right"></span></div>
                    </div>
					</a>
            </div>
            <div class="responsive span3" style="display:inline;">
                    <div class="thumbnail green">
					<div class="visual">
                            <span class="glyphicon glyphicon-file"></span>
                        </div>
                        <div class="number">'.$hm.'</div>
                                                    <h4 class="tile-label">历史文件数量/个</h4>
                    </div>
            </div>
			<div class="responsive span3" style="display:inline;">
                    <div class="thumbnail yellow">
					<div class="visual">
                            <span class="glyphicon glyphicon-list-alt"></span>
                        </div>
                        <div class="number">'.date("Y-m-j-l H:i:s.", filemtime(storage.''.chatfile)).'</div>
                                                    <h4 class="tile-label">最后发言时间</h4>
                    </div>
            </div>
		</div>
    </div>
</div>
</div>
</body>
</html>';};
};?>