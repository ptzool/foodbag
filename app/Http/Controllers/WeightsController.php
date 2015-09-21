<?php namespace App\Http\Controllers;

use App\Contracts\Repositories\WeightRepositoryInterface;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Weight;

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
	public function index(Request $request)
	{
        $user = \Auth::user();

        $limit = $request->input("limit", 10);

        if($limit <= 10)
            $limit = 10;

        if($limit >= 10000)
            $limit = 10000;

        $weights = $user->weights()->take($limit)->get();

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
	public function store(Requests\CreateWeightRequest $request)
	{

        $weight = new Weight($request->input());

        $user = \Auth::user();
        $user->weights()->save($weight);

        return redirect()->back()->withSuccess("Weight added");
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
        $user = \Auth::user();
        $eat = $this->repository->destroy($id);

        return redirect()->back()->withSuccess("Weight deleted");
    }

}
