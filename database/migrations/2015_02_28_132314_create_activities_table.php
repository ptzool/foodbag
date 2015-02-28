<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activities', function(Blueprint $table)
		{
			$table->increments('id');

            $table->integer("activity_type_id");
            $table->integer("user_id");

            $table->double("duration");
            $table->double("distance");
            $table->datetime("activity_date");
            $table->string("notes", 500);

			$table->timestamps();
		});

        /*
        CREATE TABLE "exercise" (
            "exercise_id" int(11) NOT NULL,
          "exercise_type_id" int(11) NOT NULL,
          "person_id" int(11) NOT NULL,
          "duration" float NOT NULL,
          "distance" float DEFAULT NULL,
          "date" datetime NOT NULL,
          "notes" text,
          PRIMARY KEY ("exercise_id"),
          KEY "exercise_type_id" ("exercise_type_id")
        );
        */
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('activities');
	}

}
