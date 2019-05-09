@extends('layouts.app')

@section('content')
    <!-- Titlebar
================================================== -->
    <div class="single-page-header" data-background-image="images/single-job.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="single-page-header-inner">
                        <div class="left-side">
                            <div class="header-image"><a href="#"><img src="{{ $job->user->avatar() }}" alt=""></a></div>
                            <div class="header-details">
                                <h3>{{ ucwords($job->user->name) }}</h3>
                                <h5>About the Employer</h5>
                                <ul>
                                    <li><div class="star-rating" data-rating="4.9"></div></li>
                                    <li><img class="flag" src="images/flags/{{strtolower($job->location)}}.svg" alt=""> {{ $job->location }}</li>
                                    <li><div class="verified-badge-with-title">Verified</div></li>
                                </ul>
                            </div>
                        </div>
                        <div class="right-side">
                            <div class="salary-box">
                                <div class="salary-type">Annual Salary</div>
                                <div class="salary-amount">${{number_format($job->min_salary)}} - ${{number_format($job->max_salary)}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Page Content
    ================================================== -->
    <div class="container">
        <div class="row">

            <!-- Content -->
            <div class="col-xl-8 col-lg-8 content-right-offset">

                <div class="single-page-section">
                    <h3 class="margin-bottom-25">Job Description</h3>
                    <p>{!!   nl2br(e($job->job_description)) !!}</p>

                </div>

            </div>


            <!-- Sidebar -->
            <div class="col-xl-4 col-lg-4">
                <div class="sidebar-container">

                    <a href="{{ route('apply', $job) }}" class="apply-now-button"
                       onclick="event.preventDefault();
                                                     document.getElementById('apply').submit();"
                    >Apply Now <i class="icon-material-outline-arrow-right-alt"></i></a>
                    <form id="apply" action="{{ route('apply', $job) }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    <!-- Sidebar Widget -->
                    <div class="sidebar-widget">
                        <div class="job-overview">
                            <div class="job-overview-headline">Job Summary</div>
                            <div class="job-overview-inner">
                                <ul>
                                    <li>
                                        <i class="icon-material-outline-location-on"></i>
                                        <span>Location</span>
                                        <h5>{{ $job->location }}</h5>
                                    </li>
                                    <li>
                                        <i class="icon-material-outline-business-center"></i>
                                        <span>Job Type</span>
                                        <h5>{{ $job->job_type }}</h5>
                                    </li>
                                    <li>
                                        <i class="icon-material-outline-local-atm"></i>
                                        <span>Salary</span>
                                        <h5>${{number_format($job->min_salary)}} - ${{number_format($job->max_salary)}}</h5>
                                    </li>
                                    <li>
                                        <i class="icon-material-outline-access-time"></i>
                                        <span>Date Posted</span>
                                        <h5>{{ $job->created_at->diffForHumans() }}</h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Widget -->
                    <div class="sidebar-widget">
                        <h3>Bookmark or Share</h3>

                        <!-- Bookmark Button -->
                        <button class="bookmark-button margin-bottom-25">
                            <span class="bookmark-icon"></span>
                            <span class="bookmark-text">Bookmark</span>
                            <span class="bookmarked-text">Bookmarked</span>
                        </button>

                        <!-- Copy URL -->
                        <div class="copy-url">
                            <input id="copy-url" type="text" value="" class="with-border">
                            <button class="copy-url-button ripple-effect" data-clipboard-target="#copy-url" title="Copy to Clipboard" data-tippy-placement="top"><i class="icon-material-outline-file-copy"></i></button>
                        </div>

                        <!-- Share Buttons -->
                        <div class="share-buttons margin-top-25">
                            <div class="share-buttons-trigger"><i class="icon-feather-share-2"></i></div>
                            <div class="share-buttons-content">
                                <span>Interesting? <strong>Share It!</strong></span>
                                <ul class="share-buttons-icons">
                                    <li><a href="#" data-button-color="#3b5998" title="Share on Facebook" data-tippy-placement="top"><i class="icon-brand-facebook-f"></i></a></li>
                                    <li><a href="#" data-button-color="#1da1f2" title="Share on Twitter" data-tippy-placement="top"><i class="icon-brand-twitter"></i></a></li>
                                    <li><a href="#" data-button-color="#dd4b39" title="Share on Google Plus" data-tippy-placement="top"><i class="icon-brand-google-plus-g"></i></a></li>
                                    <li><a href="#" data-button-color="#0077b5" title="Share on LinkedIn" data-tippy-placement="top"><i class="icon-brand-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
