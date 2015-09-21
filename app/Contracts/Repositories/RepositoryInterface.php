<?php namespace App\Contracts\Repositories;

/**
 * RepositoryInterface provides the standard functions to be expected of ANY 
 * repository.
 */
interface RepositoryInterface {
	
	public function all();
    public function find($id);
    public function create($options);

}