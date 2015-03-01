<?php namespace Gocompose\Foodbag\Repositories;


abstract class AbstractRepositoryEloquent
{

    protected $model;

    /**
    * Return all users
    *
    * @return Illuminate\Database\Eloquent\Collection
    */
    public function all()
    {
        $results = $this->model->all();
        return $results;
    }

    public function find($id)
    {
        $results = $this->model->find($id);
        return $results;
    }

    public function create($input)
    {
        return $this->model->create($input);
    }

}