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
                    <form action="{{ route('job') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    <!-- Dashboard Box -->
                    <div class="col-xl-12">
                        <div class="dashboard-box margin-top-0">

                            <!-- Headline -->
                            <div class="headline">
                                <h3><i class="icon-feather-folder-plus"></i> Job Submission Form</h3>
                            </div>

                            <div class="content with-padding padding-bottom-10">
                                <div class="row">

                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>Job Title</h5>
                                            <input name="job_title" type="text" class="with-border">
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>Job Type</h5>
                                            <select name="job_type" class="selectpicker with-border" data-size="7" title="Select Job Type">
                                                <option>Full Time</option>
                                                <option>Freelance</option>
                                                <option>Part Time</option>
                                                <option>Internship</option>
                                                <option>Temporary</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>Job Category</h5>
                                            <select name="job_category" class="selectpicker with-border" data-size="7" title="Select Category">
                                                <option>Accounting and Finance</option>
                                                <option>Clerical & Data Entry</option>
                                                <option>Counseling</option>
                                                <option>Court Administration</option>
                                                <option>Human Resources</option>
                                                <option>Investigative</option>
                                                <option>IT and Computers</option>
                                                <option>Law Enforcement</option>
                                                <option>Management</option>
                                                <option>Miscellaneous</option>
                                                <option>Public Relations</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>Location</h5>
                                            <div class="input-with-icon">
                                                <div id="autocomplete-container">
                                                    <select name="location" class="selectpicker with-border" data-size="7" title="Select Job Type" data-live-search="true">
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
                                                        <option value="NG">Nigeria</option>
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
                                                <i class="icon-material-outline-location-on"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>Salary</h5>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="input-with-icon">
                                                        <input name="min_salary" class="with-border" type="text" placeholder="Min">
                                                        <i class="currency">USD</i>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="input-with-icon">
                                                        <input name="max_salary" class="with-border" type="text" placeholder="Max">
                                                        <i class="currency">USD</i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>Tags <span>(optional)</span>  <i class="help-icon" data-tippy-placement="right" title="Maximum of 10 tags"></i></h5>
                                            <div class="keywords-container">
                                                <div class="keyword-input-container">
                                                    <input name="tags" type="text" class="keyword-input with-border" placeholder="e.g. job title, responsibilites"/>

                                                </div>
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="submit-field">
                                            <h5>Job Description</h5>
                                            <textarea name="job_description" cols="30" rows="5" class="with-border"></textarea>
                                            <div class="uploadButton margin-top-30">
                                                <input class="uploadButton-input" name="document" type="file" accept="application/pdf" id="upload"/>
                                                <label class="uploadButton-button ripple-effect" for="upload">Upload Files</label>
                                                <span class="uploadButton-file-name">Images or documents that might be helpful in describing your job</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <button type="submit" class="button ripple-effect big margin-top-30"><i class="icon-feather-plus"></i> Post a Job</button>
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
