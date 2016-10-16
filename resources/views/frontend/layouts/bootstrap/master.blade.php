<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">

    <title>Viveed - @yield('title')</title>

    <meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('assets/frontend/img/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/frontend/bootstrap/img/icon57.png') }}" sizes="57x57">
    <link rel="apple-touch-icon" href="{{ asset('assets/frontend/bootstrap/img/icon72.png') }}" sizes="72x72">
    <link rel="apple-touch-icon" href="{{ asset('assets/frontend/bootstrap/img/icon76.png') }}" sizes="76x76">
    <link rel="apple-touch-icon" href="{{ asset('assets/frontend/bootstrap/img/icon114.png') }}" sizes="114x114">
    <link rel="apple-touch-icon" href="{{ asset('assets/frontend/bootstrap/img/icon120.png') }}" sizes="120x120">
    <link rel="apple-touch-icon" href="{{ asset('assets/frontend/bootstrap/img/icon144.png') }}" sizes="144x144">
    <link rel="apple-touch-icon" href="{{ asset('assets/frontend/bootstrap/img/icon152.png') }}" sizes="152x152">
    <link rel="apple-touch-icon" href="{{ asset('assets/frontend/bootstrap/img/icon180.png') }}" sizes="180x180">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Bootstrap is included in its original form, unaltered -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/bootstrap/css/bootstrap.min.css') }}">

    <!-- Related styles of various icon packs and plugins -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/bootstrap/css/plugins.css') }}">

    <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/bootstrap/css/main.css') }}">

    <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

    <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/bootstrap/css/themes/night.css') }}">
    <!-- END Stylesheets -->

    <!-- Modernizr (browser feature detection library) & Respond.js (enables responsive CSS code on browsers that don't support it, eg IE8) -->
    <script src="{{ asset('assets/frontend/bootstrap/js/vendor/modernizr-respond.min.js') }}"></script>
</head>
<body>
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
        <h1 class="push-top-bottom text-light text-center"><strong>Pro</strong>UI</h1>
        <div class="inner">
            <h3 class="text-light visible-lt-ie9 visible-lt-ie10"><strong>Loading..</strong></h3>
            <div class="preloader-spinner hidden-lt-ie9 hidden-lt-ie10"></div>
        </div>
    </div>
    <!-- END Preloader -->

    <!-- Page Container -->
    <!-- In the PHP version you can set the following options from inc/config file -->
    <!--
        Available #page-container classes:

        '' (None)                                       for a full main and alternative sidebar hidden by default (> 991px)

        'sidebar-visible-lg'                            for a full main sidebar visible by default (> 991px)
        'sidebar-partial'                               for a partial main sidebar which opens on mouse hover, hidden by default (> 991px)
        'sidebar-partial sidebar-visible-lg'            for a partial main sidebar which opens on mouse hover, visible by default (> 991px)
        'sidebar-mini sidebar-visible-lg-mini'          for a mini main sidebar with a flyout menu, enabled by default (> 991px + Best with static layout)
        'sidebar-mini sidebar-visible-lg'               for a mini main sidebar with a flyout menu, disabled by default (> 991px + Best with static layout)

        'sidebar-alt-visible-lg'                        for a full alternative sidebar visible by default (> 991px)
        'sidebar-alt-partial'                           for a partial alternative sidebar which opens on mouse hover, hidden by default (> 991px)
        'sidebar-alt-partial sidebar-alt-visible-lg'    for a partial alternative sidebar which opens on mouse hover, visible by default (> 991px)

        'sidebar-partial sidebar-alt-partial'           for both sidebars partial which open on mouse hover, hidden by default (> 991px)

        'sidebar-no-animations'                         add this as extra for disabling sidebar animations on large screens (> 991px) - Better performance with heavy pages!

        'style-alt'                                     for an alternative main style (without it: the default style)
        'footer-fixed'                                  for a fixed footer (without it: a static footer)

        'disable-menu-autoscroll'                       add this to disable the main menu auto scrolling when opening a submenu

        'header-fixed-top'                              has to be added only if the class 'navbar-fixed-top' was added on header.navbar
        'header-fixed-bottom'                           has to be added only if the class 'navbar-fixed-bottom' was added on header.navbar

        'enable-cookies'                                enables cookies for remembering active color theme when changed from the sidebar links
    -->
    <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations style-alt">

        <!-- Main Sidebar -->
        <div id="sidebar">
            <!-- Wrapper for scrolling functionality -->
            <div id="sidebar-scroll">
                <!-- Sidebar Content -->
                <div class="sidebar-content">
                    <!-- Brand -->
                    <a href="index.html" class="sidebar-brand">
                        <i class="gi gi-flash"></i><span class="sidebar-nav-mini-hide"><strong>Pro</strong>UI</span>
                    </a>
                    <!-- END Brand -->

                    <!-- User Info -->
                    @yield('user_info')
                    <!-- END User Info -->


                    <!-- Sidebar Navigation -->
                    @yield('navigation')
                    <!-- END Sidebar Navigation -->

                    <!-- Sidebar Notifications -->
                    @yield('sidebar_notifications')
                    <!-- END Sidebar Notifications -->
                </div>
                <!-- END Sidebar Content -->
            </div>
            <!-- END Wrapper for scrolling functionality -->
        </div>
        <!-- END Main Sidebar -->

        <!-- Main Container -->
        <div id="main-container">
            <!-- Header -->
            <!-- In the PHP version you can set the following options from inc/config file -->
            <!--
                Available header.navbar classes:

                'navbar-default'            for the default light header
                'navbar-inverse'            for an alternative dark header

                'navbar-fixed-top'          for a top fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar())
                    'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

                'navbar-fixed-bottom'       for a bottom fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar()))
                    'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
            -->
            <header class="navbar navbar-inverse">
                <!-- Left Header Navigation -->
                <ul class="nav navbar-nav-custom">
                    <!-- Main Sidebar Toggle Button -->
                    {{--<li>
                        <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                            <i class="fa fa-bars fa-fw"></i>
                        </a>
                    </li>--}}
                    <!-- END Main Sidebar Toggle Button -->

                    <!-- Template Options -->
                    <!-- Change Options functionality can be found in js/app.js - templateOptions() -->
                    {{--<li class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="gi gi-settings"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-custom dropdown-options">
                            <li class="dropdown-header text-center">Header Style</li>
                            <li>
                                <div class="btn-group btn-group-justified btn-group-sm">
                                    <a href="javascript:void(0)" class="btn btn-primary" id="options-header-default">Light</a>
                                    <a href="javascript:void(0)" class="btn btn-primary" id="options-header-inverse">Dark</a>
                                </div>
                            </li>
                            <li class="dropdown-header text-center">Page Style</li>
                            <li>
                                <div class="btn-group btn-group-justified btn-group-sm">
                                    <a href="javascript:void(0)" class="btn btn-primary" id="options-main-style">Default</a>
                                    <a href="javascript:void(0)" class="btn btn-primary" id="options-main-style-alt">Alternative</a>
                                </div>
                            </li>
                        </ul>
                    </li>--}}
                    <!-- END Template Options -->
                </ul>
                <!-- END Left Header Navigation -->

            </header>
            <!-- END Header -->

            <!-- Page content -->
            <div id="page-content" style="min-height: 1701px;" class="">
                @yield('content')
            </div>
            <!-- END Page Content -->

            <!-- Footer -->
            <footer class="clearfix">
                <div class="pull-right">
                    Crafted with <i class="fa fa-heart text-danger"></i> by <a href="http://goo.gl/vNS3I" target="_blank">pixelcave</a>
                </div>
                <div class="pull-left">
                    <span id="year-copy"></span> &copy; <a href="http://goo.gl/TDOSuC" target="_blank">ProUI 3.3</a>
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

@yield('modal')

<!-- Remember to include excanvas for IE8 chart support -->
<!--[if IE 8]><script src="js/helpers/excanvas.min.js"></script><![endif]-->

<!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
<script src="{{ asset('assets/frontend/bootstrap/js/vendor/jquery-1.11.3.min.js') }}"></script>
<script src="{{ asset('assets/frontend/bootstrap/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/bootstrap/js/plugins.js') }}"></script>
<script src="{{ asset('assets/frontend/bootstrap/js/app.js') }}"></script>

<script src="{{ asset('assets/frontend/bootstrap/js/viveed/datetime.js') }}"></script>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/index.js"></script>
<script>$(function(){ Index.init(); });</script>
</body>
</html>