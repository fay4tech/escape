<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoomsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rooms', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('theme')->nullable();
			$table->text('pitch', 65535)->nullable();
			$table->smallInteger('minplayers')->unsigned();
			$table->smallInteger('maxplayers')->unsigned();
			$table->smallInteger('lvl')->unsigned()->default(0);
			$table->smallInteger('success')->unsigned()->nullable();
			$table->integer('timeplay')->unsigned()->default(0);
			$table->string('image')->nullable()->default('rooms/default.jpg');
			$table->integer('views')->unsigned()->default(0);
			$table->dateTime('playDate')->nullable();
			$table->integer('company_id')->unsigned()->default(0)->index('rooms_companies_id_foreign');
			$table->text('teams', 65535)->nullable();
			$table->integer('timePlayMax')->unsigned()->default(0);
			$table->smallInteger('wins')->unsigned()->default(0);
			$table->text('avis')->nullable();
			$table->text('positive', 65535)->nullable();
			$table->text('negative', 65535)->nullable();
			$table->smallInteger('search')->unsigned()->default(0);
			$table->smallInteger('enigmas')->unsigned()->default(0);
			$table->smallInteger('immersion')->unsigned()->default(0);
            $table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rooms');
	}

}
