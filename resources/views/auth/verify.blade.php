@extends('layouts.app')

@section('content')
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h3>{{ __('Verify Your Email Address') }}</h3>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs" class="dark">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>Email Verification</li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="row">
            <div class="col-xl-12">

                <section id="not-found" class="center margin-top-50 margin-bottom-25">
                    @if (session('resent'))
                        <div class="notification success closeable">
                            <p>{{ __('A fresh verification link has been sent to your email address.') }}</p>
                            <a class="close" href="#"></a>
                        </div>
                    @endif
                        <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                        <p>{{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.</p>

                </section>

            </div>
        </div>

    </div>

    <div class="margin-top-70"></div>

@endsection
