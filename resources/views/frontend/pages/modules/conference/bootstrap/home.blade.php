@extends('frontend.layouts.bootstrap.master')

@section('content')
    {{--<ul class="breadcrumb breadcrumb-top">
        <li>@lang("frontend/master.home")</li>
    </ul>--}}
    @if(( ! empty($schedule_config)) && ($schedule_config->init != 0))
        <div class="row">
            <div class="col-md-9">
                <!-- Timeline Widget -->
                {{--<div class="widget">
                    <div class="widget-extra text-center themed-background-dark">
                        <h3 class="widget-content-light">
                            Latest <strong>News</strong>
                        </h3>
                    </div>
                    <div class="widget-extra">
                        <!-- Timeline Partial -->
                        @include('frontend/partials.modules.conference.bootstrap.timeline')
                        <!-- END Timeline Partial -->
                    </div>
                </div>--}}
                <!-- END Timeline Widget -->

                {{--<div class="widget">
                    <div class="widget-advanced">
                        <!-- Widget Header -->
                        <div class="widget-header text-center themed-background-dark">
                            <h3 class="widget-content-light">
                                <strong>@lang('frontend/home.schedule')</strong><br>
                                <small><span id="timeline_date"></span></small>
                            </h3>
                        </div>
                        <!-- END Widget Header -->

                        <!-- Widget Main -->
                        <div class="widget-main">
                            <a href="javascript:void(0)" class="widget-image-container animation-fadeIn">
                                <span class="widget-icon themed-background"><i class="fa fa-calendar"></i></span>
                            </a>
                            --}}{{--@include('frontend/partials.modules.conference.bootstrap.timeline')--}}{{--
                            <!-- Timeline Content -->
                                <div id="timeline" class="timeline">

                                </div>
                            <!-- END Timeline Content -->
                            <hr>
                        </div>
                        <!-- END Widget Main -->
                    </div>
                </div>--}}

                <div class="widget" style="min-height: 700px;">
                    <div class="widget-advanced">
                        <!-- Widget Header -->
                        <div class="widget-header text-center themed-background-dark">
                            <h3 class="widget-content-light">
                                <strong>@lang('frontend/home.schedule')</strong><br>
                                <small><span id="timeline_date"></span></small>
                            </h3>
                        </div>
                        <!-- END Widget Header -->

                        <!-- Widget Main -->
                        <div class="widget-main">
                            <a href="javascript:void(0)" class="widget-image-container animation-fadeIn">
                                <span class="widget-icon themed-background"><i class="fa fa-calendar"></i></span>
                            </a>
                        <!-- Timeline Content -->
                                <div id="timeline" class="list-group">
                                    {{--<div class="list-group-item well well-sm">
                                        <span class="badge">Διάρκεια: 99'</span>
                                        <h4 class="list-group-item-heading">Δοκιμαστική Ομιλία</h4>
                                        <h4 class="pull-right">08:00 - 10:30</h4>
                                        <p class="list-group-item-text">Μπλα μπλα μπλα</p>
                                        <p class="list-group-item-text"><strong>Ομιλητές:</strong> Σημαντηράκης Ιωάννης</p>
                                    </div>
                                    <div class="list-group-item active well well-sm">
                                        <span class="badge">Διάρκεια: 99'</span>
                                        <h4 class="list-group-item-heading">Δοκιμαστική Ομιλία</h4>
                                        <h4 class="pull-right">08:00 - 10:30</h4>
                                        <p class="list-group-item-text">Μπλα μπλα μπλα</p>
                                        <p class="list-group-item-text"><strong>Ομιλητές:</strong> Σημαντηράκης Ιωάννης</p>
                                    </div>
                                    <div href="javascript:void(0)" class="list-group-item">
                                        <span class="badge">Διάρκεια: 99'</span>
                                        <h4 class="list-group-item-heading">Δοκιμαστική Ομιλία</h4>
                                        <h4 class="pull-right">08:00 - 10:30</h4>
                                        <p class="list-group-item-text">Μπλα μπλα μπλα</p>
                                        <p class="list-group-item-text"><strong>Ομιλητές:</strong> Σημαντηράκης Ιωάννης</p>
                                    </div>--}}
                                </div>
                            <!-- END Timeline Content -->
                            <hr>
                        </div>
                        <!-- END Widget Main -->
                    </div>
                </div>

            </div>
            <div class="col-md-3">
                <!-- Widgets -->
                @include('frontend/partials.modules.conference.bootstrap.dateselection')
                @include('frontend/partials.modules.conference.bootstrap.calendar')
                @include('frontend/partials.modules.conference.bootstrap.time')
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
    @include('frontend.partials.modules.conference.bootstrap.navigation')
@stop

@section('footer')
    <script src="{{ asset('assets/frontend/bootstrap/js/pages/modules/conference/home/viveed.js') }}"></script>
    @if( ! empty($speakers))
        <script src="{{ asset('assets/frontend/bootstrap/js/pages/modules/conference/home/sweetalert.min.js') }}"></script>
        <script>
            jQuery(document).ready(function () {
                $(document).on('click', '.speaker_of_session', function (e) {
                    switch ($(this).attr('id')) {
                        @foreach($speakers AS $speaker)
                        case "{{ $speaker->id }}":
                            swal("{!! $speaker->full_name !!}", "{!! str_replace(array('<p>', '</p>'), '', str_replace(array("\r\n", "\n", "\r"), ' ',  html_entity_decode($speaker->description))) !!}");
                            break;
                            @endforeach
                    }
                    ;
                });
            });
        </script>
    @endif
@stop