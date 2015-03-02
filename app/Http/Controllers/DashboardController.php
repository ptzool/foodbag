<?php namespace Gocompose\Foodbag\Http\Controllers;

use Gocompose\Foodbag\Contracts\Repositories\DashboardRepositoryInterface;
use Gocompose\Foodbag\Http\Requests;
use Gocompose\Foodbag\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DashboardController extends Controller {

    protected $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DashboardRepositoryInterface $dashboardRepository)
    {
        $this->middleware('auth');

        $this->repository = $dashboardRepository;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
    {
        $user = \Auth::user();

        $stats = $this->repository->stats($user['id'], 10);

        $page = array(
            "title" => "Recent",
            "subtitle" => "History of weight measurements"
        );

        return view("dashboard.index", ["page" => $page, "stats" => $stats]);
	}

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function all()
    {
        $user = \Auth::user();

        $stats = $this->repository->stats($user['id'], 10000);

        $page = array(
            "title" => "Recent",
            "subtitle" => "History of weight measurements"
        );

        return view("dashboard.all", ["page" => $page, "stats" => $stats]);
    }


}
