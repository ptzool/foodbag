<?php

class WeightTableSeeder extends BaseTableSeeder {

    public function __construct()
    {
        $this->table = 'weights';
        $this->filename =  base_path().'/database/data/weight.csv';
        $this->truncate = true;
        $this->hasTestData = true;

        //$this->postQuery = array("SELECT setval('proj_project_project_seq_seq', (SELECT MAX(project_seq) FROM ".$this->table."))");
    }

}
