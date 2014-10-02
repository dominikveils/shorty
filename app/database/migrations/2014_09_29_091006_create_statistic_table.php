<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStatisticTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('statistic', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('url_id')->unsigned();
			$table->integer('ip')->unsigned()->nullable();
			$table->string('referer');
			$table->string('country')->nullable();
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
		Schema::drop('statistic');
	}

}
