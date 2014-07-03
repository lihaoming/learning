<?php
	class AdminController extends BaseController{

		protected $layout = 'layout';
		public function getIndex()
		{
			$users = DB::table('user')->get();
			$this->layout = View::make('admin',array('content' => 'ccccccc', 'title' => 'tttt'));
			return View::make('admin', array('users' => $users));
		}
	}	