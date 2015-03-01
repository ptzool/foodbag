<?php

class TrainingPlansTableSeeder extends BaseTableSeeder {

    public function __construct()
    {
        $this->table = 'training_plans';
        $this->filename =  base_path().'/database/data/training_plan.csv';
        $this->truncate = true;
        $this->hasTestData = true;

        //$this->postQuery = array("SELECT setval('proj_project_project_seq_seq', (SELECT MAX(project_seq) FROM ".$this->table."))");
    }

}
