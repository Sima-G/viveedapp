@extends('frontend.layouts.master')

@section('content')
<div class="mdl-grid demo-content" xmlns="http://www.w3.org/1999/html">
    <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
        <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i><span class="mdl-layout-title">&nbsp;&nbsp;@lang("frontend/master.home")</span>
    </div>

    @if( ! empty($schedule_config))
        <div id="timeline" class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col"></div>
        <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
            @include('frontend/partials.dateselection')
            <div class="demo-separator mdl-cell--1-col"></div>
            @include('frontend/partials.calendar')
        </div>
    @else
        <div class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--12-col">
            <div style="margin: 0 auto;" class="session_description mdl-card__title mdl-card--expand">
                <span><h2 class="mdl-card__title-text">Καλωσήρθατε στο Viveed</h2></span>
            </div>
            <div class="demo-separator mdl-cell--1-col"></div>
            <div class="demo-separator mdl-cell--1-col"></div>
            <div style="text-align: center;">
                <img src="{{ asset('assets/frontend/images/logo/Viveed_Logo_Inverted.png') }}" style="width: 40%; margin: 0 auto;">
            </div>

            <div style="text-align: center;" class="mdl-card__actions"><span style="text-align: center;">Αυτή την στιγμή δεν υπάρχει κάποιο ενεργοποιημένο πρόσθετο.</span></div>
        </div>
    @endif

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