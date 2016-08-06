<!doctype html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Viveed</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="{{ asset('assets/frontend/images/android-desktop.png') }}">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/frontend/images/ios-desktop.png') }}">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="{{ asset('assets/frontend/images/touch/ms-touch-icon-144x144-precomposed.png') }}">
    <meta name="msapplication-TileColor" content="#3372DF">

    <!-- <link rel="shortcut icon" href="{{ asset('assets/frontend/images/favicon.png') }}"> -->
    <!-- <link rel="shortcut icon" href="{{ asset('assets/frontend/images/logo/Favicon.png') }}"> -->

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/frontend/images/icon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/frontend/images/icon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/frontend/images/icon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/frontend/images/icon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/frontend/images/icon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/frontend/images/icon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/frontend/images/icon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/frontend/images/icon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/frontend/images/icon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('assets/frontend//android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/frontend/images/icon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/frontend/images/icon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/frontend/images/icon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/frontend/images/icon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('assets/frontend/images/icon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/material.cyan-light_blue.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/modules.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/timeline.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/viveed.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/sweetalert.css') }}">
    <!-- <script src="modules.js"></script> -->
    <script src="{{ asset('assets/frontend/js/datetime.js') }}"></script>
</head>
<body onload="startTime(); viveed_date();">
<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
    <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title">Let's have some <strong>Vice Versa</strong> feed</span>
            <div class="mdl-layout-spacer"></div>
        </div>
    </header>
    <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
            <img alt="Viveed_Logo" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPAAAABqCAYAAACCqNy3AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA4RpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMDE0IDc5LjE1Njc5NywgMjAxNC8wOC8yMC0wOTo1MzowMiAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDoxNTdiZDE0Yi04OGE2LTc4NDgtOTNlNC03ZGZjNjEzMzEyNGUiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NkYyMjU1MjczMTUzMTFFNjk0NDhERTM0MzcwQ0EwNUEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NkYyMjU1MjYzMTUzMTFFNjk0NDhERTM0MzcwQ0EwNUEiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTQgKFdpbmRvd3MpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6ZmZiMTRkMTgtNWRkZS0xNTRhLWFlZDEtMjVlMjAzOTMxMzFkIiBzdFJlZjpkb2N1bWVudElEPSJhZG9iZTpkb2NpZDpwaG90b3Nob3A6ZjUxYWJkZGEtMzE1Mi0xMWU2LWE1ZjEt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">
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">

            @if( ! empty($schedule_config))
            <a class="mdl-navigation__link" href="{{URL::route('preview')}}"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>@lang("frontend/master.home")</a>
            <a class="mdl-navigation__link" href="{{URL::route('session_list')}}"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">speaker_notes</i>@lang("frontend/master.sessions")</a>
            <a class="mdl-navigation__link" href="{{URL::route('speaker_list')}}"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">face</i>@lang("frontend/master.speakers")</a>
            <a class="mdl-navigation__link" href="{{URL::route('about')}}"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">feedback</i>@lang("frontend/master.about")</a>
            @endif

            <div class="mdl-layout-spacer"></div>
            <footer id="copyright">
                <div>© ViVeed 2016</div>
                <cite>powered by <b>AegeanTech</b></cite>
            </footer>
        </nav>
    </div>
    <main class="mdl-layout__content mdl-color--grey-100">
        @yield('content')
    </main>
</div>

<script src="{{ asset('assets/frontend/js/material.min.js') }}"></script>
@yield('footer')
</body>
</html>
