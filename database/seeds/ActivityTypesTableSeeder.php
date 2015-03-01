<?php

class ActivityTypesTableSeeder extends BaseTableSeeder {

    public function __construct()
    {
        $this->table = 'activity_types';
        $this->filename =  base_path().'/database/data/activity_type.csv';
        $this->truncate = true;
        $this->hasTestData = true;

        //$this->postQuery = array("SELECT setval('proj_project_project_seq_seq', (SELECT MAX(project_seq) FROM ".$this->table."))");
    }

}
