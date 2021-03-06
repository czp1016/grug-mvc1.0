<?php
/*
App/Controllers里面放控制器，命名格式：ControllernameController.php
App/Models里面放数据模型，命名格式：ModelnameModel.php
App/Views里面放模板视图，一个文件夹对应一个controller的视图，
文件夹下的视图文件以控制器的方法命名，例如test文件夹对应TestController的视图，
test文件夹下的index.phtml对应TestController的index方法。

在Grug/Crontroller.php里定义了M()和S()，使用工厂模式获取model实例，两种方法：
1.Factory::getModel('TestModel'); //普通方法获取实例
2.Factory::getSingletonModel('TestModel'); //单例模式获取实例

链接访问形式:http://yourhost/mvc/index.php/test/thanks?p1=a&p2=b
其中index.php为入口文件,test为controller,thanks为方法,p1、p2为参数
上面这种方式几乎不需要修改web服务器任何配置。
下面提供另一种链接访问方式：http://yourhost/test/thanks?p1=a&p2=b
这种方式需要修改web服务器配置文件，下面给出nginx.conf的配置
增加
	server {
		listen       80;
		server_name  yourhost;
		root         /var/www/html/mvc;
		# /var/www/html/mvc是你的文件目录，可修改为其他路径
		index  index.php index.html index.htm;
		try_files $uri $uri/ /index.php$is_args$args;
		location ~ \.php$ {
		 root           /var/www/html/mvc;
		 fastcgi_pass   127.0.0.1:9000;                                                                   
		 fastcgi_index  index.php;
		 fastcgi_param  SCRIPT_FILENAME  /var/www/html/mvc$fastcgi_script_name;
		 include        fastcgi_params;
		}
    }


*/
error_reporting(E_ERROR | E_WARNING | E_PARSE); //设置错误报告
define("BASEDIR", __DIR__);
include BASEDIR."/Grug/Loader.php";
spl_autoload_register("\\Grug\\Loader::autoload");
//Grug\Application::getInstance()->dispatch();

Grug\Application::getInstance(BASEDIR)->dispatch();

?>