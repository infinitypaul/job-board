@extends('layouts.app')

@section('content')
    <div class="dashboard-container">
        @include('layouts.side')
        <div class="dashboard-content-container" data-simplebar>
            <div class="dashboard-content-inner" >

                <!-- Dashboard Headline -->
                <div class="dashboard-headline">
                    <h3>Manage Jobs</h3>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs" class="dark">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Dashboard</a></li>
                            <li>Manage Jobs</li>
                        </ul>
                    </nav>
                </div>

                <!-- Row -->
                <div class="row">

                    <!-- Dashboard Box -->
                    <div class="col-xl-12">
                        <div class="dashboard-box margin-top-0">

                            <!-- Headline -->
                            <div class="headline">
                                <h3><i class="icon-material-outline-business-center"></i> My Job Listings</h3>
                            </div>

                            <div class="content">
                                <ul class="dashboard-box-list">
                                    @foreach($jobs as $job)
                                    <li>
                                        <!-- Job Listing -->
                                        <div class="job-listing">

                                            <!-- Job Listing Details -->
                                            <div class="job-listing-details">


                                                <!-- Details -->
                                                <div class="job-listing-description">
                                                    <h3 class="job-listing-title"><a href="#">{{ $job->job_title }}</a></h3>

                                                    <!-- Job Listing Footer -->
                                                    <div class="job-listing-footer">
                                                        <ul>
                                                            <li><i class="icon-material-outline-date-range"></i> Posted on {{ $job->created_at }}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Buttons -->
                                        <div class="buttons-to-right always-visible">
                                            <a href="{{ route('manageCandidate', $job) }}" class="button ripple-effect"><i class="icon-material-outline-supervisor-account"></i> Manage Candidates <span class="button-info">{{ $job->applications->count() }}</span></a>
                                        </div>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Row / End -->

                @include('layouts.footer')

            </div>
        </div>

    </div>
@endsection
