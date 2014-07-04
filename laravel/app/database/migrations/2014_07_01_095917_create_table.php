<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user',function($table)
    	{
    	    $table->increments('id');
    	    $table->string('username',24);
    	    
    	    $table->string('password',18);
    	});
    	 DB::table('user')->insert(array(
    	                    'username'=>'test-user',
    	                    'password'=>'test-pswd'
    	                    
    	                ));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
