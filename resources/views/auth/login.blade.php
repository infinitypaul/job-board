@extends('layouts.app')

@section('content')
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>Log In</h2>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs" class="dark">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li>Log In</li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xl-5 offset-xl-3">


                <div class="login-register-page">
                    <!-- Welcome Text -->
                    <div class="welcome-text">
                        <h3>We're glad to see you again!</h3>
                        <span>Don't have an account? <a href="{{ url('/register') }}">Sign Up!</a></span>
                    </div>

                    <!-- Form -->
                    <form method="post" id="login-form" action="{{ route('login') }}">
                        @csrf
                        <div class="input-with-icon-left">
                            <i class="icon-material-baseline-mail-outline"></i>
                            <input type="text" class="input-text with-border" name="email" id="emailaddress" placeholder="Email Address" required autocomplete="email" autofocus  value="{{ old('email') }}" />
                            @error('email')
                            <div class="notification error closeable">
                                <p>{{ $message }}</p>
                                <a class="close" href="#"></a>
                            </div>
                            @enderror
                        </div>

                        <div class="input-with-icon-left">
                            <i class="icon-material-outline-lock"></i>
                            <input type="password" class="input-text with-border" name="password" id="password" placeholder="Password" required autocomplete="current-password"/>
                            @error('password')
                            <div class="notification error closeable">
                                <p>{{ $message }}</p>
                                <a class="close" href="#"></a>
                            </div>
                            @enderror
                        </div>
                        <!-- Button -->
                        <button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit">Log In <i class="icon-material-outline-arrow-right-alt"></i></button>
                    </form>

                </div>

            </div>
        </div>
    </div>
    <div class="margin-top-70"></div>
@endsection
