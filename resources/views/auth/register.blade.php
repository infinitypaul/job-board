@extends('layouts.app')

@section('content')
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>Register</h2>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs" class="dark">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>Register</li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>


    <!-- Page Content
    ================================================== -->
    <div class="container">
        <div class="row">
            <div class="col-xl-5 offset-xl-3">

                <div class="login-register-page">

                    <!-- Welcome Text -->
                    <div class="welcome-text">
                        <h3 style="font-size: 26px;">Let's create your account!</h3>
                        <span>Already have an account? <a href="{{ url('/login') }}">Log In!</a></span>
                    </div>
                    <!-- Form -->
                    <form method="post" id="register-account-form"  action="{{ route('register') }}">
                    @csrf
                    <!-- Account Type -->
                    <div class="account-type">
                        <div>
                            <input type="radio" value="0" name="account_type" id="freelancer-radio" class="account-type-radio" checked/>
                            <label for="freelancer-radio" class="ripple-effect-dark"><i class="icon-material-outline-account-circle"></i> Freelancer</label>
                        </div>

                        <div>
                            <input type="radio" value="1"  name="account_type" id="employer-radio" class="account-type-radio"/>
                            <label for="employer-radio" class="ripple-effect-dark"><i class="icon-material-outline-business-center"></i> Employer</label>
                        </div>
                    </div>

                        <div class="input-with-icon-left">
                            <i class="icon-material-outline-face"></i>
                            <input type="text" class="input-text with-border" name="name"  placeholder="FullName" value="{{ old('name') }}" autocomplete="name" autofocus required/>
                            @error('name')
                            <div class="notification error closeable">
                                <p>{{ $message }}</p>
                                <a class="close" href="#"></a>
                            </div>
                            @enderror
                        </div>

                        <div class="input-with-icon-left">
                            <i class="icon-material-baseline-mail-outline"></i>
                            <input type="email" class="input-text with-border has-error" name="email" id="emailaddress-register" placeholder="Email Address" value="{{ old('email') }}" required autocomplete="email"/>
                            @error('email')
                            <div class="notification error closeable">
                                <p>{{ $message }}</p>
                                <a class="close" href="#"></a>
                            </div>
                            @enderror
                        </div>

                        <div class="input-with-icon-left" title="Should be at least 8 characters long" data-tippy-placement="bottom">
                            <i class="icon-material-outline-lock"></i>
                            <input type="password" class="input-text with-border" name="password" id="password-register" placeholder="Password" autocomplete="password" required/>
                            @error('password')
                            <div class="notification error closeable">
                                <p>{{ $message }}</p>
                                <a class="close" href="#"></a>
                            </div>
                            @enderror
                        </div>

                        <div class="input-with-icon-left">
                            <i class="icon-material-outline-lock"></i>
                            <input type="password" class="input-text with-border" name="password_confirmation" id="password-repeat-register" autocomplete="password_confirmation" placeholder="Repeat Password" required/>
                        </div>
                        <!-- Button -->
                        <button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit">Register <i class="icon-material-outline-arrow-right-alt"></i></button>
                    </form>


                </div>

            </div>
        </div>
    </div>

    <div class="margin-top-70"></div>
@endsection
