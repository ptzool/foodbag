<?php namespace Gocompose\Foodbag\Http\Controllers;

use Gocompose\Foodbag\Http\Requests;
use Gocompose\Foodbag\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DashboardController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	    return view("dashboard.index");
	}

}
