<?php namespace Gocompose\Foodbag\Contracts\Repositories;

use Gocompose\Foodbag\Contracts\Repositories\RepositoryInterface;

interface WeightRepositoryInterface extends RepositoryInterface
{

    public function user($id);
}