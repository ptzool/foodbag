<?php namespace Gocompose\Foodbag\Repositories;

use Gocompose\Foodbag\Contracts\Repositories\EatsRepositoryInterface;
use Gocompose\Foodbag\Repositories\AbstractRepositoryEloquent;

use Gocompose\Foodbag\Models\Eat;

class EatsRepositoryEloquent extends AbstractRepositoryEloquent implements EatsRepositoryInterface
{

    protected $model;

    /**
     * Constructor
     */
    public function __construct(Eat $model)
    {
        $this->model = $model;
    }


}
