<?php

namespace App\Http\Controllers;

use App\Application;
use App\Http\Requests\JobCreationRequest;
use App\Job;
use App\Notifications\ContactApplicant;
use App\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['verified','auth', 'employee']);
    }

    /**
     *  Return Post Job View
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $user = \Auth::user();
        return view('postJob', compact('user'));
    }

    /**
     * @param \App\Http\Requests\JobCreationRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postJob(JobCreationRequest $request){
        //dd($request->all());
        $user = \Auth::user();
        $job = new Job();
        $job->job_title = $request->job_title;
        $job->job_type = $request->job_type;
        $job->job_category = $request->job_category;
        $job->location = $request->location;
        $job->min_salary = $request->min_salary;
        $job->max_salary = $request->max_salary;
        $job->tags = $request->tags;
        $job->job_description = $request->job_description;
        $job->document = $request->file('document')->store('designs/proville/employee', 's3');
        $job->user()->associate($user);
        $job->save();

        return redirect()->back()->with('success', 'Job Created Successfully');
    }

    /**
     *  Manage Job Created
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function manageJob(){
        $jobs = Job::latest()->take(10)->get();
        return view('manageJobs', compact('jobs'));
    }

    /**
     * @param \App\Job $job
     * Manage Candidate
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function manageCandidate(Job $job){
        return view('manageCandidate', compact('job'));
    }

    /**
     * Send Message To Candidate That applied
     * @param \App\Application $application
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendMessageToCandidate(Application $application, Request $request){
        $application->user->notify(new ContactApplicant($application->job, $request->message));
        return redirect()->back()->with('success', 'Message Sent Successfully');
    }
}
