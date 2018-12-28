<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companies', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('adress')->nullable();
			$table->string('city')->nullable();
			$table->string('region')->nullable();
			$table->integer('zip')->unsigned()->nullable();
			$table->string('country')->nullable();
			$table->time('open')->nullable();
			$table->time('close')->nullable();
			$table->string('email')->nullable();
			$table->string('url')->nullable();
			$table->string('tel')->nullable();
			$table->float('pricemin', 10, 0)->unsigned()->nullable();
			$table->float('pricemax', 10, 0)->unsigned()->nullable();
			$table->string('image')->nullable()->default('companies/default.jpg');
			$table->text('avis')->nullable();
            $table->text('sale', 65535)->nullable();
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
		Schema::drop('companies');
	}

}
