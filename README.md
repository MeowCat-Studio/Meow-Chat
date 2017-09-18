<p align="center"><img src="https://raw.githubusercontent.com/MeowCat-Studio/Meow-Chat/gh-pages/chat.png"></p>

高度自由的大众聊天室，现在，回应您的等待。

喵聊 (Meow Chat) 是一款能让您自行搭建、管理和使用的聊天 Web 应用程序。

Meow Chat 是一个开源的 PHP 项目，这意味着您可以自由地在您的服务器上部署它。

特性 / Feathers
-----------
- [x] 管理后台
- [x] 自动公告
- [x] 外部程序（使用Nodewebkit实现，页面代码已适配）
- [x] 反恶意信息
- [ ] 表情
- [ ] 彩色用户名
- [ ] 用户系统
- [ ] Gravatar 头像
- [ ] 简易安装程序

环境要求 / Require
-----------
Meow Chat 对您的服务器有一定的要求。在大多数情况下，下列所需的 PHP 扩展已经开启。

- 一台支持 PHP 的主机，Nginx、Apache 或 IIS
- **PHP >= 5.6.31**
- PHP 的 file_put_contents 扩展
- PHP 的 Mbstring 扩展
- 主机可创建或写入文件

快速使用 / Get Started
-----------
1. 下载程序的 [Master.zip](https://github.com/MeowCat-Studio/Meow-Chat/archive/master.zip)，并解压到你想要安装到的位置。
2. 将 `config.example.php` 重命名为 `config.php` 并**编辑你的[站点配置](#站点配置)**。
3. 运行index.php
4. 为保证安全，建议将您设置的storage目录和history目录设置拒绝外部访问（可选步骤）

站点配置 / Configuration
-----------
一个默认的配置文件应该像这样（注释已去除）
```PHP
<?php
define("password","admin");
define("wpassword","admin");
define("adminuser","Admin");
define("storage",dirname(__FILE__)."/storage/");
define("history",dirname(__FILE__)."/history/");
define("chatfile","chat.log");
define("announcement","announcement.cfg");
define("linkchar1","&");
define("linkchar2","'says'");
define("title","MeowChat - A Public Chat System");
```
| 常量 | 注解 | 默认 | 提示 |
| :-----------: | :-----------: | :-----------: | :-----------: |
| password | 控制台的唯一密码 | "admin" | 建议修改，否则任何知道默认密码的人都有权进入控制台 |
| wpassword | 写入文件的密码 | "admin" | 建议修改，防止恶意刷屏 |
| adminuser | 管理员用户名 | "Admin" | 推荐修改 |
| storage | 保存聊天记录、公告配置、程序版本的文件夹名称 | dirname(\_\_FILE\_\_)."/storage/" | 维持现状 |
| history | 保存历史记录的文件夹名称 | dirname(\_\_FILE\_\_)."/history/" | 维持现状 |
| linkchar1 | 第一个分隔符 | "&" | 无需修改 |
| linkchar2 | 第二个分隔符 | "'says'" | 推荐修改 |
| title | 站点标题 | "MeowChat - A Public Chat System" | 推荐修改 |

如需修改，请修改`,`后面的字符串，文本请加入双引号

简易问答 / FAQ
------------
阅读 [Wiki - FAQ](https://github.com/MeowCat-Studio/Meow-Chat/wiki/FAQ) 并在报告问题之前再次确认 FAQ 中确实没有提到你的情况。

Bug 报告及反馈 / Issues
------------
请提交 Issues。你还应该提供错误发生时服务器的一些信息。Bug 将会被尽快解决。

版权 / Copyright
------------
Meow Chat 程序是（暂时）基于 MIT License 开放源代码的自由软件，你可以遵照 MIT 协议来修改和重新发布这一程序。

初版源码感谢 @junxii 提供

程序原作者为 [@MeowCat Studio](http://www.meowcat.org/)，转载请注明。
