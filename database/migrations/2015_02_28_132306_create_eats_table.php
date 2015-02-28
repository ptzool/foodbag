<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('eats', function(Blueprint $table)
		{
			$table->increments('id');

            $table->integer("user_id");
            $table->integer("food_id");
            $table->dateTime("eaten");
            $table->double("amount");
            $table->enum("amount_type", array("S","P", "L"));
            $table->integer("sms_log_id")->default(-1);
            $table->integer("approved")->default(1);

			$table->timestamps();
		});

        /*
            Previous Definition
            "eat_id" int(11) NOT NULL,
            "person_id" int(11) NOT NULL,
            "food_id" int(11) NOT NULL,
            "eaten" datetime NOT NULL,
            "amount" double NOT NULL,
            "amount_type" enum('S','P','L') NOT NULL,
            "sms_log_id" int(11) NOT NULL DEFAULT '-1',
            "approved" int(11) NOT NULL DEFAULT '1',
            PRIMARY KEY ("eat_id"),
            KEY "person_id" ("person_id"),
            KEY "food_id" ("food_id")

         */
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('eats');
	}

}
