<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if(!Schema::hasTable('users')) {

			Schema::create('users', function (Blueprint $table) {
				$table->increments('id');

				$table->string('name');
				$table->string('email')->unique();
				$table->string('password', 60);

				$table->double('height')->default('70');
				$table->date('birth')->default('1990-01-01');
				$table->enum('gender', array('F', 'M'));

				$table->rememberToken();
				$table->timestamps();
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Schema::drop('users');
	}

}
