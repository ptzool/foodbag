<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BaseTableSeeder extends Seeder {


    /**
     * DB table name
     *
     * @var string
     */
    protected $table;

    /**
     * CSV filename
     *
     * @var string
     */
    protected $filename;

    /**
     * Truncate before insert
     *
     * @var bool
     */
    protected $truncate = false;

    /**
     * Raw statements to execute after inserting
     *
     * @var array
     */
    protected $postQuery = array();

    protected $loadTestData = true;
    protected $hasTestData = false;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(strlen($this->table) <= 0) {
            return;
        }

        if($this->hasTestData && $this->loadTestData == false)
        {
            return;
        }

        if($this->truncate) {
            DB::table($this->table)->truncate();
        }

        $seedData = $this->seedFromCSV($this->filename);

        foreach($seedData as $row) {
            DB::table($this->table)->insert($row);
        }

        if(is_array($this->postQuery)) {
            foreach($this->postQuery as $query) {
                DB::statement($query);
            }
        }
    }


    /**
     * Collect data from a given CSV file and return as array
     *
     * @param $filename
     * @param string $deliminator
     * @return array|bool
     */
    private function seedFromCSV($filename, $deliminator = ",")
    {
        if(!file_exists($filename) || !is_readable($filename))
        {
            throw new \Illuminate\Contracts\Filesystem\FileNotFoundException;
        }

        $allData = array();

        $csvFile = new Keboola\Csv\CsvFile($filename);
        $header = null;

        foreach($csvFile as $row) {

            if($header ==  null) {
                $header = $row;
            } else {

                $row_item = array();
                for($i =0; $i<count($row); $i++)
                {

                    $row_key = $header[$i];

                    $row_item[$row_key] = $row[$i];
                    if(strlen($row_item[$row_key]) <= 0)
                    {
                        $row_item[$row_key] = NULL;
                    }
                }

                $allData[] = $row_item;
            }

        }

        return $allData;
    }

}
