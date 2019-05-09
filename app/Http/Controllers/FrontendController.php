<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $jobs = Job::latest()->take(10)->get();
        return view('welcome', compact('jobs'));
    }

    /**
     * @param \App\Job $job
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewJob(Job $job){
        return view('singleJob', compact('job'));
    }
}
