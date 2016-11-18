@extends('frontend.layouts.bootstrap.master')

@section('title')
    @lang('schedule/sessions.sessions')
@stop

@section('content')
    <div id="page-content">
        <!-- Timeline Header -->


        <!-- END Timeline Header -->

        <!-- Timeline Content Row -->
        <div class="row">

            <div class="col-sm-8">
                <!-- Timeline Style Block -->
                <div class="block full">
                    <!-- Timeline Style Title -->
                    <div class="block-title">
                        {{--<h2>{{ $schedule_config->title }}</h2>--}}
                        <h3>@lang('schedule/sessions.timeline') @lang('schedule/sessions.schedule')</h3>
                    </div>
                    <!-- END Timeline Style Title -->

                    <!-- Working Tabs Content -->
                    <div class="row">
                        <div class="col-md-12">

                            <div class="block-title">
                                <ul class="nav nav-tabs" data-toggle="tabs">
                                    @foreach (json_decode($schedule_config->date_range, true) as $key => $item)
                                        <li {{ (($key=='0')?'class=active':"") }}><a href="#tab_{{ str_replace('/', '-', $item['date']) }}">{{ $item['date'] }}</a></li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Block Tabs -->
                            <div id="session" class="block full">
                            </div>
                            <!-- END Block Tabs -->
                        </div>
                    </div>
                    <!-- END Working Tabs Content -->
                </div>
                <!-- END Timeline Style Block -->
            </div>

            <div class="col-sm-4">
                @include('frontend.partials.modules.conference.bootstrap.overview')
                @include('frontend.partials.modules.conference.bootstrap.calendar')
                @include('frontend.partials.modules.conference.bootstrap.time')
            </div>


        </div>
        <!-- END Timeline Content Row -->
    </div>
    @stop

    @section('footer')

        <script src="{{ asset('assets/frontend/bootstrap/js/viveed/sweetalert.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/bootstrap/js/pages/modules/conference/sessions/viveed.js') }}"></script>
    @stop