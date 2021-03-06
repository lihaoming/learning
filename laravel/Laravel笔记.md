### Composer 的安装

在有 PHP 环境的情况下，使用如下两个命令之一：

` curl -sS https://getcomposer.org/installer | php `

` php -r "readfile('https://getcomposer.org/installer');" | php `

### 用 Composer 安装 Laravel 

命令行中使用如下命令：

` composer create-project laravel/laravel your-project-name  `

Composer 将自动下载 Laravel 所需相关库，需等较长时间。待下载完成后可复制一份作备用，避免重复此等待过程。

### Laravel 结构（app, views, routes, controllers, models, config 文件夹）

+ app: 所有主程序。
+ app/views: 如何生成具体页面， 可用模板。
+ app/routes.php: Router
+ app/controllers: 所有具有相关性的 routes 的集合。
+ app/models：ORM.  对数据库里的结构以面向对象方式封装.
+ app/config: 所有设置.

### Routes & Controllers

在 Routes.php 文件里写. 如果简单,直接在本文件中写完;如果复杂,写成 controller.

+ 直接写. `Route::get('path', function(){//return value})`. 其中 get 可以 post,put 等 method 代替.

	+ path 中可加变量: `'/user/{userid}'`, 该变量出现在后面的 function 参数中(即`function($userid)`).
	+ 对于 Post 等方法里传入的数据, 直接在 function 里使用. ` $para1 = Input::get['para1']; $para2 = Input::get'para2']; `
	+ function 里的返回值, 可以直接返回一段 string; 也可返回一个 View 生成的页面,` return View::make('v_name',array(paras)) `,见下 Views; 或者交给一个 controller 处理.

+ Controllers. 一系列相似 routes 的集合. 把生成页面的代码统一放在各种 Controller 里, 让 route 只用来做 path,不管具体逻辑.
	+ 在 Route 函数中可使用 Controller 中某一具体 function 来生成页面: 
	` Route:get('/', SampleController@showRoot)` ;
	+ 或者 直接在 Routes.php 中对某一个 path 使用 controller 进行控制: ` Route::controller'admin','AdminController'); `. 但这种使用方法是完全 RESTful的, 要遵守 RESTful 的标准.
	+ RESTful. 假如`/admin`是用 `AdminController`来控制的, 则在 AdminController 中, `getIndex()/postIndex(`函数表示的是该 path 的根路径, 即`/admin`;而其它的`getXXX`或`postXXX`表示 `/admin/xxx`.get/post/put等方法后面跟的名字即是路径. 若为多个单词,用驼峰命名法. 例: getAdminProfile() 表示的是`GET/admin/admin-profile` (多个单词间用-连接)

[Official Doc -> Routing](http://v4.golaravel.com/docs/4.2/routing)
## Views & Templates

生成页面. 所有相关文件存于 /app/views 中, 是以".php"为后缀名的HTML网页文件或".blade.php"为后缀的Blade模板文件.
+ 对于普通的.php后缀,可传入一些简单的变量. 方法是 `View::make('signin', array('para' => 'texttext');,然后在view文件里直接嵌入一个`<?php echo `str` ?>`.
+ 若使用 Blade 模板, 分为定义和使用.
	+ 定义一个 Blade 模板. 固定的部分仍为普通的HTML+CSS, 需待填充的部分为 
	
```
	@section('secname')
		text content (can also be html)
	@show
```
可在此section中填入一些内容,这些内容可在使用时以 `@parent`标签调用, 否则即以使用模板时填入的内容全部覆盖.
或者是 @yield('secname'). 在使用该模板时, 将这几个需填充的部分依次填入内容即可.
+ 使用一个 Blade 模板. 继承时, 用 `@extends(tempName)`(若在文件夹内,路径用.代替/)然后后面需要将继承的模板中预留待填的 section 填完. 

``` 
	@section('secname')
		content
	@sto
```
若需要使用 if for 等控制语句,结构如下
```
	@foreach ($manyThings as $thing)
   		<p>{{ $thing }}</p>
	@endforeach
```
			
### Models & DB	

使用数据库: `DB::table('tName')->where('colName','colValue')->get()`

数据库的设置在 `/app/database.php` 中. 使用前要先将 database name, username 等参数设置好.

Model 是对数据库的面向对象形式的封装,存于/app/models里,每一个文件代表一个数据库表,并与该表同名. 例如有table: `database.User`, 则对应的 model 应名为 User.php. 其格式为:
```php
class User extends Eloquent{
	protected $table = 'user';	
}
```
在 model 里可以设置一系列的参数:
+ $primaryKey : 该数据表的主键. 默认是 `id`. (可直接给每一个 table 都加一个 AutoIncrement 的 id). 
+ $fillable : 数组. 储存所有可被使用 mass-assignment 方法改动的属性. mass-assignment 即直接传入一个包含所有属性信息的数组的形式.
+ $guarded : 与 fillable 相反, 表示不能被以 mass-assignment 改动的.
+ $timestamps : Boolean值, 是否使用  `updated_at` 和 `created_at` 记录时间.
使用方法:
+ 可直接使用`TableName::find(pk)` 的方式得到一个主键为 pk 的 元素.
+ `User::where('attrName', '><=' , 'value')` 等同于 where 语句.
+ `User::where(xx)->firstOrFail()`: 直接获取第一个元素,若无,返回404错误.
+ `User->take(10)->get()` : 取前10个.
+ `User::all()` :获取所有.
+ 以上方法获取的均为 list of obj, 需要用 `foreach($users as $user){ echo $user->username; }` 的方式使用.
+ Update. 得到一个 model 以后(比如foreach中的一个$user), 可以直接对本model修改,然后 `$user->save()`,即可.
+ 建表时加入 `updated_at` 和 `created_at`两个属性,在发生相应更新时, 这两个表会自动更新,以记录时间.
+ Insert. `User::Create(array(k1=>v1, k2=>v2))`

[Official Doc -> Eloquent ORM](http://v4.golaravel.com/docs/4.2/eloquent)

### Auth & Security

用 Bcrypt 加密.

Hash: `$password = Hash::make('secret');` 

检查Hash: `Hash::check('secret', $hashedPassword)` return boolean

Authentication: 验证登录的用户是不是本人.
`Auth::attempt(array('username' => $username, 'password' => $password)))` 即为通过 `username`和`password`进行验证. 当这两个值都正确, 就`return true`. 传入时是原值,但在数据库里要存为hash值.

