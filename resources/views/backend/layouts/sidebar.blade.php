<div id="left-sidebar" class="sidebar">
    <div class="sidebar-scroll">
        <div class="user-account">
            <img src="{{ asset('backend/assets/images/user.png') }}" class="rounded-circle user-photo" alt="User Profile Picture">
            <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{ Auth::user()->name }}</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account">
                    <li><a href="professors-profile.html"><i class="icon-user"></i>My Profile</a></li>
                    <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                    <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="page-login.html"><i class="icon-power"></i>Logout</a></li>
                </ul>
            </div>
            <hr>
        </div>

        <!-- Tab panes -->
        <div class="tab-content p-l-0 p-r-0">
            <div class="tab-pane active" id="admin">
                <nav class="sidebar-nav">
                    <ul class="main-menu metismenu">
                        <li class="active"><a href="{{ route('admin') }}"><i class="icon-home"></i><span>Dashboard</span></a></li>
                        <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-control-pause"></i><span>Banner</span> </a>
                            <ul>
                                <li><a href="{{ route('banner.index') }}">All Banner</a></li>
                                <li><a href="{{ route('banner.create') }}">Add Banner</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-graduation"></i><span>News</span> </a>
                            <ul>
                                <li><a href="{{ route('news.index') }}">All News</a></li>
                                <li><a href="{{ route('news.create') }}">Add News</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-notebook"></i><span>Gallery</span> </a>
                            <ul>
                                <li><a href="{{ route('album.create') }}">Add Album</a></li>
                                <li><a href="{{ route('gallery.index') }}">All Image in Gallery</a></li>
                                <li><a href="{{ route('gallery.create') }}">Add Image in Gallery</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-wallet"></i><span>Video</span> </a>
                            <ul>
                                <li><a href="">Payments</a></li>
                                <li><a href="">Add Payment</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-info"></i><span>Testimonial</span> </a>
                            <ul>
                                <li><a href="{{ route('testimonial.index') }}">All Testimonial</a></li>
                                <li><a href="{{ route('testimonial.create') }}">Add Testimonial</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-tag"></i><span>Administrative</span> </a>
                            <ul>
                                <li><a href="{{ route('administrative.index') }}">All Administrative</a></li>
                                <li><a href="{{ route('administrative.create') }}">Add Administrative</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-list"></i><span>Clients</span> </a>
                            <ul>
                                <li><a href="{{ route('client.index') }}">All Clients</a></li>
                                <li><a href="{{ route('client.create') }}">Add Clients</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-pin"></i><span>About-Us</span> </a>
                            <ul>
                                <li><a href="{{ route('about.index') }}">All About-Us</a></li>
                                <li><a href="{{ route('about.create') }}">Add About-Us</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-target"></i><span>Contact-Us</span> </a>
                            <ul>
                                <li><a href="{{ route('contact.message') }}">All Contact Meassge</a></li>
                                <li><a href="{{ route('contact.index') }}">Contact Information</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('social.link') }}"><i class="icon-bubbles"></i><span>Social Link</span></a></li>
                        {{-- <li><a href="transport.html"><i class="icon-support"></i>Transport</a></li> --}}
                        <li><span>-- Extra</span></li>
                        <li>
                            <a href="#Authentication" class="has-arrow"><i class="icon-lock"></i><span>Authentication</span></a>
                            <ul>
                                <li><a href="page-login.html">Login</a></li>
                                <li><a href="page-register.html">Register</a></li>
                                <li><a href="page-lockscreen.html">Lockscreen</a></li>
                                <li><a href="page-forgot-password.html">Forgot Password</a></li>
                                <li><a href="page-404.html">Page 404</a></li>
                                <li><a href="page-403.html">Page 403</a></li>
                                <li><a href="page-500.html">Page 500</a></li>
                                <li><a href="page-503.html">Page 503</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="tab-pane" id="graduation">
                <nav class="sidebar-nav">
                    <ul class="main-menu metismenu">
                        <li><span>-- Professor</span></li>
                        <li><a href="app-inbox.html"><i class="icon-home"></i>Inbox App</a></li>
                        <li><a href="app-chat.html"><i class="icon-bubbles"></i>Chat App</a></li>
                        <li><a href="professors.html"><i class="icon-user"></i>All Professors</a></li>
                        <li><a href="professors-profile.html"><i class="icon-user"></i>My Profile</a></li>
                        <li><a href="leave.html"><i class="icon-user"></i>Leave</a></li>
                        <li><a href="attendance.html"><i class="icon-user"></i>Attendance</a></li>
                        <li><a href="events.html"><i class="icon-user"></i>Events List</a></li>
                        <li><span>-- Students</span></li>
                        <li><a href="students.html"><i class="icon-user"></i>All Students</a></li>
                        <li><a href="students-profile.html"><i class="icon-user"></i>My Profile</a></li>
                        <li><a href="payments.html"><i class="icon-user"></i>Payments</a></li>
                        <li><a href="attendance.html"><i class="icon-user"></i>Attendance</a></li>
                        <li><a href="events.html"><i class="icon-user"></i>Events List</a></li>
                    </ul>
                </nav>
            </div>
            <div class="tab-pane" id="sub_menu">
                <nav class="sidebar-nav">
                    <ul class="main-menu metismenu">
                        <li>
                            <a href="#Widgets" class="has-arrow"><i class="icon-puzzle"></i><span>Widgets</span></a>
                            <ul>
                                <li><a href="widgets-statistics.html">Statistics Widgets</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#Pages" class="has-arrow"><i class="icon-docs"></i><span>More Pages</span></a>
                            <ul>
                                <li><a href="page-blank.html">Blank Page</a></li>
                                <li><a href="page-gallery.html">Image Gallery <span class="badge badge-default float-right">v1</span></a> </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#uiElements" class="has-arrow"><i class="icon-diamond"></i> <span>UI Elements</span></a>
                            <ul>
                                <li><a href="ui-typography.html">Typography</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#forms" class="has-arrow"><i class="icon-pencil"></i> <span>Forms</span></a>
                            <ul>
                                <li><a href="forms-validation.html">Form Validation</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#Tables" class="has-arrow"><i class="icon-tag"></i> <span>Tables</span></a>
                            <ul>
                                <li><a href="table-basic.html">Tables Example<span class="badge badge-info float-right">New</span></a> </li>
                                <li><a href="table-normal.html">Normal Tables</a> </li>
                                <li><a href="table-jquery-datatable.html">Jquery Datatables</a> </li>
                                <li><a href="table-editable.html">Editable Tables</a> </li>
                                <li><a href="table-color.html">Tables Color</a> </li>
                                <li><a href="table-filter.html">Table Filter <span class="badge badge-info float-right">New</span></a> </li>
                                <li><a href="table-dragger.html">Table dragger <span class="badge badge-info float-right">New</span></a> </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#charts" class="has-arrow"><i class="icon-bar-chart"></i> <span>Charts</span></a>
                            <ul>
                                <li><a href="chart-morris.html">Morris</a> </li>
                                <li><a href="chart-flot.html">Flot</a> </li>
                                <li><a href="chart-chartjs.html">ChartJS</a> </li>
                                <li><a href="chart-jquery-knob.html">Jquery Knob</a> </li>
                                <li><a href="chart-sparkline.html">Sparkline Chart</a></li>
                                <li><a href="chart-peity.html">Peity</a></li>
                                <li><a href="chart-c3.html">C3 Charts</a></li>
                                <li><a href="chart-gauges.html">Gauges</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#Maps" class="has-arrow"><i class="icon-map"></i> <span>Maps</span></a>
                            <ul>
                                <li><a href="map-google.html">Google Map</a></li>
                                <li><a href="map-yandex.html">Yandex Map</a></li>
                                <li><a href="map-jvectormap.html">jVector Map</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
