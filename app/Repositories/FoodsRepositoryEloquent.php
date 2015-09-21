<?php namespace App\Repositories;

use App\Contracts\Repositories\FoodsRepositoryInterface;
use App\Models\Food;
use App\Repositories\AbstractRepositoryEloquent;


class FoodsRepositoryEloquent extends AbstractRepositoryEloquent implements FoodsRepositoryInterface
{

    protected $model;

    /**
     * Constructor
     */
    public function __construct(Food $model)
    {
        $this->model = $model;
    }

    public function names()
    {
        $results = $this->model->names()->sortBy(function($food)
        {
            return $food->name;
        });
        return $results;
    }

    public function queryNames($q)
    {
        $results = $this->model
            ->where('name', 'LIKE', '%'.$q.'%')
            ->names()
            ->sortBy(function($food)
            {
                return $food->name;
            });
        return $results;
    }


}
