@extends('frontend.layouts.master')

@section('content')
<div class="mdl-grid demo-content">
    <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
        <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i><span class="mdl-layout-title">&nbsp;&nbsp;@lang("frontend/master.home")</span>
        {{--<div class="vvd_date">
            <h2 id="vvd_date" class="mdl-card__title-text"></h2>
        </div>
        <div class="vvd_time">
            <h2 id="vvd_time" class="mdl-card__title-text vvd_time"></h2>
        </div>--}}
    </div>
    <div id="timeline" class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col">

        {{--@include('frontend/partials.timeline')--}}

    </div>
    <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
        @include('frontend/partials.dateselection')
        <div class="demo-separator mdl-cell--1-col"></div>
        @include('frontend/partials.calendar')

    </div>
</div>
    @stop

@section('footer')



    <script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/pages/home/viveed.js') }}"></script>

    <script src="{{ asset('assets/frontend/js/pages/home/sweetalert.min.js') }}"></script>
    <script>
        jQuery(document).ready(function () {
            $(document).on('click','.speaker_of_session',function(e){
            switch ($(this).attr('id')) {
                @foreach($speakers AS $speaker)
                    case "{{ $speaker->id }}":
                    swal("{!! $speaker->full_name !!}", "{!! str_replace(array('<p>', '</p>'), '', str_replace(array("\r\n", "\n", "\r"), ' ',  html_entity_decode($speaker->description))) !!}");
                    break;
                @endforeach
            };
        });
        });
    </script>


@stop