@extends('frontend.layouts.bootstrap.master')

@section('title')
    @lang('schedule/speakers.speakers')
@stop

@section('header')
    <meta name="_token" content="{!! csrf_token() !!}"/>
@stop

@section('content')
    <!-- Page content -->
    <div id="page-content">
        <!-- Main Row -->
        <div class="row">
            <div class="col-lg-8">
                <!-- Speakers Block -->
                <div class="block" style="min-height: 700px;">
                    <!-- Speakers Title -->
                    <div class="block-title">
                        <div class="block-options text-center">
                            <h2>
                                <strong>@lang('schedule/speakers.speakers_list')</strong> @lang('schedule/speakers.of_speakers')
                            </h2>
                        </div>
                    </div>
                    <!-- END Speakers Title -->
                    <!-- Speakers Content -->
                    <div id="speaker_list" class="row style-alt speakers_content"></div>
                    <!-- END Speakers Content -->
                </div>
                <!-- END Speakers Block -->
            </div>

            <div class="col-lg-4">
                @include('frontend.partials.modules.conference.bootstrap.overview')
            </div>
        </div>
        <!-- END Main Row -->
    </div>
    <!-- END Page Content -->
@stop

@section('footer')
    <script src="{{ asset('assets/frontend/bootstrap/js/pages/modules/conference/speakers/viveed.js') }}"></script>
@stop