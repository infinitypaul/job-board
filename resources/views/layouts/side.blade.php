
<div class="dashboard-sidebar">
    <div class="dashboard-sidebar-inner" data-simplebar>
        <div class="dashboard-nav-container">

            <!-- Responsive Navigation Trigger -->
            <a href="#" class="dashboard-responsive-nav-trigger">
					<span class="hamburger hamburger--collapse" >
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</span>
                <span class="trigger-title">Dashboard Navigation</span>
            </a>

            <!-- Navigation -->
            <div class="dashboard-nav">
                <div class="dashboard-nav-inner">

                    <ul data-submenu-title="Proville Job Board">
                        <li class="active"><a href="{{ route('home') }}"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
                        @if(auth()->user()->account_type)
                            <li><a href="{{ route('manageJob') }}"><i class="icon-material-outline-star-border"></i> Manage Jobs</a></li>
                        @else
                            <li><a href="{{ route('resume') }}"><i class="icon-material-outline-question-answer"></i> CV</a></li>
                        @endif

                    </ul>

                </div>
            </div>
            <!-- Navigation / End -->

        </div>
    </div>
</div>

