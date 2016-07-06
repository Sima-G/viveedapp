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
    <!-- <script src="modules.js"></script> -->
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
            document.getElementById('vvd_date').innerHTML = dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear();

        }
    </script>
</head>
<body onload="startTime(); viveed_date();">
<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
    <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title">Home</span>
            <div class="mdl-layout-spacer"></div>
            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
                <i class="material-icons">more_vert</i>
            </button>
            <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
                <li class="mdl-menu__item">Σχετικά</li>
                <li class="mdl-menu__item">Contact</li>
                <li class="mdl-menu__item">Όροι χρήσης</li>
            </ul>
        </div>
    </header>
    <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
            <!-- <img src="images/user.jpg" class="demo-avatar"> -->
            {{--<img src="{{ asset('assets/frontend/images/logo/Viveed_Logo.svg') }}" onerror="this.onerror=null; this.src='{{ asset('assets/frontend/images/logo/Viveed_Logo.png') }}'">--}}
            <img alt="Viveed_Logo" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPAAAABqCAYAAACCqNy3AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA4RpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMDE0IDc5LjE1Njc5NywgMjAxNC8wOC8yMC0wOTo1MzowMiAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDoxNTdiZDE0Yi04OGE2LTc4NDgtOTNlNC03ZGZjNjEzMzEyNGUiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NkYyMjU1MjczMTUzMTFFNjk0NDhERTM0MzcwQ0EwNUEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NkYyMjU1MjYzMTUzMTFFNjk0NDhERTM0MzcwQ0EwNUEiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTQgKFdpbmRvd3MpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6ZmZiMTRkMTgtNWRkZS0xNTRhLWFlZDEtMjVlMjAzOTMxMzFkIiBzdFJlZjpkb2N1bWVudElEPSJhZG9iZTpkb2NpZDpwaG90b3Nob3A6ZjUxYWJkZGEtMzE1Mi0xMWU2LWE1ZjEt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">

            <!-- <img src="images/logo/Viveed_Logo.svg"> -->
            <div class="demo-avatar-dropdown">
                <span>hello@example.com</span>
                <div class="mdl-layout-spacer"></div>
            </div>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
            <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Αρχική</a>
            <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">forum</i>Chat</a>
            <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">flag</i>Ειδοποιήσεις</a>
            <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i>Ομιλητές</a>
            <div class="mdl-layout-spacer"></div>
            <!-- <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a> -->
            <footer id="copyright">
                <div>© ViVeed 2016</div>
                <cite>powered by <b>AegeanTech</b></cite>
            </footer>
        </nav>
    </div>
    <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
            <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
                <div class="vvd_date">
                    <h2 id="vvd_date" class="mdl-card__title-text"></h2>
                </div>
                <div class="vvd_time">
                    <h2 id="vvd_time" class="mdl-card__title-text vvd_time"></h2>
                </div>
            </div>
            <div class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col">

                <ul class="timeline">
                    <li>
                        <div class="timeline-badge">
                            <a><i class="fa fa-circle" id=""></i></a>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Timeline Event</h4>
                            </div>
                            <div class="timeline-body">
                                <p>Invitamus me testatur sed quod non dum animae tuae lacrimis ut libertatem deum rogus aegritudinis causet. Dicens hoc contra serpentibus isto.</p>
                            </div>
                            <div class="timeline-footer">
                                <p class="text-right">Feb-21-2014</p>
                            </div>
                        </div>
                    </li>

                    <li class="timeline-inverted">
                        <div class="timeline-badge">
                            <a><i class="fa fa-circle invert" id=""></i></a>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Timeline Event</h4>
                            </div>
                            <div class="timeline-body">
                                <p>Stranguillione in deinde cepit roseo commendavit patris super color est se sed. Virginis plus plorantes abscederem assignato ipsum ait regem Ardalio nos filiae Hellenicus mihi cum. Theophilo litore in lucem in modo invenit quasi nomen magni ergo est se est Apollonius, habet clementiae venit ad nomine sed dominum depressit filia navem.</p>
                            </div>
                            <div class="timeline-footer">
                                <p class="text-right">Feb-23-2014</p>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="timeline-badge">
                            <a><i class="fa fa-circle" id=""></i></a>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Timeline Event</h4>
                            </div>
                            <div class="timeline-body">
                                <p>Advenientibus aliorum eam ad per te sed. Facere debetur aut veneris accedens.</p>
                            </div>
                            <div class="timeline-footer">
                                <p class="text-right">Feb-23-2014</p>
                            </div>
                        </div>
                    </li>

                    <li class="timeline-inverted">
                        <div class="timeline-badge">
                            <a><i class="fa fa-circle invert" id=""></i></a>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Timeline Event</h4>
                            </div>
                            <div class="timeline-body">
                                <p>Volvitur ingreditur id ait mea vero cum autem quod ait Cumque ego illum vero cum unde beata. Commendavi si non dum est in. Dionysiadem tuos ratio puella ut casus, tunc lacrimas effunditis magister cives Tharsis. Puellae addita verbaque' capellam sanctissima quid, apollinem existimas filiam rex cum autem quod tamen adnuente rediens eam est se in. Peracta licet ad nomine Maria non ait in modo compungi mulierem volutpat.</p>
                            </div>
                            <div class="timeline-footer">
                                <p class="text-right">Feb-27-2014</p>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="timeline-badge">
                            <a><i class="fa fa-circle" id=""></i></a>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Timeline Event</h4>
                            </div>
                            <div class="timeline-body">
                                <p>Adfertur guttae sapientiae ducitur est Apollonius ut a a his domino Lycoridem in lucem. Theophile atque bona dei cenam veniebant est cum. Iusto opes mihi Tyrum in modo compungi mulierem ubi augue eiusdem ordo quos vero diam omni catervis famulorum. Bene dictis ut diem finito servis unde.</p>
                            </div>
                            <div class="timeline-footer">
                                <p class="text-right">Mar-01-2014</p>
                            </div>
                        </div>
                    </li>

                    <li  class="timeline-inverted">
                        <div class="timeline-badge">
                            <a><i class="fa fa-circle invert" id=""></i></a>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Timeline Event</h4>
                            </div>
                            <div class="timeline-body">
                                <p>Crede respiciens loco dedit beneficio ad suis alteri si puella eius in. Acceptis codicello lenonem in deinde plectrum anni ipsa quod eam est Apollonius.</p>
                            </div>
                            <div class="timeline-footer primary">
                                <p class="text-right">Mar-02-2014</p>
                            </div>
                        </div>
                    </li>
                    <li class="clearfix no-float"></li>
                </ul>
            </div>
            <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
                <div class="viveed-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
                    <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
                        <h2 class="mdl-card__title-text">Ενημερώσεις</h2>
                    </div>
                    <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                        Non dolore elit adipisicing ea reprehenderit consectetur culpa.
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">ΔΙΑΒΑΣΤΕ ΠΕΡΙΣΣΟΤΕΡΑ</a>
                    </div>
                </div>
                <div class="demo-separator mdl-cell--1-col"></div>
                <div class="demo-options mdl-card mdl-color--deep-purple-500 mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--12-col-desktop">
                    <div class="mdl-card__supporting-text mdl-color-text--blue-grey-50">
                        <h3>View options</h3>
                        <ul>
                            <li>
                                <label for="chkbox1" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                                    <input type="checkbox" id="chkbox1" class="mdl-checkbox__input">
                                    <span class="mdl-checkbox__label">Click per object</span>
                                </label>
                            </li>
                            <li>
                                <label for="chkbox2" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                                    <input type="checkbox" id="chkbox2" class="mdl-checkbox__input">
                                    <span class="mdl-checkbox__label">Views per object</span>
                                </label>
                            </li>
                            <li>
                                <label for="chkbox3" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                                    <input type="checkbox" id="chkbox3" class="mdl-checkbox__input">
                                    <span class="mdl-checkbox__label">Objects selected</span>
                                </label>
                            </li>
                            <li>
                                <label for="chkbox4" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                                    <input type="checkbox" id="chkbox4" class="mdl-checkbox__input">
                                    <span class="mdl-checkbox__label">Objects viewed</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color-text--blue-grey-50">Change location</a>
                        <div class="mdl-layout-spacer"></div>
                        <i class="material-icons">location_on</i>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" style="position: fixed; left: -1000px; height: -1000px;">
    <defs>
        <mask id="piemask" maskContentUnits="objectBoundingBox">
            <circle cx=0.5 cy=0.5 r=0.49 fill="white" />
            <circle cx=0.5 cy=0.5 r=0.40 fill="black" />
        </mask>
        <g id="piechart">
            <circle cx=0.5 cy=0.5 r=0.5 />
            <path d="M 0.5 0.5 0.5 0 A 0.5 0.5 0 0 1 0.95 0.28 z" stroke="none" fill="rgba(255, 255, 255, 0.75)" />
        </g>
    </defs>
