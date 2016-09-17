@extends('backend.layouts.master')

{{--@section('title', 'Page Title')--}}

@section('title')
    @lang('home.home')
@stop


@section('header')
    <meta name="_token" content="{!! csrf_token() !!}"/>
@stop


@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
    @stop

@section('content')
<!-- Page content -->
<div id="page-content">
    <!-- Dashboard 2 Header -->
    <div class="content-header">
        <ul class="nav-horizontal text-center">
            <li class="active">
                <a href="{{URL::route('home')}}"><i class="fa fa-home"></i> @lang('home.home')</a>
            </li>
            @if( ! empty($schedule_config))
                @if($schedule_config->init != 0)
                <li>
                    <a href="{{URL::route('preview')}}" target="_blank"><i class="gi gi-eye_open"></i> @lang('home.preview')</a>
                </li>
                <li>
                    <a href="{{URL::route('sessions')}}"><i class="gi gi-notes_2"></i> @lang('home.viveed_sessions')</a>
                </li>
                <li>
                    <a href="{{URL::route('speakers')}}"><i class="gi gi-notes_2"></i> @lang('home.viveed_speakers')</a>
                </li>
                @endif
                <li>
                    <a href="{{URL::route('settings')}}"><i class="gi gi-notes_2"></i> @lang('home.viveed_settings')</a>
                </li>
            @endif
            {{--<li>
                <a href="javascript:void(0)"><i class="gi gi-video_hd"></i> Movies</a>
            </li>
            <li>
                <a href="javascript:void(0)"><i class="gi gi-music"></i> Music</a>
            </li>
            <li>
                <a href="javascript:void(0)"><i class="fa fa-cubes"></i> Apps</a>
            </li>
            <li>
                <a href="javascript:void(0)"><i class="fa fa-pencil"></i> Profile</a>
            </li>
            <li>
                <a href="javascript:void(0)"><i class="fa fa-cogs"></i> Settings</a>
            </li>--}}
        </ul>
    </div>
    <!-- END Dashboard 2 Header -->

    <!-- Dashboard 2 Content -->
    <div class="row">

    </div>
    <!-- END Dashboard 2 Content -->

@if(empty($schedule_config))
    {{--{{ dd($config2) }}--}}
    <!-- Dummy Content -->
    <div class="block full block-alt-noborder">

        <img src="{{ asset('assets/backend/img/logo/Viveed_Logo_Inverted.png') }}" class="img-responsive center-block" width="40%">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                <h3 class="sub-header text-center">Let's have some <strong>Vice Versa</strong> feed</h3>
            </div>
        </div>
    </div>
    <!-- END Dummy Content -->

@else

    <!-- FAQ Block -->
    <div class="block block-alt-noborder">
        <!-- FAQ Content -->
        <div class="row">
            <div class="col-md-9 col-lg-4 col-lg-offset-1">
                <div class="block-section">
                    <img src="{{ asset('assets/backend/img/logo/Viveed_Logo_Inverted.png') }}" class="img-responsive center-block" width="80%">
                    <h3 class="sub-header text-center">Let's have some <strong>Vice Versa</strong> feed</h3>
                </div>
            </div>
            <div class="col-md-3 col-lg-5 col-lg-offset-1">
                <!-- Subscriptions Content -->
                <h3 class="sub-header"><strong>@lang('module/schedule.schedule_module')</strong></h3>
                <div id="faq3" class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><i class="fa fa-angle-right"></i> <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq3" href="#faq3_q1">@lang('module/schedule.add_speach')</a></h4>
                        </div>
                        <div id="faq3_q1" class="panel-collapse collapse">
                            <div class="panel-body">@lang('module/schedule.add_speach_desc')</div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><i class="fa fa-angle-right"></i> <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq3" href="#faq3_q2">@lang('module/schedule.add_session')</a></h4>
                        </div>
                        <div id="faq3_q2" class="panel-collapse collapse">
                            <div class="panel-body">@lang('module/schedule.add_session_desc')</div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><i class="fa fa-angle-right"></i> <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq3" href="#faq3_q3">@lang('module/schedule.add_config')</a></h4>
                        </div>
                        <div id="faq3_q3" class="panel-collapse collapse">
                            <div class="panel-body">@lang('module/schedule.add_config_desc')</div>
                        </div>
                    </div>
                </div>
                <!-- END Subscriptions Content -->
            </div>
        </div>
        <!-- END FAQ Content -->
    </div>
    <!-- END FAQ Block -->

@endif

</div>
<!-- END Page Content -->
@stop