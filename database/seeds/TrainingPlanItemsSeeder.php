<?php

class TrainingPlanItemsTableSeeder extends BaseTableSeeder {

    public function __construct()
    {
        $this->table = 'training_plan_items';
        $this->filename =  base_path().'/database/data/training_plan_item.csv';
        $this->truncate = true;
        $this->hasTestData = true;

        //$this->postQuery = array("SELECT setval('proj_project_project_seq_seq', (SELECT MAX(project_seq) FROM ".$this->table."))");
    }

}
