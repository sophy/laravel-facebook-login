<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Files', function(Blueprint $table) {
			$table->increments('id');
			$table->string('url');
			$table->string('name');
			$table->string('hash_name');
			$table->integer('size');
			$table->string('ext');
			$table->integer('photo_id');
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
		Schema::drop('Files');
	}

}
