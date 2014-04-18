<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConjugationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('conjugations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('word_id');
			$table->string('form');
			$table->string('word');
			$table->string('kana');
			$table->string('romaji');
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
		Schema::table('conjugations', function(Blueprint $table)
		{
			Schema::drop('words');
		});
	}

}