<?php namespace App\Repositories;

use App\Contracts\Repositories\ActivitiesRepositoryInterface;
use App\Models\Activity;
use App\Models\ActivityType;
use App\Repositories\AbstractRepositoryEloquent;

class ActivitiesRepositoryEloquent extends AbstractRepositoryEloquent implements ActivitiesRepositoryInterface
{

    protected $model;
    protected $modelType;

    /**
     * Constructor
     */
    public function __construct(Activity $model, ActivityType $modelType)
    {
        $this->model = $model;
        $this->modelType = $modelType;
    }

    public function getTypes()
    {
        $types = ActivityType::all();

        $results = array();
        foreach($types as $type) {
            $results[$type['id']] = $type['name'];
        }

        return $results;
    }
}
