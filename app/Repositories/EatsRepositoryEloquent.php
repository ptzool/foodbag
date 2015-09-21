<?php namespace App\Repositories;

use App\Contracts\Repositories\EatsRepositoryInterface;
use App\Repositories\AbstractRepositoryEloquent;

use App\Models\Eat;

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
