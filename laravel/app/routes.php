<?php


Route::get('/', 'HomeController@showWelcome');
Route::controller('signin', 'SignController');
Route::controller('admin','AdminController');
Route::put('/change/{username}','ChangeController@changeInfo');
Route::delete('/delete/{username}','ChangeController@removeInfo');
Route::get('/user/{username}', function($username){
	return View::make('account', array('username'=> $username));
});

/*
Route::get('/signup', function(){
	return View::make('signup', array('note'=>''));
});
Route::post('/signup', function(){
	$uname = Input::get('username');
	$pswd = Input::get('password');
	$pswd2 = Input::get('re-password');
	if ($pswd != $pswd2) {
		return View::make('hello', array('note'=>'The two passwords should be the same'));
	}
	$users = DB::table('user')->lists('username');
	foreach($users as $u){
		if ($uname == $u){
			return View::make('hello', array('note'=>'This username has already exists'));
		}
	}
	DB::table('user')->insert(array(
    	                    'username'=> $uname,
    	                    'password'=> Hash::make($pswd)
    	                    
    	                ));
	return View::make('hello', array('note'=>'Your new account has created successfully! '));
	
	
});
Route::get('/signin', function(){
	return View::make('signin',array('note'=>''));
});
Route::post('/signin', function(){
	$uname = Input::get('username');
	$pswd = Input::get('password');
	$users = DB::table('user')->lists('username');
	$is_user_in_db = in_array($uname, $users);
	if ($is_user_in_db) {
		return Redirect::to('/user/'.$uname);
	}else {
		return View::make('signin',array('note'=>'No this account'));
		
	}
	#$pswd_check = DB::table('user')->where('username',$uname)->pluck('password');

});
*/
