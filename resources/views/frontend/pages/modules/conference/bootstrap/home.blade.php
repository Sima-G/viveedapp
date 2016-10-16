@extends('frontend.layouts.master')

@section('content')
    <ul class="breadcrumb breadcrumb-top">
        <li>@lang("frontend/master.home")</li>
    </ul>
    @if(( ! empty($schedule_config)) && ($schedule_config->init != 0))
        <div class="row">
            <div class="col-md-9">
                <!-- Timeline Widget -->
                <div class="widget">
                    <div class="widget-extra text-center themed-background-dark">
                        <h3 class="widget-content-light">
                            Latest <strong>News</strong>
                        </h3>
                    </div>
                    <div class="widget-extra">
                        <!-- Timeline Partial -->
                        @include('frontend/partials.modules.conference.timeline')
                        <!-- END Timeline Partial -->
                    </div>
                </div>
                <!-- END Timeline Widget -->

                <div class="widget">
                    <div class="widget-advanced">
                        <!-- Widget Header -->
                        <div class="widget-header text-center themed-background-dark">
                            <h3 class="widget-content-light">
                                <strong>Intro to HTML5</strong><br>
                                <small>Web Design</small>
                            </h3>
                        </div>
                        <!-- END Widget Header -->

                        <!-- Widget Main -->
                        <div class="widget-main">
                            <a href="javascript:void(0)" class="widget-image-container animation-fadeIn">
                                <span class="widget-icon themed-background"><i class="fa fa-calendar"></i></span>
                            </a>
                            @include('frontend/partials.modules.conference.timeline')
                            <hr>
                        </div>
                        <!-- END Widget Main -->
                    </div>
                </div>

            </div>
            <div class="col-md-3">
                <!-- Widgets -->
                @include('frontend/partials.modules.conference.dateselection')
                @include('frontend/partials.modules.conference.calendar')
                @include('frontend/partials.modules.conference.time')
                <!-- END Widgets -->
            </div>
        </div>
    @else
        <div class="block block-alt-noborder">
            <h3 class="sub-header">@lang('frontend/messages.welcome_viveed_msg')</h3>
            <div style="text-align: center;">
                <img src="{{ asset('assets/frontend/img/logo/Viveed_Logo_Inverted.png') }}"
                     style="width: 40%; margin: 0 auto;">
            </div>
            <br>
            @if(( ! empty($schedule_config)) && ($schedule_config->init == 0))
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="fa fa-info-circle"></i> @lang('frontend/messages.init_pending_msg')</h4>
                </div>
            @else
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="fa fa-info-circle"></i> @lang('frontend/messages.none_module_msg')</h4>
                </div>
            @endif
            <br>
        </div>
    @endif
@stop

@section('navigation')
    @include('frontend.partials.modules.conference.navigation')
@stop