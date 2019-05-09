@extends('layouts.app')

@section('content')
<div class="dashboard-container">
        @include('layouts.side')
    <!-- Dashboard Content
	================================================== -->
    <div class="dashboard-content-container" data-simplebar>
        <div class="dashboard-content-inner" >

            <!-- Dashboard Headline -->
            <div class="dashboard-headline">
                <h3>Howdy, {{ $user->name }}!</h3>
                <span>We are glad to see you again!</span>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs" class="dark">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li>Dashboard</li>
                    </ul>
                </nav>
            </div>

            <!-- Fun Facts Container -->
            <div class="fun-facts-container">
                @if($user->account_type)
                <div class="fun-fact" data-fun-fact-color="#36bd78">
                    <div class="fun-fact-text">
                        <span>Total Job</span>
                        <h4>{{ $user->jobs->count() }}</h4>
                    </div>
                    <div class="fun-fact-icon"><i class="icon-material-outline-gavel"></i></div>
                </div>
                @else
                    <div class="fun-fact" data-fun-fact-color="#b81b7f">
                        <div class="fun-fact-text">
                            <span>Jobs Applied</span>
                            <h4>{{ $user->applications->count() }}</h4>
                        </div>
                        <div class="fun-fact-icon"><i class="icon-material-outline-business-center"></i></div>
                    </div>

                    @endif
                    <div class="fun-fact" data-fun-fact-color="#36bd78">
                        <div class="fun-fact-text">
                            <span>Total Notifications</span>
                            <h4>{{ $user->notifications->count() }}</h4>
                        </div>
                        <div class="fun-fact-icon"><i class="icon-material-outline-gavel"></i></div>
                    </div>
                <!-- Last one has to be hidden below 1600px, sorry :( -->
                    <div class="fun-fact" data-fun-fact-color="#2a41e6">
                        <div class="fun-fact-text">
                            <span>This Month Views</span>
                            <h4>987</h4>
                        </div>
                        <div class="fun-fact-icon"><i class="icon-feather-trending-up"></i></div>
                    </div>
            </div>


            <!-- Row -->
            <div class="row">

                <!-- Dashboard Box -->
                <div class="col-xl-12">
                    <div class="dashboard-box">
                        <div class="headline">
                            <h3><i class="icon-material-baseline-notifications-none"></i> Notifications</h3>
                            <button class="mark-as-read ripple-effect-dark" data-tippy-placement="left" title="Mark all as read">
                                <i class="icon-feather-check-square"></i>
                            </button>
                        </div>
                        <div class="content">
                            <ul class="dashboard-box-list">
                                @foreach ($user->notifications()->latest()->take(6)->get() as $notification)
                                    <li>
                                    <span class="notification-icon"><i class="{{ $notification->data['icon'] }}"></i></span>
                                    <span class="notification-text">
										<strong>{{ $notification->data['username'] }}</strong> {{ $notification->data['message'] }}</a>
									</span>
                                    <!-- Buttons -->
                                    <div class="buttons-to-right">
                                        <a href="#" class="button ripple-effect ico" title="Mark as read" data-tippy-placement="left"><i class="icon-feather-check-square"></i></a>
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
    <!-- Dashboard Content / End -->

</div>
@endsection
