<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('avatar')->nullable()->default('users/default.png');
			$table->string('password');
			$table->string('remember_token', 100)->nullable();
			$table->integer('lvl')->default(1);
			$table->integer('active')->default(0);
			$table->timestamps();
			$table->integer('company_id')->unsigned()->nullable()->index('users_company_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
