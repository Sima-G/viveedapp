<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js') }}"> <!--<![endif]-->
<head>
    <meta charset="utf-8">

    <title>Viveed - @yield('title')</title>

    <meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    @yield('header')

    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('assets/backend/img/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/backend/img/icon57.png') }}" sizes="57x57">
    <link rel="apple-touch-icon" href="{{ asset('assets/backend/img/icon72.png') }}" sizes="72x72">
    <link rel="apple-touch-icon" href="{{ asset('assets/backend/img/icon76.png') }}" sizes="76x76">
    <link rel="apple-touch-icon" href="{{ asset('assets/backend/img/icon114.png') }}" sizes="114x114">
    <link rel="apple-touch-icon" href="{{ asset('assets/backend/img/icon120.png') }}" sizes="120x120">
    <link rel="apple-touch-icon" href="{{ asset('assets/backend/img/icon144.png') }}" sizes="144x144">
    <link rel="apple-touch-icon" href="{{ asset('assets/backend/img/icon152.png') }}" sizes="152x152">
    <link rel="apple-touch-icon" href="{{ asset('assets/backend/img/icon180.png') }}" sizes="180x180">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Bootstrap is included in its original form, unaltered -->
    <link rel="stylesheet" href="{{ asset('assets/backend/css/bootstrap.min.css') }}">

    <!-- Related styles of various icon packs and plugins -->
    <link rel="stylesheet" href="{{ asset('assets/backend/css/plugins.css') }}">

    <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
    <link rel="stylesheet" href="{{ asset('assets/backend/css/main.css') }}">

    <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

    <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
    {{--<link rel="stylesheet" href="{{ asset('assets/backend/css/themes.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('assets/backend/css/themes/night.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/backend/css/viveed/sweetalert.css') }}">
    <!-- END Stylesheets -->

    <script>
        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('vvd_time').innerHTML =
                    h + ":" + m + ":" + s;
            var t = setTimeout(startTime, 500);
        }
        function checkTime(i) {
            if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
            return i;
        }

        function viveed_date(offset){
            if (offset === undefined){
                offset = 0;
            }
            var monthNames = [ "Ιανουαρίου", "Φεβρουαρίου", "Μαρτίου", "Απριλίου", "Μαΐου", "Ιουνίου",
                "Ιουλίου", "Αυγούστου", "Σεπτεμβρίου", "Οκτωβρίου", "Νοεμβρίου", "Δεκεμβρίου" ];
            var dayNames= ["Κυριακή","Δευτέρα","Τρίτη","Τετάρτη","Πέμπτη","Παρασκευή","Σάββατο"]

            var newDate = new Date();

            newDate.setDate(newDate.getDate() + offset);
            document.getElementById('vvd_date').innerHTML = '<p>' + dayNames[newDate.getDay()] + "</h2><h1>" + newDate.getDate() + '</h1><h2>' + monthNames[newDate.getMonth()] + '</p>';

        }
    </script>

    <!-- Modernizr (browser feature detection library) & Respond.js (enables responsive CSS code on browsers that don't support it, eg IE8) -->
    <script src="{{ asset('assets/backend/js/vendor/modernizr-respond.min.js') }}"></script>



</head>
<body class="page-loading" onload="startTime(); viveed_date();">

{{--<body class="">--}}
<!-- Page Wrapper -->
<!-- In the PHP version you can set the following options from inc/config file -->
<!--
    Available classes:

    'page-loading'      enables page preloader
-->
<div id="page-wrapper">
    <!-- Preloader -->
    <!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->
    <!-- Used only if page preloader is enabled from inc/config (PHP version) or the class 'page-loading' is added in #page-wrapper element (HTML version) -->
    <div class="preloader themed-background">
        <h1 class="push-top-bottom text-light text-center"><strong>V</strong>i<strong>V</strong>eed</h1>
        <div class="inner">
            <h3 class="text-light visible-lt-ie9 visible-lt-ie10"><strong>Loading..</strong></h3>
            <div class="preloader-spinner hidden-lt-ie9 hidden-lt-ie10"></div>
        </div>
    </div>
    <!-- END Preloader -->

    <!-- Page Container -->

    <div id="page-container" class="sidebar-mini sidebar-visible-lg-mini sidebar-no-animations">
        <!-- Alternative Sidebar -->
        <div id="sidebar-alt">
            <!-- Wrapper for scrolling functionality -->
            <div id="sidebar-alt-scroll">
                <!-- Sidebar Content -->
                <div class="sidebar-content">
                    <!-- Chat -->
                    <!-- Chat demo functionality initialized in js/app.js -> chatUi() -->
                    <a href="page_ready_chat.html" class="sidebar-title">
                        <i class="gi gi-comments pull-right"></i> <strong>Chat</strong>UI
                    </a>
                    <!-- Chat Users -->
                    <ul class="chat-users clearfix">
                        <li>
                            <a href="javascript:void(0)" class="chat-user-online">
                                <span></span>
                                <img src="{{ asset('assets/backend/img/placeholders/avatars/avatar12.jpg') }}" alt="avatar" class="img-circle">
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="chat-user-online">
                                <span></span>
                                <img src="{{ asset('assets/backend/img/placeholders/avatars/avatar15.jpg') }}" alt="avatar" class="img-circle">
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="chat-user-online">
                                <span></span>
                                <img src="{{ asset('assets/backend/img/placeholders/avatars/avatar10.jpg') }}" alt="avatar" class="img-circle">
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="chat-user-online">
                                <span></span>
                                <img src="{{ asset('assets/backend/img/placeholders/avatars/avatar4.jpg') }}" alt="avatar" class="img-circle">
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="chat-user-away">
                                <span></span>
                                <img src="{{ asset('assets/backend/img/placeholders/avatars/avatar7.jpg') }}" alt="avatar" class="img-circle">
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="chat-user-away">
                                <span></span>
                                <img src="{{ asset('assets/backend/img/placeholders/avatars/avatar9.jpg') }}" alt="avatar" class="img-circle">
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="chat-user-busy">
                                <span></span>
                                <img src="{{ asset('assets/backend/img/placeholders/avatars/avatar16.jpg') }}" alt="avatar" class="img-circle">
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <span></span>
                                <img src="{{ asset('assets/backend/img/placeholders/avatars/avatar1.jpg') }}" alt="avatar" class="img-circle">
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <span></span>
                                <img src="{{ asset('assets/backend/img/placeholders/avatars/avatar4.jpg') }}" alt="avatar" class="img-circle">
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <span></span>
                                <img src="{{ asset('assets/backend/img/placeholders/avatars/avatar3.jpg') }}" alt="avatar" class="img-circle">
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <span></span>
                                <img src="{{ asset('assets/backend/img/placeholders/avatars/avatar13.jpg') }}" alt="avatar" class="img-circle">
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <span></span>
                                <img src="{{ asset('assets/backend/img/placeholders/avatars/avatar5.jpg') }}" alt="avatar" class="img-circle">
                            </a>
                        </li>
                    </ul>
                    <!-- END Chat Users -->

                    <!-- Chat Talk -->
                    <div class="chat-talk display-none">
                        <!-- Chat Info -->
                        <div class="chat-talk-info sidebar-section">
                            <button id="chat-talk-close-btn" class="btn btn-xs btn-default pull-right">
                                <i class="fa fa-times"></i>
                            </button>
                            <img src="{{ asset('assets/backend/img/placeholders/avatars/avatar5.jpg') }}" alt="avatar" class="img-circle pull-left">
                            <strong>John</strong> Doe
                        </div>
                        <!-- END Chat Info -->

                        <!-- Chat Messages -->
                        <ul class="chat-talk-messages">
                            <li class="text-center"><small>Yesterday, 18:35</small></li>
                            <li class="chat-talk-msg animation-slideRight">Hey admin?</li>
                            <li class="chat-talk-msg animation-slideRight">How are you?</li>
                            <li class="text-center"><small>Today, 7:10</small></li>
                            <li class="chat-talk-msg chat-talk-msg-highlight themed-border animation-slideLeft">I'm fine, thanks!</li>
                        </ul>
                        <!-- END Chat Messages -->

                        <!-- Chat Input -->
                        <form action="index.html" method="post" id="sidebar-chat-form" class="chat-form">
                            <input type="text" id="sidebar-chat-message" name="sidebar-chat-message" class="form-control form-control-borderless" placeholder="Type a message..">
                        </form>
                        <!-- END Chat Input -->
                    </div>
                    <!--  END Chat Talk -->
                    <!-- END Chat -->

                    <!-- Activity -->
                    <a href="javascript:void(0)" class="sidebar-title">
                        <i class="fa fa-globe pull-right"></i> <strong>Activity</strong>UI
                    </a>
                    <div class="sidebar-section">
                        <div class="alert alert-danger alert-alt">
                            <small>just now</small><br>
                            <i class="fa fa-thumbs-up fa-fw"></i> Upgraded to Pro plan
                        </div>
                        <div class="alert alert-info alert-alt">
                            <small>2 hours ago</small><br>
                            <i class="gi gi-coins fa-fw"></i> You had a new sale!
                        </div>
                        <div class="alert alert-success alert-alt">
                            <small>3 hours ago</small><br>
                            <i class="fa fa-plus fa-fw"></i> <a href="page_ready_user_profile.html"><strong>John Doe</strong></a> would like to become friends!<br>
                            <a href="javascript:void(0)" class="btn btn-xs btn-primary"><i class="fa fa-check"></i> Accept</a>
                            <a href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Ignore</a>
                        </div>
                        <div class="alert alert-warning alert-alt">
                            <small>2 days ago</small><br>
                            Running low on space<br><strong>18GB in use</strong> 2GB left<br>
                            <a href="page_ready_pricing_tables.html" class="btn btn-xs btn-primary"><i class="fa fa-arrow-up"></i> Upgrade Plan</a>
                        </div>
                    </div>
                    <!-- END Activity -->

                    <!-- Messages -->
                    <a href="page_ready_inbox.html" class="sidebar-title">
                        <i class="fa fa-envelope pull-right"></i> <strong>Messages</strong>UI (5)
                    </a>
                    <div class="sidebar-section">
                        <div class="alert alert-alt">
                            Debra Stanley<small class="pull-right">just now</small><br>
                            <a href="page_ready_inbox_message.html"><strong>New Follower</strong></a>
                        </div>
                        <div class="alert alert-alt">
                            Sarah Cole<small class="pull-right">2 min ago</small><br>
                            <a href="page_ready_inbox_message.html"><strong>Your subscription was updated</strong></a>
                        </div>
                        <div class="alert alert-alt">
                            Bryan Porter<small class="pull-right">10 min ago</small><br>
                            <a href="page_ready_inbox_message.html"><strong>A great opportunity</strong></a>
                        </div>
                        <div class="alert alert-alt">
                            Jose Duncan<small class="pull-right">30 min ago</small><br>
                            <a href="page_ready_inbox_message.html"><strong>Account Activation</strong></a>
                        </div>
                        <div class="alert alert-alt">
                            Henry Ellis<small class="pull-right">40 min ago</small><br>
                            <a href="page_ready_inbox_message.html"><strong>You reached 10.000 Followers!</strong></a>
                        </div>
                    </div>
                    <!-- END Messages -->
                </div>
                <!-- END Sidebar Content -->
            </div>
            <!-- END Wrapper for scrolling functionality -->
        </div>
        <!-- END Alternative Sidebar -->

        <!-- Main Sidebar -->
        <div id="sidebar">
            <!-- Wrapper for scrolling functionality -->
            <div id="sidebar-scroll">
                <!-- Sidebar Content -->
                <div class="sidebar-content">
                    <!-- Brand -->
                    <a href="index.html" class="sidebar-brand">
                        <span class="sidebar-nav-mini-hide"><strong>@lang('master.viveed')</strong> - @lang('master.backend')</span>
                    </a>
                    <!-- END Brand -->

                    <!-- User Info -->
                    <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                        <div class="sidebar-user-avatar">
                            <a href="page_ready_user_profile.html">
                                <img src="{{ asset('assets/backend/img/logo/viveed_avatar_small.png') }}" alt="Viveed">
                                {{--<img src="{{ asset('assets/backend/img/placeholders/avatars/avatar2.jpg') }}" alt="avatar">--}}
                            </a>
                        </div>
                        <div class="sidebar-user-name">{{ Sentinel::getUser()->first_name . ' ' . Sentinel::getUser()->last_name }}</div>
                        <div class="sidebar-user-links">
                            {{--<a href="page_ready_user_profile.html" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>
                            <a href="page_ready_inbox.html" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="gi gi-envelope"></i></a>--}}
                            <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
                            {{--<a href="javascript:void(0)" class="label label-warning">Trial</a>--}}
                            {{--<a href="javascript:void(0)" class="label label-warning enable-tooltip" data-placement="bottom" title="@lang('privileges.privileges')" onclick="$('#modal-user-settings').modal('show');">{{ head($userRoles) }}</a>--}}
                            {{--<a href="javascript:void(0)" class="enable-tooltip" data-placement="bottom" title="Settings" onclick="$('#modal-user-settings').modal('show');"><i class="gi gi-cogwheel"></i></a>--}}
                            <a href="{{URL::route('logout')}}" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>
                        </div>
                    </div>
                    <!-- END User Info -->



                    <!-- Sidebar Navigation -->
                        @include('backend/partials.nav')
                    <!-- END Sidebar Navigation -->



                </div>
                <!-- END Sidebar Content -->
            </div>
            <!-- END Wrapper for scrolling functionality -->
        </div>
        <!-- END Main Sidebar -->

        <!-- Main Container -->
        <div id="main-container">
            <!-- Header -->
            <header class="navbar navbar-inverse">

                <!-- Left Header Navigation -->
                <ul class="nav navbar-nav-custom">
                    <!-- Main Sidebar Toggle Button -->
                    <li>
                        <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                            <i class="fa fa-bars fa-fw"></i>
                        </a>
                    </li>
                    <!-- END Main Sidebar Toggle Button -->

                    <li>
                        <a href="javascript:void(0)" style="text-decoration: none;">
                            <i class="fa fa-calendar fa-fw"></i> <strong>Τρίτη 14 Ιουνίου 2016</strong>
                        </a>
                    </li>

                </ul>
                {{--@if(Sentinel::check())--}}
                    {{--{{ $roles }}--}}
                {{--@endif--}}



                <!-- END Left Header Navigation -->

            </header>
            <!-- END Header -->

            <!-- Page content -->
            @yield('content')
            <!-- END Page Content -->

            <!-- Footer -->
            <footer class="clearfix">
                <div class="pull-right">
                    Crafted by <strong>AegeanTech</strong>
                </div>
                <div class="pull-left">
                    <span id="year-copy"></span> &copy; Viveed 1.0
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->
</div>
<!-- END Page Wrapper -->

<!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
<a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

<!-- User Settings, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->
{{--@include('backend/partials.privileges')--}}
<!-- END User Settings -->

<!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
<script src="{{ asset('assets/backend/js/vendor/jquery-1.11.3.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/plugins.js') }}"></script>
<script src="{{ asset('assets/backend/js/app.js') }}"></script>


<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
</script>



@yield('footer')

</body>
</html>
