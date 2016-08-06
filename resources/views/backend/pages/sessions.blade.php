@extends('backend.layouts.master')

{{--@section('title', 'Page Title')--}}

@section('title')
    @lang('schedule/sessions.sessions')
@stop

@section('header')
    <meta name="_token" content="{!! csrf_token() !!}"/>
@stop


@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@stop

@section('content')
    <div id="page-content">
        <!-- Timeline Header -->
        <div class="content-header">
            <div class="header-section">
                <h1><i class="gi gi-notes_2"></i> @lang('schedule/sessions.sessions')<br>
                    <small>@lang('schedule/sessions.session_help')</small>
                </h1>
            </div>
        </div>
        <ul class="breadcrumb breadcrumb-top">
            <li><i class="gi gi-notes_2 sidebar-nav-icon"></i> @lang('schedule/sessions.sessions')</li>
            <li>@lang('schedule/sessions.sessions')</li>
        </ul>
        <!-- END Timeline Header -->

        <!-- Timeline Content Row -->
        <div class="row">
            <div class="col-sm-6">
                <!-- Timeline Style Block -->
                <div class="block full">
                    <!-- Timeline Style Title -->
                    <div class="block-title">
                        <h2><strong>@lang('schedule/sessions.timeline')</strong> @lang('schedule/sessions.schedule')</h2>
                        {{ $schedule_config->start_date_formatted }}
                        {{ $schedule_config->end_date_formatted }}
                        {{ gettype($schedule_config->date_range) }}
                        {{ var_dump(json_decode($schedule_config->date_range, true)) }}
                        {{ gettype(json_decode($schedule_config->date_range, true)) }}
                        {{--{{ json_decode($schedule_config->date_range) }}--}}
                        @foreach (json_decode($schedule_config->date_range, true) as $item)
                            {{--@foreach($item as $item_entity)
                            {{ gettype($item_entity) }}
                                {{ $item_entity }}
                            @endforeach--}}
                            {{ $item['date'] }}
                        @endforeach
                        {{--<ul>
                        @for ($date=$schedule_config->start_date_formatted; $date->diffInDays($schedule_config->end_date_formatted)>0; $date->addDay())
                            <li>{{$date->toDateString()}}</li>
                        @endfor
                        </ul>--}}
                    </div>
                    <!-- END Timeline Style Title -->


                    <!-- Working Tabs Content -->
                    <div class="row">
                        <div class="col-md-12">

                            {{ $schedule_config->date_range }}
                            {{--@foreach($schedule_config->date_range as $date_range)
                                {{ $date_range->date }}
                            @endforeach--}}

                            {{--@foreach($schedule_config->date_range as $mydata)--}}
                            {{--{{ $mydata->id . "\n"}}--}}
                                {{--@foreach($mydata->date as $values)--}}
                                {{--{{ $values->value . "\n"}}--}}
                                {{--@endforeach--}}
                            {{--@endforeach--}}

                            <div class="block-title">
                                <ul class="nav nav-tabs" data-toggle="tabs">
                                    <li class="active"><a href="#tab_2016-07-18">18/07/2016</a></li>
                                    <li class=""><a href="#tab_2016-07-19">19/07/2016</a></li>
                                </ul>
                            </div>

                            <!-- Block Tabs -->
                            <div id="sessions" class="block full">




                            </div>
                            <!-- END Block Tabs -->
                        </div>
                    </div>
                    <!-- END Working Tabs Content -->


                    {{--<div id="sessions">
                    </div>--}}

                <!-- Working Tabs Content -->
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Block Tabs -->
                            <div class="block full">



                                <!-- Block Tabs Title -->
                                <div class="block-title">
                                    <ul class="nav nav-tabs" data-toggle="tabs">
                                        <li class="active"><a href="#example-tabs2-activity">Activity</a></li>
                                        <li><a href="#example-tabs2-profile">Profile</a></li>
                                    </ul>
                                </div>
                                <!-- END Block Tabs Title -->

                                <!-- Tabs Content -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="example-tabs2-activity">Block tabs..</div>
                                    <div class="tab-pane" id="example-tabs2-profile">Profile..</div>
                                </div>
                                <!-- END Tabs Content -->



                            </div>
                            <!-- END Block Tabs -->
                        </div>
                    </div>
                    <!-- END Working Tabs Content -->



                </div>
                <!-- END Timeline Style Block -->
            </div>
            <div class="col-sm-6">
                <!-- Feed Style Block -->
                <div class="block">
                    <!-- Feed Style Title -->
                    <div class="block-title">
                        <h2><strong>@lang('schedule/sessions.session')</strong> @lang('schedule/sessions.of_schedule')
                        </h2>
                    </div>
                    <!-- END Feed Style Title -->

                    <!-- Feed Style Content -->
                    <form id="form_sessions" action="/backend/schedule/sessions/store" method="post" enctype="multipart/form-data"
                          class="form-horizontal form-bordered" onsubmit="return false;">
                        <div class="block-content-full">


                            <!-- You can remove the class .media-feed-hover if you don't want each event to be highlighted on mouse hover -->
                            <ul class="media-list media-feed">
                                <!-- Check in -->
                                <li class="media">
                                    <div class="media-body">

                                        <div class="form-group">
                                            <label class="col-md-3 control-label"
                                                   for="session_title">@lang('schedule/sessions.session_title') <span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" id="session_title" name="session_title"
                                                       class="form-control"
                                                       placeholder="@lang('schedule/sessions.session_title_desc')">
                                                <span class="help-block">@lang('schedule/sessions.session_title_help')</span>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                                <!-- END Check in -->

                                <!-- Story Published -->
                                <li style="padding: 20px 20px 0px">
                                    <fieldset>
                                        <legend>
                                            <i class="fa fa-angle-right"></i> @lang('schedule/sessions.session_duration')
                                        </legend>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label"
                                                   for="session_starts">@lang('schedule/sessions.session_starts') <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <div class="input-group bootstrap-timepicker">
                                                    <input type="text" id="session_starts" name="session_starts" data-default-time="08:00:00"
                                                           class="form-control input-timepicker24" readonly="readonly">
                                                                  <span class="input-group-btn">
                                                                      <a href="javascript:void(0)"
                                                                         class="btn btn-primary"><i
                                                                                  class="fa fa-clock-o"></i></a>
                                                                  </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label"
                                                   for="session_ends">@lang('schedule/sessions.session_ends') <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <div class="input-group bootstrap-timepicker">
                                                    <input type="text" id="session_ends" name="session_ends" data-default-time="08:30:00"
                                                           class="form-control input-timepicker24" readonly="readonly">
                                                                  <span class="input-group-btn">
                                                                      <a href="javascript:void(0)"
                                                                         class="btn btn-primary"><i
                                                                                  class="fa fa-clock-o"></i></a>
                                                                  </span>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </li>
                                <!-- END Story Published -->

                                <!-- Photos Uploaded -->
                                <li style="padding: 20px 20px 0px">
                                    <!-- <div class="media-body"> -->
                                    <fieldset>
                                        <legend>
                                            <i class="fa fa-angle-right"></i> @lang('schedule/sessions.session_date')
                                        </legend>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label"
                                                   for="session_date">@lang('schedule/sessions.date') <span class="text-danger">*</span></label>
                                            <div class="col-md-6 col-md-offset-4">
                                                <input type="text" id="session_date" name="session_date"
                                                       class="form-control input-datepicker"
                                                       data-date-format="dd/mm/yyyy" data-date-start-date="{{ $config->config_start_date }}" data-date-end-date="{{ $config->config_end_date }}"
                                                       readonly="readonly"
                                                       placeholder="@lang('schedule/sessions.session_date_placeholder')">
                                            </div>
                                        </div>
                                    </fieldset>
                                    <!-- </div> -->
                                </li>
                                <!-- END Photos Uploaded -->

                                <li style="padding: 20px 20px 0px">
                                    <!-- Chosen plugin (class is initialized in js/app.js -> uiInit()), for extra usage examples you can check out http://harvesthq.github.io/chosen/ -->
                                    <fieldset>
                                        <legend><i class="fa fa-angle-right"></i> @lang('schedule/sessions.speakers')
                                        </legend>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label"
                                                   for="example-chosen-multiple">@lang('schedule/sessions.session_speakers') <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <select id="session_speakers" name="session_speakers"
                                                        class="chosen-select chosen-select-width chosen-select-no-results"
                                                        style="width: 100%;"
                                                        data-placeholder="@lang('schedule/sessions.session_speakers_desc')"
                                                        style="width: 250px;" multiple>
                                                </select>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <p></p>
                                    <!-- </div> -->
                                </li>

                                <!-- Status Updated -->
                                <li class="media">

                                    <div class="media-body">
                                        <fieldset>
                                            <legend>
                                                {{--{{ gettype($config->start_date) }}--}}
                                                {{--{{ $config->config_start_date }}--}}
                                                {{--{{ dd($config->start_date) }}--}}
                                                <i class="fa fa-angle-right"></i> @lang('schedule/sessions.session_description')
                                            </legend>
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <textarea id="session_description" name="session_description"
                                                              class="ckeditor"></textarea>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </li>
                                <!-- END Status Updated -->
                                <li>
                                    <p></p>
                                </li>
                                <li style="padding: 20px 20px 0px">
                                    <div id="session_actions" class="form-group form-actions text-center">
                                        <input type="hidden" name="del-msg-txt" id="del-msg-txt"
                                               value="@lang("schedule/sessions.session_del_msg")">
                                        <input type="hidden" name="session_action_id" id="session_action_id">
                                        <input type="hidden" name="send-btn-txt" id="send-btn-txt"
                                               value="@lang('schedule/sessions.session_new_save')">
                                        <input type="hidden" name="send-btn-txt-alt" id="send-btn-txt-alt"
                                               value="@lang('schedule/sessions.session_change_save')">
                                        <input type="hidden" name="alt-btn-txt-alt" id="alt-btn-txt-alt"
                                               value="@lang('schedule/sessions.session_action_undo')">
                                        <button type="submit" id="send-btn"
                                                class="btn btn-sm btn-primary send-btn"><i class="fa fa-arrow-right"></i> @lang('schedule/sessions.session_new_save')</button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </form>
                    <!-- END Feed Style Content -->
                </div>
                <!-- END Feed Style Block -->
            </div>
        </div>
        <!-- END Timeline Content Row -->
    </div>
    @stop

    @section('footer')
            <!-- ckeditor.js, load it only in the page you would like to use CKEditor (it's a heavy plugin to include it with the others!) -->
    <script src="{{ asset('assets/backend/js/helpers/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/backend/js/viveed/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/pages/sessions/viveed.js') }}"></script>
@stop