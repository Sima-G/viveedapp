@extends('backend.layouts.master')

@section('title')
    @lang('schedule/speakers.speakers')
@stop

@section('header')
    <meta name="_token" content="{!! csrf_token() !!}"/>
@stop

@section('content')
    <!-- Page content -->
    <div id="page-content">
        <!-- Contacts Header -->
        <div class="content-header">
            <div class="header-section">
                <h1>
                    <i class="gi gi-parents"></i>@lang('schedule/speakers.speakers')<br>
                    <small>@lang('schedule/speakers.speaker_help')</small>
                </h1>
            </div>
        </div>
        <ul class="breadcrumb breadcrumb-top">
            <li><i class="gi gi-notes_2 sidebar-nav-icon"></i> @lang('schedule/speakers.speaker_sessions')</li>
            <li>@lang('schedule/speakers.speakers')</li>
        </ul>
        <!-- END Contacts Header -->

        <!-- Main Row -->
        <div class="row">
            <div class="col-lg-8">
                <!-- Contacts Block -->
                <div class="block">
                    <!-- Contacts Title -->
                    <div class="block-title">
                        <div class="block-options text-center">
                            <h2>
                                <strong>@lang('schedule/speakers.speakers_list')</strong> @lang('schedule/speakers.of_speakers')
                            </h2>
                        </div>
                    </div>
                    <!-- END Contacts Title -->

                    <!-- Contacts Content -->
                    <div id="speaker-list" class="row style-alt speakers_content">
                        <!-- Contact Widget -->
                        <div id="contact-list"></div>
                        <!-- END Contact Widget -->

                        @if ($speakers->count())
                            @foreach($speakers AS $speaker)
                                <div id="widget_{{ $speaker->id }}" class="col-sm-6 col-lg-4">
                                    <div class=\"widget\">
                                        <div class=\"widget-simple\">
                                            <h4 class="widget-content text-right">
                                                <span class=\"btn-group\"><a href="#" id="{{ $speaker->id }}"
                                                                             class="btn btn-xs btn-primary speaker_edit"
                                                                             data-toggle="tooltip"
                                                                             title="@lang('schedule/speakers.speaker_edit')"><i
                                                                class="fa fa-pencil"></i></a>
                                                    @if(empty(json_decode($speaker->sessions, true)))
                                                        <a href="javascript:void(0)" id="{{ $speaker->id }}"
                                                           class="btn btn-xs btn-primary speaker_delete"
                                                           data-toggle="tooltip"
                                                           title="@lang('schedule/speakers.speaker_delete')"><i
                                                                    class="fa fa-times"></i></a>
                                                    @endif
                                                </span>
                                            </h4>
                                            <h4 class="widget-content text-left"><strong><span
                                                            id="firstname_{{ $speaker->id }}">{{ $speaker->firstname }}</span>
                                                    <span id="lastname_{{ $speaker->id }}">{{ $speaker->lastname }}</span></strong>
                                            </h4>


                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <span id=\"description_{{ $speaker->id }}">
                                                    {{ $speaker->description }}
                                                    </span>
                                                    <h4 class="widget-content text-right">
                                                    <span class="btn-group">
                <a href="javascript:void(0)" class="btn btn-xs btn-default" data-toggle="tooltip"
                   title="@lang('schedule/speakers.speaker_email')"><span
                            id="email_{{ $speaker->id }}">{{ $speaker->email }}</span></a>
                </span>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class=\"row\">
                                <div class=\"col-md-12\">
                                    <h3 class=\"text-center\">@lang('schedule/speakers.speakers_list_is_empty')</h3>
                                </div>
                            </div>
                        @endif

                    </div>
                    <!-- END Contacts Content -->
                </div>
                <!-- END Contacts Block -->
            </div>
            <div class="col-lg-4">
                <!-- Add Contact Block -->
                <div class="block">
                    <!-- Add Contact Title -->
                    <div class="block-title">
                        <h2><i class="fa fa-user"></i> @lang('schedule/speakers.speaker_title')</h2>
                    </div>
                    <!-- END Add Contact Title -->

                    <!-- Add Contact Content -->
                    <form id="form_speakers" action="/backend/schedule/speakers/store" enctype="multipart/form-data"
                          method="post"
                          class="form-horizontal form-bordered" onsubmit="return false;">
                        <div class="form-group">
                            <label class="col-xs-3 control-label"
                                   for="speaker_firstname">@lang('schedule/speakers.speaker_firstname') <span
                                        class="text-danger">*</span></label>
                            <div class="col-xs-9">
                                <input type="text" id="speaker_firstname" name="speaker_firstname" class="form-control"
                                       placeholder="@lang('schedule/speakers.speaker_firstname_desc')">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-3 control-label"
                                   for="speaker_lastname">@lang('schedule/speakers.speaker_lastname') <span
                                        class="text-danger">*</span></label>
                            <div class="col-xs-9">
                                <input type="text" id="speaker_lastname" name="speaker_lastname" class="form-control"
                                       placeholder="@lang('schedule/speakers.speaker_lastname_desc')">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-3 control-label"
                                   for="speaker_email">@lang('schedule/speakers.speaker_email')</label>
                            <div class="col-xs-9">
                                <input type="email" id="speaker_email" name="speaker_email" class="form-control"
                                       placeholder="@lang('schedule/speakers.speaker_email_desc')">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-3 control-label"
                                   for="speaker_description">@lang('schedule/speakers.speaker_description') <span
                                        class="text-danger">*</span></label>
                            <div class="col-xs-9">
                                <textarea id="speaker_description" name="speaker_description"
                                          class="ckeditor"></textarea>
                            </div>
                        </div>

                        <div class="form-group form-actions">
                            <div id="speaker_actions" class="col-xs-9 col-xs-offset-3">
                                <input type="hidden" name="speaker_action_id" id="speaker_action_id">
                                <input type="hidden" name="send-btn-txt" id="send-btn-txt"
                                       value="<i class='fa fa-arrow-right'></i> @lang('schedule/speakers.speaker_new_save')">
                                <input type="hidden" name="send-btn-txt-alt" id="send-btn-txt-alt"
                                       value="<i class='fa fa-arrow-right'></i> @lang('schedule/speakers.speaker_change_save')">
                                <input type="hidden" name="alt-btn-txt-alt" id="alt-btn-txt-alt"
                                       value="@lang('schedule/speakers.speaker_action_undo')">
                                <button type="submit" id="send-btn"
                                        class="btn btn-sm btn-primary send-btn"><i
                                            class="fa fa-arrow-right"></i> @lang('schedule/speakers.speaker_new_save')
                                </button>
                                {{--<button type="submit" id="undo-btn"
                                        class="btn btn-sm btn-warning send-btn"><i class="fa fa-repeat"></i> @lang('schedule/speakers.speaker_new_save')</button>--}}
                            </div>
                        </div>
                    </form>
                    <!-- END Add Contact Content -->
                </div>
                <!-- END Add Contact Block -->
            </div>
        </div>
        <!-- END Main Row -->
    </div>
    <!-- END Page Content -->
@stop

@section('footer')
    <!-- ckeditor.js, load it only in the page you would like to use CKEditor (it's a heavy plugin to include it with the others!) -->
    <script src="{{ asset('assets/backend/js/helpers/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/backend/js/viveed/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/pages/speakers/viveed.js') }}"></script>
@stop