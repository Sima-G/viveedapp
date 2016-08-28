@extends('frontend.layouts.master')

@section('content')
    <div class="mdl-grid demo-content">
        <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
            <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">speaker_notes</i><span
                    class="mdl-layout-title">&nbsp;&nbsp;@lang("frontend/master.sessions")</span>
        </div>
        <div id="session_list" class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col">

        </div>
        <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
            @include('frontend/partials.overview')
            <div class="demo-separator mdl-cell--1-col"></div>
            @include('frontend/partials.calendar')
        </div>
    </div>
@stop

@section('footer')
    <script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/pages/sessions/viveed.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/pages/sessions/sweetalert.min.js') }}"></script>
    <script>
        jQuery(document).ready(function () {
            $(document).on('click', '.speaker_of_session', function () {
                switch ($(this).attr('id')) {
                    @foreach($speakers AS $speaker)
                    case "{{ $speaker->id }}":
                        swal("{!! $speaker->full_name !!}", "{!! str_replace(array('<p>', '</p>'), '', str_replace(array("\r\n", "\n", "\r"), ' ',  html_entity_decode($speaker->description))) !!}");
                        break;
                        @endforeach
                }
            });
        });
    </script>
@stop