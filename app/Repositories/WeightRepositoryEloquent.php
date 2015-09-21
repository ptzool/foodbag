<?php namespace App\Repositories;

use App\Contracts\Repositories\WeightRepositoryInterface;
use App\Repositories\AbstractRepositoryEloquent;

use App\Models\Weight;

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
