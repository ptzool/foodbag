<?php

class FoodsTableSeeder extends BaseTableSeeder {

    public function __construct()
    {
        $this->table = 'foods';
        $this->filename =  base_path().'/database/data/food.csv';
        $this->truncate = true;
        $this->hasTestData = true;

        //$this->postQuery = array("SELECT setval('proj_project_project_seq_seq', (SELECT MAX(project_seq) FROM ".$this->table."))");
    }

}
