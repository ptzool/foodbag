<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('foods', function(Blueprint $table)
		{
			$table->increments('id');

            $table->integer("food_class_id");
            $table->string("name", 255);
            $table->double("size");
            $table->double("serving_size");
            $table->double("calories");
            $table->double("protein");
            $table->double("carbs");
            $table->double("carbs_sugar");
            $table->double("fat");
            $table->double("fat_sat");
            $table->double("fibre");
            $table->double("sodium");
            $table->double("sodium_assalt");
            $table->double("calcium");
            $table->double("cholesterol");

            $table->string("notes", 500);

			$table->timestamps();
		});
	}
/*
CREATE TABLE "food" (
"food_id" int(11) NOT NULL,
"food_class_id" int(11) NOT NULL DEFAULT '1',
"name" varchar(255) NOT NULL,
"size" double NOT NULL,
"serving_size" double DEFAULT NULL,
"calories" double NOT NULL,
"protein" double DEFAULT NULL,
"carbs" double DEFAULT NULL,
"carbs_sugar" double DEFAULT NULL,
"fat" double DEFAULT NULL,
"fat_sat" double DEFAULT NULL,
"fibre" double DEFAULT NULL,
"sodium" double DEFAULT NULL,
"sodium_assalt" double DEFAULT NULL,
"calcium" double DEFAULT NULL,
"cholesterol" double DEFAULT NULL,
"notes" text,
PRIMARY KEY ("food_id"),
KEY "food_class_id" ("food_class_id")
);
*/
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('foods');
	}

}
