<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepeatActivitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('repeat_activities', function(Blueprint $table)
		{
			$table->increments('id');

            $table->integer('activity_type_id');

            $table->string('name', 100);
            $table->time('repeat_time');
            $table->double("duration")->nullable();
            $table->double("distance")->nullable();

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
		Schema::drop('repeat_activities');
	}

}
