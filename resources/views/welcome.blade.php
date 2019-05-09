@extends('layouts.app')

@section('content')
    <!-- Intro Banner
================================================== -->
    <div class="intro-banner dark-overlay big-padding">

        <!-- Transparent Header Spacer -->
        <div class="transparent-header-spacer"></div>

        <div class="container">

            <!-- Intro Headline -->
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-headline-alt">
                        <h3>Don't Just Dream, Do</h3>
                        <span>Find the best jobs in the digital industry</span>
                    </div>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="row">
                <div class="col-md-12">
                    <div class="intro-banner-search-form margin-top-95">

                        <!-- Search Field -->
                        <div class="intro-search-field with-autocomplete">
                            <label for="autocomplete-input" class="field-title ripple-effect">Where?</label>
                            <div class="input-with-icon">
                                <input id="autocomplete-input" type="text" placeholder="Online Job">
                                <i class="icon-material-outline-location-on"></i>
                            </div>
                        </div>

                        <!-- Search Field -->
                        <div class="intro-search-field">
                            <label for ="intro-keywords" class="field-title ripple-effect">What job you want?</label>
                            <input id="intro-keywords" type="text" placeholder="Job Title or Keywords">
                        </div>

                        <!-- Button -->
                        <div class="intro-search-button">
                            <button class="button ripple-effect"">Search</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="intro-stats margin-top-45 hide-under-992px">
                        <li>
                            <strong class="counter">1,586</strong>
                            <span>Jobs Posted</span>
                        </li>
                        <li>
                            <strong class="counter">3,543</strong>
                            <span>Tasks Posted</span>
                        </li>
                        <li>
                            <strong class="counter">1,232</strong>
                            <span>Freelancers</span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

        <!-- Video Container -->
        <div class="video-container" data-background-image="images/home-video-background-poster.jpg">
            <video loop autoplay muted>
                <source src="images/home-video-background.mp4" type="video/mp4">
            </video>
        </div>

    </div>

    <!-- Content
    ================================================== -->
    <!-- Features Jobs -->
    <div class="section padding-top-65 padding-bottom-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">

                    <!-- Section Headline -->
                    <div class="section-headline margin-top-0 margin-bottom-35">
                        <h3>Recent Jobs</h3>
                        <a href="#" class="headline-link">Browse All Jobs</a>
                    </div>

                    <!-- Jobs Container -->
                    <div class="listings-container compact-list-layout margin-top-35">

                        @foreach($jobs as $job)
                        <a href="{{ route('viewJob', $job) }}" class="job-listing with-apply-button">

                            <!-- Job Listing Details -->
                            <div class="job-listing-details">

                                <!-- Logo -->
                                <div class="job-listing-company-logo">
                                    <img src="{{ $job->user->avatar() }}" alt="">
                                </div>

                                <!-- Details -->
                                <div class="job-listing-description">
                                    <h3 class="job-listing-title">{{ ucwords($job->job_title) }}</h3>

                                    <!-- Job Listing Footer -->
                                    <div class="job-listing-footer">
                                        <ul>
                                            <li><i class="icon-material-outline-business"></i> {{ ucwords($job->user->name) }} <div class="verified-badge" title="Verified Employer" data-tippy-placement="top"></div></li>
                                            <li><i class="icon-material-outline-location-on"></i> {{ $job->location }}</li>
                                            <li><i class="icon-material-outline-business-center"></i> {{ $job->job_type }}</li>
                                            <li><i class="icon-material-outline-access-time"></i> {{ $job->created_at->diffForHumans() }}</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Apply Button -->
                                <span class="list-apply-button ripple-effect">Apply Now</span>
                            </div>
                        </a>
                        @endforeach

                    </div>
                    <!-- Jobs Container / End -->

                </div>
            </div>
        </div>
    </div>
    <!-- Featured Jobs / End -->
@endsection
