<?php namespace Gocompose\Foodbag\Http\Controllers;

use Gocompose\Foodbag\Http\Requests;
use Gocompose\Foodbag\Http\Controllers\Controller;

use Gocompose\Foodbag\Contracts\Repositories\FoodsRepositoryInterface;
use Gocompose\Foodbag\Models\Food;

use Illuminate\Http\Request;

class FoodsController extends Controller {

    protected $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(FoodsRepositoryInterface $repository)
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
		if($request->wantsJson()) {
			$query = $request->input('q');

			$foods = $this->repository->queryNames($query);

			$results = array();
			foreach ($foods as $food) {
				$results[] = $food;
			}
			return \Response::json($results);
		}
		else
		{
			$user = \Auth::user();

			$foods = $this->repository->all();

			$page = array(
				"title" => "Food List",
				"subtitle" => "Things you can eat"
			);
			return view("foods.index", ["page" => $page, "user"=>$user, "foods" => $foods]);
		}

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
	public function store(Requests\CreateFoodRequest $request)
	{
		//$food = new Food();
		$food = array();
		$food['food_class_id'] = 1;
		$food['name'] = $request->input('name');
		$food['size'] = $request->input('size');
		$food['serving_size'] = $request->input('serving_size');
		$food['calories'] = $request->input('calories');
		$food['protein'] = $request->input('protein');
		$food['carbs'] = $request->input('carbs');
		$food['carbs_sugar'] = $request->input('carbs_sugar');
		$food['fat'] = $request->input('fat');
		$food['fat_sat'] = $request->input('fat_sat');
		$food['fibre'] = $request->input('fibre');
		$food['sodium'] = $request->input('sodium');
		$food['sodium_assalt'] = $request->input('sodium_assalt');
		$food['calcium'] = $request->input('calcium');
		$food['cholesterol'] = $request->input('cholesterol');
		$food['notes'] = $request->input('notes');

		$this->repository->create($food);

		return redirect()->back()->withSuccess("Food added");
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
