<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeightsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('weights', function(Blueprint $table)
		{
			$table->increments('id');

            $table->integer("user_id");
            $table->double("weight");
            $table->datetime("date");

			$table->timestamps();
		});
	}
/*
CREATE TABLE "weight" (
"weight_id" int(11) NOT NULL,
"person_id" int(11) NOT NULL,
"weight" double NOT NULL,
"date" datetime NOT NULL,
PRIMARY KEY ("weight_id"),
KEY "person_id" ("person_id")
);
*/

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('weights');
	}

}
