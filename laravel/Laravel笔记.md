## Composer 的安装

在有 PHP 环境的情况下，使用如下两个命令之一：

` curl -sS https://getcomposer.org/installer | php `

` php -r "readfile('https://getcomposer.org/installer');" | php `

## 用 Composer 安装 Laravel 

命令行中使用如下命令：

` composer create-project laravel/laravel your-project-name  `

Composer 将自动下载 Laravel 所需相关库，需等较长时间。待下载完成后可复制一份作备用，避免重复此等待过程。

## Laravel 结构（app, views, routes, controllers, models, config 文件夹）

+ app: 所有主程序。
+ app/views: 如何生成具体页面， 可用模板。
+ app/routes.php: Router
+ app/controllers: 所有具有相关性的 routes 的集合。
+ app/models：ORM.  对数据库里的结构以面向对象方式封装.
+ app/config: 所有设置.

## Routes & Controllers

在 Routes.php 文件里写. 如果简单,直接在本文件中写完;如果复杂,写成 controller.
	+ 直接写. `Route::get('path', function(){//return value})`. 其中 get 可以 post,put 等 method 代替.
		+ path 中可加变量: `'/user/{userid}'`, 该变量出现在后面的 function 参数中(即`function($userid)`).
		+ 对于 Post 等方法里传入的数据, 直接在 function 里使用. ` $para1 = Input::get['para1']; $para2 = Input::get['para2']; `
		+ function 里的返回值, 可以直接返回一段 string; 也可返回一个 View 生成的页面, ` return View::make('v_name', array(paras)) `,见下 Views; 或者交给一个 controller 处理.
	+ Controllers. 一系列相似 routes 的集合. 把生成页面的代码统一放在各种 Controller 里, 让 route 只用来做 path, 不管具体逻辑.
		+ 在 Route 函数中可使用 Controller 中某一具体 function 来生成页面: ` Route:get('/', SampleController@showRoot) ` ;
		+ 或者 直接在 Routes.php 中对某一个 path 使用 controller 进行控制: ` Route::controller('admin','AdminController'); `. 但这种使用方法是完全 RESTful的, 要遵守 RESTful 的标准.

[Official Doc -> Routing](http://v4.golaravel.com/docs/4.2/routing)
## Views & Templates

## Models

## Auth & Security