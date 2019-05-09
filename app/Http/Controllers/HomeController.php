<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['verified','auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = \Auth::user();
        return view('home', compact('user'));
    }

    /**
     *  Show User Settings
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function setting(){
        $user = \Auth::user();
        return view('setting', compact('user'));
    }

}
