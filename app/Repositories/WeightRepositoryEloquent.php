<?php namespace Gocompose\Foodbag\Repositories;

use Gocompose\Foodbag\Contracts\Repositories\WeightRepositoryInterface;
use Gocompose\Foodbag\Repositories\AbstractRepositoryEloquent;

use Gocompose\Foodbag\Models\Weight;

class WeightRepositoryEloquent extends AbstractRepositoryEloquent implements WeightRepositoryInterface
{

    protected $model;

    /**
     * Constructor
     */
    public function __construct(Weight $model)
    {
        $this->model = $model;
    }


}
