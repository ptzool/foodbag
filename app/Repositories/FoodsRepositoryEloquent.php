<?php namespace Gocompose\Foodbag\Repositories;

use Gocompose\Foodbag\Contracts\Repositories\FoodsRepositoryInterface;
use Gocompose\Foodbag\Models\Food;
use Gocompose\Foodbag\Repositories\AbstractRepositoryEloquent;


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

    public function update($id, $input) {
        $food = $this->model->find($id);
        if($food) {
            return $food->update($input);
        }
        return false;
    }

}
