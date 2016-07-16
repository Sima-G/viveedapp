@extends('frontend.layouts.master')

@section('content')
<div class="mdl-grid demo-content">
    <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
        <div class="vvd_date">
            <h2 id="vvd_date" class="mdl-card__title-text"></h2>
        </div>
        <div class="vvd_time">
            <h2 id="vvd_time" class="mdl-card__title-text vvd_time"></h2>
        </div>
    </div>
    <div id="speaker_list" class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col"></div>
    <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
        <div class="viveed-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
            <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
                <p title="@lang('frontend/home.desc_alt_text_session_title')"><h2 class="mdl-card__title-text">{{ $config->title }}</h2></p>
            </div>
            <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                <h2 class="mdl-card__title-text">{{ $config->config_start_date }} - {{ $config->config_end_date }}</h2>
                <br/>
                @lang('frontend/home.desc_change_date_action'):
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">ΤΡΕΧΟΥΣΑ</a>
                <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">ΕΠΟΜΕΝΗ</a>
                <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">ΠΡΟΗΓΟΥΜΕΝΗ</a>
            </div>
        </div>
        <div class="demo-separator mdl-cell--1-col"></div>

        {{--<div class="demo-options mdl-card mdl-color--deep-purple-500 mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--12-col-desktop">
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
        </div>--}}



    </div>
</div>
    @stop

    @section('footer')
        <script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/pages/speakers/viveed.js') }}"></script>
@stop