</svg>
<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 250" style="position: fixed; left: -1000px; height: -1000px;">
    <defs>
        <g id="chart">
            <g id="Gridlines">
                <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="27.3" x2="468.3" y2="27.3" />
                <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="66.7" x2="468.3" y2="66.7" />
                <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="105.3" x2="468.3" y2="105.3" />
                <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="144.7" x2="468.3" y2="144.7" />
                <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="184.3" x2="468.3" y2="184.3" />
            </g>
            <g id="Numbers">
                <text transform="matrix(1 0 0 1 485 29.3333)" fill="#888888" font-family="'Roboto'" font-size="9">500</text>
                <text transform="matrix(1 0 0 1 485 69)" fill="#888888" font-family="'Roboto'" font-size="9">400</text>
                <text transform="matrix(1 0 0 1 485 109.3333)" fill="#888888" font-family="'Roboto'" font-size="9">300</text>
                <text transform="matrix(1 0 0 1 485 149)" fill="#888888" font-family="'Roboto'" font-size="9">200</text>
                <text transform="matrix(1 0 0 1 485 188.3333)" fill="#888888" font-family="'Roboto'" font-size="9">100</text>
                <text transform="matrix(1 0 0 1 0 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">1</text>
                <text transform="matrix(1 0 0 1 78 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">2</text>
                <text transform="matrix(1 0 0 1 154.6667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">3</text>
                <text transform="matrix(1 0 0 1 232.1667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">4</text>
                <text transform="matrix(1 0 0 1 309 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">5</text>
                <text transform="matrix(1 0 0 1 386.6667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">6</text>
                <text transform="matrix(1 0 0 1 464.3333 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">7</text>
            </g>
            <g id="Layer_5">
                <polygon opacity="0.36" stroke-miterlimit="10" points="0,223.3 48,138.5 154.7,169 211,88.5
              294.5,80.5 380,165.2 437,75.5 469.5,223.3 	"/>
            </g>
            <g id="Layer_4">
                <polygon stroke-miterlimit="10" points="469.3,222.7 1,222.7 48.7,166.7 155.7,188.3 212,132.7
              296.7,128 380.7,184.3 436.7,125 	"/>
            </g>
        </g>
    </defs>
</svg>
<script src="{{ asset('assets/frontend/js/material.min.js') }}"></script>
</body>
</html>
