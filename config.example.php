<?php
// 管理员密码，默认为admin，用于清屏和添加公告
define("password","admin");
// 写入文件密码，防止外部人员恶意刷屏，默认admin
define("wpassword","admin");
// 管理员用户名，默认Admin
define("adminuser","Admin");
// 存储文件夹，默认为程序目录下的storage文件夹，当前聊天记录和公告配置存放在此处
define("storage",dirname(__FILE__)."/storage/");
// 历史记录文件夹，默认为程序目录下的history文件夹，清屏后的文件会备份在此处
define("history",dirname(__FILE__)."/history/");
// 聊天记录文件，默认为chat.log，后缀名和文件名可随意
define("chatfile","chat.log");
// 公告配置文件，默认为announcement.cfg，后缀名和文件名可随意
define("announcement","announcement.cfg");
// 第一个连字符，用于区分ip信息和聊天信息，默认为&
define("linkchar1","&");
// 第二个连字符，用于区分用户名和聊天记录，默认为'says'(带单引号)
define("linkchar2","'says'");
// 页面的标题，默认为MeowChat - A Public Chat System
define("title","MeowChat - A Public Chat System");