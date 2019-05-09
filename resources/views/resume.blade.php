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

                    <h3>Resume</h3>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs" class="dark">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Dashboard</a></li>
                            <li>Resume</li>
                        </ul>
                    </nav>
                </div>
                @if(session()->has('success'))
                <div class="notification success closeable">
                    <p>You did it, now relax and enjoy it</p>
                    <a class="close" href="#"></a>
                </div>
                @endif
                <!-- Row -->
                <div class="row">

                    <!-- Dashboard Box -->
                    <form method="post" enctype="multipart/form-data" action="{{ route('resume') }}">
                        @csrf
                    <div class="col-xl-12">
                        <div class="dashboard-box">

                            <!-- Headline -->
                            <div class="headline">
                                <h3><i class="icon-material-outline-face"></i> My Resume</h3>
                            </div>

                            <div class="content">
                                <ul class="fields-ul">
                                    <li>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <div class="submit-field">
                                                    <div class="bidding-widget">
                                                        <!-- Headline -->
                                                        <span class="bidding-detail">Set your <strong>minimal hourly rate</strong></span>

                                                        <!-- Slider -->
                                                        <div class="bidding-value margin-bottom-10">$<span id="biddingVal"></span></div>
                                                        <input class="bidding-slider" type="text" value="{{ old('rate') ? old('rate') : optional($user->resume)->rate }}" data-slider-handle="custom" data-slider-currency="$" data-slider-min="5" data-slider-max="150" data-slider-value="{{ old('rate') ? old('rate') : optional($user->resume)->rate }}" data-slider-step="1" data-slider-tooltip="hide" name="rate" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-4">
                                                <div class="submit-field">
                                                    <h5>Skills <i class="help-icon" data-tippy-placement="right" title="Add up to 10 skills"></i></h5>

                                                    <!-- Skills List -->
                                                    <div class="keywords-container">
                                                        <div class="keyword-input-container">
                                                            <input type="text" class="keyword-input with-border" placeholder="e.g. Angular, Laravel" name="skills" value="{{ old('skills') ? old('skills') : optional($user->resume)->skills }}"/>
                                                        </div>
                                                        <div class="keywords-list">
                                                            <span class="keyword"><span class="keyword-remove"></span><span class="keyword-text">Angular</span></span>
                                                            <span class="keyword"><span class="keyword-remove"></span><span class="keyword-text">Vue JS</span></span>
                                                            <span class="keyword"><span class="keyword-remove"></span><span class="keyword-text">iOS</span></span>
                                                            <span class="keyword"><span class="keyword-remove"></span><span class="keyword-text">Android</span></span>
                                                            <span class="keyword"><span class="keyword-remove"></span><span class="keyword-text">Laravel</span></span>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-4">
                                                <div class="submit-field">
                                                    <h5>Attachments</h5>

                                                    <!-- Attachments -->
                                                    <div class="attachments-container margin-top-0 margin-bottom-0">
                                                        <div class="attachment-box ripple-effect">
                                                            @if(!is_null(optional($user->resume)->document))
                                                            <span>CV</span>
                                                            <i>PDF</i>

                                                                @endif
                                                        </div>

                                                    </div>
                                                    <div class="clearfix"></div>

                                                    <!-- Upload Button -->
                                                    <div class="uploadButton margin-top-0">
                                                        <input class="uploadButton-input" type="file" accept="application/pdf" id="upload"  name="document" multiple/>
                                                        <label class="uploadButton-button ripple-effect" for="upload">Upload Files</label>
                                                        <span class="uploadButton-file-name">Maximum file size: 10 MB</span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>Tagline</h5>
                                                    <input name="tagline" type="text" class="with-border" value="{{ old('tagline') ? old('tagline') : optional($user->resume)->tagline }}">
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>Nationality</h5>
                                                    <select name="nationality" class="selectpicker with-border" data-size="7" title="{{ optional($user->resume)->nationality ? optional($user->resume)->nationality : 'Select Job Type' }}" data-live-search="true">
                                                        <option value="AR">Argentina</option>
                                                        <option value="AM">Armenia</option>
                                                        <option value="AW">Aruba</option>
                                                        <option value="AU">Australia</option>
                                                        <option value="AT">Austria</option>
                                                        <option value="AZ">Azerbaijan</option>
                                                        <option value="BS">Bahamas</option>
                                                        <option value="BH">Bahrain</option>
                                                        <option value="BD">Bangladesh</option>
                                                        <option value="BB">Barbados</option>
                                                        <option value="BY">Belarus</option>
                                                        <option value="BE">Belgium</option>
                                                        <option value="BZ">Belize</option>
                                                        <option value="BJ">Benin</option>
                                                        <option value="BM">Bermuda</option>
                                                        <option value="BT">Bhutan</option>
                                                        <option value="BG">Bulgaria</option>
                                                        <option value="BF">Burkina Faso</option>
                                                        <option value="BI">Burundi</option>
                                                        <option value="KH">Cambodia</option>
                                                        <option value="CM">Cameroon</option>
                                                        <option value="CA">Canada</option>
                                                        <option value="CV">Cape Verde</option>
                                                        <option value="KY">Cayman Islands</option>
                                                        <option value="CO">Colombia</option>
                                                        <option value="KM">Comoros</option>
                                                        <option value="CG">Congo</option>
                                                        <option value="CK">Cook Islands</option>
                                                        <option value="CR">Costa Rica</option>
                                                        <option value="CI">Côte d'Ivoire</option>
                                                        <option value="HR">Croatia</option>
                                                        <option value="CU">Cuba</option>
                                                        <option value="CW">Curaçao</option>
                                                        <option value="CY">Cyprus</option>
                                                        <option value="CZ">Czech Republic</option>
                                                        <option value="DK">Denmark</option>
                                                        <option value="DJ">Djibouti</option>
                                                        <option value="DM">Dominica</option>
                                                        <option value="DO">Dominican Republic</option>
                                                        <option value="EC">Ecuador</option>
                                                        <option value="EG">Egypt</option>
                                                        <option value="GP">Guadeloupe</option>
                                                        <option value="GU">Guam</option>
                                                        <option value="GT">Guatemala</option>
                                                        <option value="GG">Guernsey</option>
                                                        <option value="GN">Guinea</option>
                                                        <option value="GW">Guinea-Bissau</option>
                                                        <option value="GY">Guyana</option>
                                                        <option value="HT">Haiti</option>
                                                        <option value="HN">Honduras</option>
                                                        <option value="HK">Hong Kong</option>
                                                        <option value="HU">Hungary</option>
                                                        <option value="IS">Iceland</option>
                                                        <option value="IN">India</option>
                                                        <option value="ID">Indonesia</option>
                                                        <option value="NO">Norway</option>
                                                        <option value="OM">Oman</option>
                                                        <option value="PK">Pakistan</option>
                                                        <option value="PW">Palau</option>
                                                        <option value="PA">Panama</option>
                                                        <option value="PG">Papua New Guinea</option>
                                                        <option value="PY">Paraguay</option>
                                                        <option value="PE">Peru</option>
                                                        <option value="PH">Philippines</option>
                                                        <option value="PN">Pitcairn</option>
                                                        <option value="PL">Poland</option>
                                                        <option value="PT">Portugal</option>
                                                        <option value="PR">Puerto Rico</option>
                                                        <option value="QA">Qatar</option>
                                                        <option value="RE">Réunion</option>
                                                        <option value="RO">Romania</option>
                                                        <option value="RU">Russian Federation</option>
                                                        <option value="RW">Rwanda</option>
                                                        <option value="SZ">Swaziland</option>
                                                        <option value="SE">Sweden</option>
                                                        <option value="CH">Switzerland</option>
                                                        <option value="TR">Turkey</option>
                                                        <option value="TM">Turkmenistan</option>
                                                        <option value="TV">Tuvalu</option>
                                                        <option value="UG">Uganda</option>
                                                        <option value="UA">Ukraine</option>
                                                        <option value="GB">United Kingdom</option>
                                                        <option value="US" selected>United States</option>
                                                        <option value="UY">Uruguay</option>
                                                        <option value="UZ">Uzbekistan</option>
                                                        <option value="YE">Yemen</option>
                                                        <option value="ZM">Zambia</option>
                                                        <option value="ZW">Zimbabwe</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-xl-12">
                                                <div class="submit-field">
                                                    <h5>Introduce Yourself</h5>
                                                    <textarea name="about_me" cols="30" rows="5" class="with-border">{{ old('about_me') ? old('about_me') : optional($user->resume)->about_me }}.</textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="col-xl-12">
                        <button type="submit" class="button ripple-effect big margin-top-30">Save Changes</button>
                    </div>
                    </form>

                </div>
                <!-- Row / End -->

                @include('layouts.footer')

            </div>
        </div>
        <!-- Dashboard Content / End -->

    </div>
@endsection
