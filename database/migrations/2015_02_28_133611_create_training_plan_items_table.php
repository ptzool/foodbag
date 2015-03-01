<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingPlanItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('training_plan_items', function(Blueprint $table)
		{
			$table->increments('id');

            $table->integer("item_seq");
            $table->string("name", 200);
            $table->double("distance");
            $table->enum("distance_type", array("m", "km", "metre"))->nullable();
            $table->integer("distance_repeat");
            $table->time("distance_time_limit");
            $table->string("notes", 1000);

			$table->timestamps();
		});
	}

    /*
     * CREATE TABLE "training_plan_item" (
  "training_plan_id" int(11) NOT NULL,
  "item_seq" int(11) NOT NULL,
  "name" char(200) NOT NULL,
  "distance" float NOT NULL,
  "distance_type" enum('m','km','metre') NOT NULL,
  "distance_repeat" int(11) NOT NULL,
  "distance_time_limit" time NOT NULL,
  "notes" text,
  PRIMARY KEY ("training_plan_id","item_seq")
);
     */

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('training_plan_items');
	}

}
