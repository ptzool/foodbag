<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('UserTableSeeder');

        $this->call('EatsTableSeeder');
        $this->call('WeightTableSeeder');

        $this->call('FoodsTableSeeder');
        $this->call('FoodClassesTableSeeder');

        $this->call('TrainingPlansTableSeeder');
        //$this->call('TrainingPlanItemsTableSeeder');

        $this->call('ActivitiesTableSeeder');
        $this->call('ActivityTypesTableSeeder');

        $this->call('RepeatActivityTableSeeder');
        $this->call('RepeatActivityGroupsTableSeeder');
        $this->call('RepeatActivityGroupsLinkTableSeeder');
	}

}
