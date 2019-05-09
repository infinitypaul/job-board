<?php

namespace App\Http\Controllers;

use App\Application;
use App\Http\Requests\ResumeRequest;
use App\Job;
use App\Notifications\JobApplied;
use App\Resume;
use Illuminate\Http\Request;

class FreelanceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['verified','auth', 'freelance']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function resume(){
        $user = \Auth::user();
        return view('resume', compact('user'));
    }

    /**
     * @param \App\Http\Requests\ResumeRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postResume(ResumeRequest $request){
        $user = \Auth::user();
        $resume = Resume::updateOrCreate(
            ['user_id' => $user->id],
            [
            'rate' => $request->rate,
            'skills' => $request->skills,
            'tagline' => $request->tagline,
            'nationality' => $request->nationality,
            'about_me' => $request->about_me,
            'user_id' => $user->id
        ]);
        if ($request->hasFile('document')) {
            $resume->document = $request->file('document')->store('designs/proville/document', 's3');
            $resume->save();
        }
        return redirect()->back()->with('success', 'Resume Updated Successfully');
    }

    /**
     * @param \App\Job $job
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function applyForJob(Job $job){
        $user = \Auth::user();
        if($user->applications()->where('job_id', $job->id)->exists()){
            return redirect()->back()->with('success', 'You have already applied for the job');
        }
        $application = new Application();
        $application->user()->associate($user);
        $application->job()->associate($job);
        $application->save();

        $job->user->notify(new JobApplied($job, $user));

        return redirect()->route('home')->with('success', 'Application Sent Successfully');
    }
}
