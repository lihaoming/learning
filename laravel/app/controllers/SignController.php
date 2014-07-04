<?php

class SignController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public function getIndex()
	{

		return View::make('signin', array('note' => ''));
	}

	public function postIndex()
	{

		$uname = Input::get('username');
		$pswd = Input::get('password');
		#$pswd = Hash::make($pswd);
		if (Auth::attempt(array('username' => $uname, 'password' => $pswd), true)) {
			
			echo 'authed';
    		#return Redirect::to('admin');
		} else {	
			return View::make('signin', array('note' => 'No this account'));
		}
		if (Auth::viaRemember()){
				echo 'rememeber';
				#return Redirect::to('signup');
			}
	}
}
