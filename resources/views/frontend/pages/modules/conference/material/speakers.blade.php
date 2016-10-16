@extends('frontend.layouts.material.master')

@section('content')
    <div class="mdl-grid demo-content">
        <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
            <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">face</i><span
                    class="mdl-layout-title">&nbsp;&nbsp;@lang("frontend/master.speakers")</span>
        </div>
        <div id="speaker_list" class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col">

        </div>
        <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
            @include('frontend/partials.modules.conference.material.overview')
            <div class="demo-separator mdl-cell--1-col"></div>
            @include('frontend/partials.modules.conference.material.calendar')
        </div>

    </div>
@stop

@section('footer')
    <script src="{{ asset('assets/frontend/material/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/material/js/pages/speakers/viveed.js') }}"></script>
@stop