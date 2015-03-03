<?php

class RepeatActivityGroupsTableSeeder extends BaseTableSeeder {

    public function __construct()
    {
        $this->table = 'repeat_activity_groups';
        $this->filename =  base_path().'/database/data/repeat_activity_groups.csv';
        $this->truncate = true;
        $this->hasTestData = true;

        //$this->postQuery = array("SELECT setval('proj_project_project_seq_seq', (SELECT MAX(project_seq) FROM ".$this->table."))");
    }

}
