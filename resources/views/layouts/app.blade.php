<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/colors/blue.css') }}" rel="stylesheet">
</head>
<body>
    <div id="{{'wrapper'}}@if(in_array(Route::currentRouteName(), ['welcome']))-with-transparent-header @endif">
        <header id="header-container" class="fullwidth @if(in_array(Route::currentRouteName(), ['home'])) dashboard-header not-sticky @elseif(in_array(Route::currentRouteName(), ['welcome'])) transparent-header  @endif">

            <!-- Header -->
            <div id="header">
                <div class="container">

                    <!-- Left Side Content -->
                    <div class="left-side">

                        <!-- Logo -->
                        <div id="logo">
                            <a href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}" alt=""></a>
                        </div>

                        <!-- Main Navigation -->
                        <nav id="navigation">
                            <ul id="responsive">

                                <li><a href="{{ url('/') }}">Home</a></li>
                                @guest
                                <li><a href="{{ url('/register') }}">Register</a></li>

                                <li><a href="{{ url('/login') }}">Login</a></li>
                                 @endguest
                            </ul>
                        </nav>
                        <div class="clearfix"></div>
                        <!-- Main Navigation / End -->

                    </div>
                    <!-- Left Side Content / End -->
                    @auth
                        <!-- Right Side Content / End -->
                        <div class="right-side">

                            <!-- User Menu -->
                            <div class="header-widget">

                                <!-- Messages -->
                                <div class="header-notifications user-menu">
                                    <div class="header-notifications-trigger">
                                        <a href="#"><div class="user-avatar status-online"><img src="{{ asset(Auth::user()->avatar()) }}" alt=""></div></a>
                                    </div>

                                    <!-- Dropdown -->
                                    <div class="header-notifications-dropdown">

                                        <!-- User Status -->
                                        <div class="user-status">

                                            <!-- User Name / Avatar -->
                                            <div class="user-details">
                                                <div class="user-avatar status-online"><img src="{{ asset(Auth::user()->avatar()) }}" alt=""></div>
                                                <div class="user-name">
                                                    {{ Auth::user()->name }} <span>Freelancer</span>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="user-menu-small-nav">
                                            <li><a href="{{ route('home') }}"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
                                            <li><a href="{{ route('setting') }}"><i class="icon-material-outline-settings"></i> Settings</a></li>
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    <i class="icon-material-outline-power-settings-new"></i>{{ __('Logout') }}
                                                </a>
                                            </li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </ul>

                                    </div>
                                </div>

                            </div>
                            <!-- User Menu / End -->

                            <!-- Mobile Navigation Button -->
                            <span class="mmenu-trigger">
                        <button class="hamburger hamburger--collapse" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </span>

                        </div>
                        <!-- Right Side Content / End -->
                    @endauth

                </div>
            </div>
            <!-- Header / End -->

        </header>
        <div class="clearfix"></div>
            @yield('content')
        @if(in_array(Route::currentRouteName(), ['welcome']))
        <div id="footer">
            <!-- Footer Copyrights -->
            <div class="footer-bottom-section">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            © 2018 <strong>Proville</strong>. All Rights Reserved.
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Copyrights / End -->

        </div>
         @endif
    </div>

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.0.min.js') }}"></script>
    <script src="{{ asset('js/mmenu.min.js') }}"></script>
    <script src="{{ asset('js/tippy.all.min.js') }}"></script>
    <script src="{{ asset('js/simplebar.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-slider.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/snackbar.js') }}"></script>
    <script src="{{ asset('js/clipboard.min.js') }}"></script>
    <script src="{{ asset('js/counterup.min.js') }}"></script>
    <script src="{{ asset('js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <!-- Google Autocomplete -->
    <script>
        function initAutocomplete() {
            var options = {
                types: ['(cities)'],
                // componentRestrictions: {country: "us"}
            };

            var input = document.getElementById('autocomplete-input');
            var autocomplete = new google.maps.places.Autocomplete(input, options);
        }

        // Autocomplete adjustment for homepage
        if ($('.intro-banner-search-form')[0]) {
            setTimeout(function(){
                $(".pac-container").prependTo(".intro-search-field.with-autocomplete");
            }, 300);
        }

    </script>

    <!-- Google API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgeuuDfRlweIs7D6uo4wdIHVvJ0LonQ6g&libraries=places&callback=initAutocomplete"></script>
@stack('scripts')
</body>
</html>
