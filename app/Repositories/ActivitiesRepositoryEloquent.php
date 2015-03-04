<?php namespace Gocompose\Foodbag\Repositories;

use Gocompose\Foodbag\Contracts\Repositories\ActivitiesRepositoryInterface;
use Gocompose\Foodbag\Models\Activity;
use Gocompose\Foodbag\Models\ActivityType;
use Gocompose\Foodbag\Repositories\AbstractRepositoryEloquent;

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
