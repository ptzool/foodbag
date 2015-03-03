<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepeatActivityGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::dropIfExists('repeat_activity_groups');
        Schema::dropIfExists('repeat_activity_groups_link');

		Schema::create('repeat_activity_groups', function(Blueprint $table)
		{
			$table->increments('id');

            $table->integer('user_id');
            $table->string('name', 100);

			$table->timestamps();
		});

        Schema::create('repeat_activity_groups_link', function(Blueprint $table)
        {
            $table->integer('repeat_activity_group_id');
            $table->integer('repeat_activity_id');

            $table->timestamps();
            $table->primary(array('repeat_activity_group_id', 'repeat_activity_id'), 'repeat_activity_group_link_pk');
        });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('repeat_activity_groups');
        Schema::dropIfExists('repeat_activity_groups_link');
	}

}
