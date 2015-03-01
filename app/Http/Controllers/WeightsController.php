<?php namespace Gocompose\Foodbag\Http\Controllers;

use Gocompose\Foodbag\Contracts\Repositories\WeightRepositoryInterface;
use Gocompose\Foodbag\Http\Requests;
use Gocompose\Foodbag\Http\Controllers\Controller;

use Illuminate\Http\Request;

class WeightsController extends Controller {

    protected $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(WeightRepositoryInterface $repository)
    {
        $this->repository = $repository;

        $this->middleware('auth');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$weights = $this->repository->user(1);

        $page = array(
            "title" => "Weight",
            "subtitle" => "History of weight measurements"
        );

        return view("weight.index", ["page" => $page, "weights" => $weights]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
