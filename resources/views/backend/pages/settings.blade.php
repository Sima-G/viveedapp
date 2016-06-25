@extends('backend.layouts.master')

{{--@section('title', 'Page Title')--}}


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
                <h1><i class="fa fa-rss"></i> @lang('schedule/settings.settings') @lang('schedule/settings.of_schedule')<br><small>@lang('schedule/settings.schedule_help')</small></h1>
            </div>
        </div>
        <ul class="breadcrumb breadcrumb-top">
            <li>@lang('schedule/settings.schedule')</li>
            <li>@lang('schedule/settings.settings')</li>
        </ul>
        <!-- END Timeline Header -->

        <!-- Timeline Content Row -->
        <div class="row">
            <div class="col-sm-6">
                <!-- Timeline Style Block -->
                <div id="schedule" class="block full">
                    <!-- Timeline Style Title -->
                    <div class="block-title">
                        <h2><strong>@lang('schedule/settings.info')</strong> @lang('schedule/settings.of_schedule')</h2>
                    </div>
                    <!-- END Timeline Style Title -->

                    {{--<h3 class="timeline-header">Web Conference <small><strong>June 14, 2014</strong></small></h3>--}}
                    <h4 id="title" class="sub-header"><strong>{{ $settings->title }}</strong></h4>

                    <div class="row">
                        <div id="description" class="col-md-12">
                            <p class="lead">{{ $settings->start_date . " - " . $settings->end_date}}</p>
                            {!!  $settings->description !!}
                        </div>
                    </div>


                    {{--<div class="block-title">--}}
                        {{--<hr>--}}
                    {{--</div>--}}

                </div>
                <!-- END Timeline Style Block -->
            </div>
            <div class="col-sm-6">
                <!-- Feed Style Block -->
                <div class="block">
                    <!-- Feed Style Title -->
                    <div class="block-title">
                        <h2><strong>@lang('schedule/settings.settings')</strong> @lang('schedule/settings.of_schedule')</h2>
                    </div>
                    <!-- END Feed Style Title -->

                    <!-- Feed Style Content -->
                    <form action="/backend/schedule/settings/store" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">
                    <div class="block-content-full">



                        <!-- You can remove the class .media-feed-hover if you don't want each event to be highlighted on mouse hover -->
                        <ul class="media-list media-feed">
                            <!-- Check in -->
                            <li class="media">
                                <div class="media-body">

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="schedule_title">@lang('schedule/settings.schedule_title')</label>
                                            <div class="col-md-9">
                                                <input type="text" id="schedule_title" name="schedule_title" value="{{ $settings->title }}" class="form-control" placeholder="@lang('schedule/settings.schedule_title_desc')">
                                                <span class="help-block">@lang('schedule/settings.schedule_title_help')</span>
                                            </div>
                                        </div>

                                </div>
                            </li>
                            <!-- END Check in -->



                            <!-- Photos Uploaded -->
                            <li style="padding: 20px 20px 0px">
                                <!-- <div class="media-body"> -->
                                <fieldset>
                                    <legend><i class="fa fa-angle-right"></i> @lang('schedule/settings.schedule_date')</legend>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="schedule_date_starts">@lang('schedule/settings.schedule_date_starts')</label>
                                        <div class="col-md-6 col-md-offset-4">
                                            <input type="text" id="schedule_date_starts" name="schedule_date_starts" value="{{ $settings->start_date }}" class="form-control input-datepicker" data-date-format="dd/mm/yyyy" placeholder="ΗΗ/ΜΜ/ΕΕΕΕ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="schedule_date_ends">@lang('schedule/settings.schedule_date_ends')</label>
                                        <div class="col-md-6 col-md-offset-4">
                                            <input type="text" id="schedule_date_ends" name="schedule_date_ends" value="{{ $settings->end_date }}" class="form-control input-datepicker" data-date-format="dd/mm/yyyy" placeholder="ΗΗ/ΜΜ/ΕΕΕΕ">
                                        </div>
                                    </div>
                                </fieldset>
                                <!-- </div> -->
                            </li>
                            <!-- END Photos Uploaded -->

                            <!-- Status Updated -->
                            <li class="media">

                                <div class="media-body">
                                    <fieldset>
                                        <legend><i class="fa fa-angle-right"></i> @lang('schedule/settings.schedule_description')</legend>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <textarea id="schedule_description" name="schedule_description" class="ckeditor">{{ $settings->description }}</textarea>
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
                                <div class="form-group form-actions text-center">
                                    <button type="submit" class="btn btn-sm btn-success send-btn">.:: @lang('schedule/settings.schedule_store') ::.</button>
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



    <script type="text/javascript">
        jQuery(document).ready(function(){


            $('.send-btn').click(function(){
                $.ajax({
                    url: '/backend/schedule/settings/store',
                    type: "post",
                    data: { 'schedule_title':$('input[name=schedule_title]').val(),
                            'schedule_date_starts':$('input[name=schedule_date_starts]').val(),
                            'schedule_date_ends':$('input[name=schedule_date_ends]').val(),
                            'schedule_description':CKEDITOR.instances.schedule_description.getData(),
                            '_token': $('input[name=_token]').val()},

                    success: function getcontent(session_title) {
//                    $('#schedule_reload').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>');
                        jQuery.ajax({
                            url: "/backend/schedule/settings/data",
                            data: {'_token': $('input[name=_token]').val()},
                            dataType: 'JSON',
                            type: "POST",
                            success:function(data){
                                var start_dateAr = data.start_date.split('-');
                                var end_dateAr = data.end_date.split('-');
                                var start_date = start_dateAr[2] + '/' + start_dateAr[1] + '/' + start_dateAr[0];
                                var end_date = end_dateAr[2] + '/' + end_dateAr[1] + '/' + end_dateAr[0];
                                var date = '<p class="lead">'+start_date+' - '+end_date+'</p>';

                                $('#title').html(data.title);
                                $("#date").html(data.start_date +"-"+data.end_date);
                                $('#description').html(date+data.description);
                            }
                        });
                    }

                });
            });

        });
    </script>
@stop