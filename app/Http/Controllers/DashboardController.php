<?php namespace App\Http\Controllers;

use App\Contracts\Repositories\ActivitiesRepositoryInterface;
use App\Contracts\Repositories\DashboardRepositoryInterface;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Foodbag\Body;

use App\Models\ActivityType;
use Illuminate\Http\Request;

class DashboardController extends Controller {

    protected $repository;
    protected $activitiesRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DashboardRepositoryInterface $dashboardRepository, ActivitiesRepositoryInterface $activitiesRepository)
    {
        $this->middleware('auth');

        $this->repository = $dashboardRepository;
        $this->activitiesRepository = $activitiesRepository;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
    {
        $user = \Auth::user();

        $weights = $user->weights()->take(5)->get();

        $stats = $this->repository->stats($user['id'], array('limit' =>10, 'skipDates' => true));

        $eats = $user->eatsToday()->get();

        $activityTypes = $this->activitiesRepository->getTypes();

        $activities = $user->activitiesToday()->get();

        $page = array(
            "title" => "Recent",
            "subtitle" => "History of weight measurements"
        );

        return view("dashboard.index", [
            "page" => $page,
            "activity_types" => $activityTypes,
            "activities" => $activities,
            "stats" => $stats,
            "user" => $user,
            "weights" => $weights,
            "eats" => $eats
        ]);
	}

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function all()
    {
        $user = \Auth::user();

        $stats = $this->repository->stats($user['id'], 365*10);

        $page = array(
            "title" => "Recent",
            "subtitle" => "History of weight measurements"
        );

        return view("dashboard.all", ["page" => $page, "stats" => $stats]);
    }


}
