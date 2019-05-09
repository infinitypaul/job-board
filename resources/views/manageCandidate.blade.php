@extends('layouts.app')

@section('content')
    <div class="dashboard-container">
        @include('layouts.side')
        <div class="dashboard-content-container" data-simplebar>
            <div class="dashboard-content-inner" >

                <!-- Dashboard Headline -->
                <div class="dashboard-headline">
                    <h3>Manage Candidates</h3>
                    <span class="margin-top-7">Job Applications for <a href="#">{{ ucwords($job->job_title) }}</a></span>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs" class="dark">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Dashboard</a></li>
                            <li>Manage Candidates</li>
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
                                <h3><i class="icon-material-outline-supervisor-account"></i> {{ $job->applications->count() }} {{ Str::plural('Candidate', $job->applications->count())  }}</h3>
                            </div>

                            <div class="content">
                                <ul class="dashboard-box-list">
                                    @foreach($job->applications as $application)
                                    <li>
                                        <!-- Overview -->
                                        <div class="freelancer-overview manage-candidates">
                                            <div class="freelancer-overview-inner">

                                                <!-- Avatar -->
                                                <div class="freelancer-avatar">
                                                    <div class="verified-badge"></div>
                                                    <a href="#"><img src="{{ asset($application->user->picture) }}" alt=""></a>
                                                </div>

                                                <!-- Name -->
                                                <div class="freelancer-name">
                                                    <h4><a href="#">{{ $application->user->name }} <img class="flag" src="{{ asset('images/flags/'.strtolower($application->user->resume->nationality).'.svg') }}" alt="" title="{{ $application->user->resume->nationality }}" data-tippy-placement="top"></a></h4>

                                                    <!-- Details -->
                                                    <span class="freelancer-detail-item"><a href="#"><i class="icon-feather-mail"></i> {{ $application->user->email }}</a></span>


                                                    <!-- Buttons -->
                                                    <div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">
                                                        <a download="{{ $application->user->name }}" href="{{ asset($application->user->resume->cv()) }}" class="button ripple-effect"><i class="icon-feather-file-text"></i> Download CV</a>
                                                        <a href="#small-dialog" class="popup-with-zoom-anim button dark ripple-effect callModal" data-f-id="{{$application->id}}" data-f-name="{{$application->user->name}}"><i class="icon-feather-mail"></i> Send Message</a>
                                                    </div>
                                                </div>
                                            </div>
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
    <div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

        <!--Tabs -->
        <div class="sign-in-form">

            <ul class="popup-tabs-nav">
                <li><a href="#tab">Send Message</a></li>
            </ul>

            <div class="popup-tabs-container">

                <!-- Tab -->
                <div class="popup-tab-content" id="tab">

                    <!-- Welcome Text -->
                    <div class="welcome-text">
                        <h3 id="get_hire_name"></h3>
                    </div>

                    <!-- Form -->
                    <form method="post" action="" id="send-pm">
                        @csrf
                        <textarea name="message" cols="10" placeholder="Message" class="with-border" required></textarea>


                    <!-- Button -->
                    <button class="button full-width button-sliding-icon ripple-effect" type="submit" form="send-pm">Send <i class="icon-material-outline-arrow-right-alt"></i></button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(function() {
            $('body').on("click",".callModal", function() {
                var f_id = $(this).data('f-id');
                var f_name = $(this).data('f-name');
                $("#send-pm").attr('action', '/sendmessage/'+f_id);
                $('#get_hire_name').html('Direct Message To '+f_name);
            });
        });
    </script>
@endpush

