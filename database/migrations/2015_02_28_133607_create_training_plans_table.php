<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingPlansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('training_plans', function(Blueprint $table)
		{
			$table->increments('id');

            $table->string("title", 100);
            $table->string("url", 255);
            $table->integer("weeks");

			$table->timestamps();
		});
	}
    /*
CREATE TABLE "training_plan" (
"training_plan_id" int(11) NOT NULL,
"title" char(100) NOT NULL,
"url" char(255) NOT NULL,
"weeks" int(11) NOT NULL,
PRIMARY KEY ("training_plan_id")
);
    */
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('training_plans');
	}

}
