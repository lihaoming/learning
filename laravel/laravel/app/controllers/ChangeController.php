<?php

class ChangeController extends BaseController {

	
	public function changeInfo($username)
	{	
		$username = Input::get('username');
		$password = Input::get('password');
		DB::table('user')->where('username', $username)->update(array('password' => $password));
		
	}
	public function removeInfo($username)
	{
		$username = Input::get('username');
		DB::table('user')->where('username', $username)->delete();
	}
}
	