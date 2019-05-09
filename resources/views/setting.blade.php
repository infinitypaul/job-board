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

                    <h3>Settings</h3>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs" class="dark">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Dashboard</a></li>
                            <li>Settings</li>
                        </ul>
                    </nav>
                </div>
                @if(session()->has('success'))
                <div class="notification success closeable">
                    <p>{{ session()->get('success') }}</p>
                    <a class="close" href="#"></a>
                </div>
                @endif
                <!-- Row -->
                <div class="row">

                    <!-- Dashboard Box -->
                    <div class="col-xl-12">
                        <div class="dashboard-box margin-top-0">

                            <!-- Headline -->
                            <div class="headline">
                                <h3><i class="icon-material-outline-account-circle"></i> My Account</h3>
                            </div>

                            <div class="content with-padding padding-bottom-0">
                                <form method="post" enctype="multipart/form-data" action="{{ route('setting') }}">
                                <div class="row">

                                    <div class="col-auto">
                                        <div class="avatar-wrapper" data-tippy-placement="bottom" title="Change Avatar">
                                            <img class="profile-pic" src="{{ $user->avatar() }}" alt="" />
                                            <div class="upload-button"></div>
                                            <input class="file-upload" name="picture" type="file" accept="image/*" value=""/>
                                        </div>
                                    </div>

                                    <div class="col">
                                            @csrf
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>Full Name</h5>
                                                    <input type="text" class="with-border" value="{{ old('name') ? old('name') : $user->name }}" name="fullname">
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>Email Address</h5>
                                                    <input readonly type="text" class="with-border" value="{{ old('email') ? old('email') : $user->email }}">
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <!-- Account Type -->
                                                <div class="submit-field">
                                                    <h5>Account Type</h5>
                                                    <div class="account-type">
                                                        @if($user->account_type)
                                                            <div>
                                                                <input type="radio" name="account-type" id="employer-radio" class="account-type-radio"/>
                                                                <label for="employer-radio" class="ripple-effect-dark"><i class="icon-material-outline-business-center"></i> Employer</label>
                                                            </div>
                                                        @else
                                                            <div>
                                                                <input type="radio" name="account-type" id="freelancer-radio" class="account-type-radio" checked/>
                                                                <label for="freelancer-radio" class="ripple-effect-dark"><i class="icon-material-outline-account-circle"></i> Freelancer</label>
                                                            </div>
                                                            @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                        <button type="submit" class="button ripple-effect big margin-top-30">Update Basic Profile</button>

                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <!-- Dashboard Box -->
                    <div class="col-xl-12">
                        <div id="test1" class="dashboard-box">

                            <!-- Headline -->
                            <div class="headline">
                                <h3><i class="icon-material-outline-lock"></i> Password & Security</h3>
                            </div>

                            <div class="content with-padding">
                                <form action="{{ route('change_password') }}" method="post">
                                    @csrf
                                    <div class="row">
                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>Current Password</h5>
                                            <input type="password" name="current_password" class="with-border">
                                            @error('current_password')
                                            <div class="notification error closeable">
                                                <p>{{ $message }}</p>
                                                <a class="close" href="#"></a>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>New Password</h5>
                                            <input type="password" name="password" class="with-border">
                                            @error('password')
                                            <div class="notification error closeable">
                                                <p>{{ $message }}</p>
                                                <a class="close" href="#"></a>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>Repeat New Password</h5>
                                            <input type="password" name="password_confirmation" class="with-border">
                                        </div>
                                    </div>
                                </div>
                                    <div class="col-xl-12">
                                        <button type="submit" class="button ripple-effect big margin-top-30">Save Changes</button>
                                    </div>
                                </form>
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
