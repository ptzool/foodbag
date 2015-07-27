<?php namespace Gocompose\Foodbag\Http\Controllers;

use Gocompose\Foodbag\Contracts\Repositories\ActivitiesRepositoryInterface;
use Gocompose\Foodbag\Http\Requests;
use Gocompose\Foodbag\Http\Controllers\Controller;

use Gocompose\Foodbag\Models\Activity;
use Illuminate\Http\Request;

class ActivitiesController extends Controller {


	protected $repository;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(ActivitiesRepositoryInterface $repository)
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
		$user = \Auth::user();

		$activityTypes = $this->repository->getTypes();
		$activities = $user->activitiesRange(0, 10);

		$page = array(
			"title" => "Eats",
			"subtitle" => "History of what you've eaten"
		);
		return view("activities.index", ["page" => $page, "user"=>$user, "activities" => $activities, "activity_types" => $activityTypes]);
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
	public function store(Requests\CreateActivityRequest $request)
	{

        $user = \Auth::user();

        $activity = new Activity();
        $activity['activity_type_id'] = $request->input('activity_type_id');
        $activity['duration'] = $request->input('duration');
        $activity['distance'] = $request->input('distance');
        $activity['activity_date'] = $request->input('activity_date');
        $activity['notes'] = $request->input('notes');

        $user->activities()->save($activity);

        return redirect()->back()->withSuccess("Activity added");
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

		return redirect()->back()->withSuccess("Activity deleted");
	}


}
