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
                <h1><i class="fa fa-rss"></i> @lang('schedule/sessions.timeline')<br><small>Put those updates in order!</small></h1>
            </div>
        </div>
        <ul class="breadcrumb breadcrumb-top">
            <li>Pages</li>
            <li><a href="">Timeline</a></li>
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
                    </div>
                    <!-- END Timeline Style Title -->

                    <div id="sessions">
                    {{--<!-- Timeline Style Content -->--}}
                    {{--<!-- You can remove the class .block-content-full if you want the block to have its regular padding -->--}}
                    {{--<div class="timeline block-content-full">--}}
                        {{--<h3 class="timeline-header">Web Conference <small><strong>June 14, 2014</strong></small></h3>--}}
                        {{--<!-- You can remove the class .timeline-hover if you don't want each event to be highlighted on mouse hover -->--}}
                        {{--<ul class="timeline-list timeline-hover">--}}
                            {{--<li>--}}
                                {{--<div class="timeline-icon">--}}
                                      {{--<i class="fa fa-circle fa-stack-2x"></i>--}}
                                      {{--<i class="fa fa-inverse fa-stack-1x">14'</i>--}}
                                {{--</div>--}}
                                {{--<div class="timeline-time">&nbsp;12:00-14:40</div>--}}
                                {{--<div class="timeline-content">--}}
                                    {{--<p class="push-bit"><h3>Breakfast</h3></p>--}}
                                    {{--<p class="push-bit">An awesome breakfast will wait for you at the lobby!</p>--}}
                                    {{--<p class="push-bit"><strong>Ομιλητές:</strong></p>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<div class="timeline-icon">--}}
                                    {{--<i class="fa fa-circle fa-stack-2x"></i>--}}
                                    {{--<i class="fa fa-inverse fa-stack-1x">14'</i>--}}
                                {{--</div>--}}
                                {{--<div class="timeline-time">&nbsp;12:00-14:40</div>--}}
                                {{--<div class="timeline-content">--}}
                                    {{--<p class="push-bit"><h3>Breakfast</h3></p>--}}
                                    {{--<p class="push-bit">An awesome breakfast will wait for you at the lobby!</p>--}}
                                    {{--<p class="push-bit"><strong>Ομιλητές:</strong></p>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    {{--<!-- END Timeline Style Content -->--}}


                    {{--<div class="block-title">--}}
                        {{--<hr>--}}
                    {{--</div>--}}

                    {{--<!-- Timeline Style Content -->--}}
                    {{--<!-- You can remove the class .block-content-full if you want the block to have its regular padding -->--}}
                    {{--<div class="timeline block-content-full">--}}
                        {{--<h3 class="timeline-header">Web Conference <small><strong>June 14, 2014</strong></small></h3>--}}
                        {{--<!-- You can remove the class .timeline-hover if you don't want each event to be highlighted on mouse hover -->--}}
                        {{--<ul class="timeline-list timeline-hover" id="2016-06-20">--}}
                            {{--<li>--}}
                                {{--<div class="timeline-icon">--}}
                                    {{--<i class="fa fa-circle fa-stack-2x"></i>--}}
                                    {{--<i class="fa fa-inverse fa-stack-1x">14'</i>--}}
                                {{--</div>--}}
                                {{--<div class="timeline-time">&nbsp;12:00-14:40</div>--}}
                                {{--<div class="timeline-content">--}}
                                    {{--<p class="push-bit"><h3>Breakfast</h3></p>--}}
                                    {{--<p class="push-bit">An awesome breakfast will wait for you at the lobby!</p>--}}
                                    {{--<p class="push-bit"><strong>Ομιλητές:</strong></p>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<div class="timeline-icon">--}}
                                    {{--<i class="fa fa-circle fa-stack-2x"></i>--}}
                                    {{--<i class="fa fa-inverse fa-stack-1x">14'</i>--}}
                                {{--</div>--}}
                                {{--<div class="timeline-time">&nbsp;12:00-14:40</div>--}}
                                {{--<div class="timeline-content">--}}
                                    {{--<p class="push-bit"><h3>Breakfast</h3></p>--}}
                                    {{--<p class="push-bit">An awesome breakfast will wait for you at the lobby!</p>--}}
                                    {{--<p class="push-bit"><strong>Ομιλητές:</strong></p>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    {{--<!-- END Timeline Style Content -->--}}
                </div>

                    {{--<div id="output"></div>--}}

                </div>
                <!-- END Timeline Style Block -->
            </div>
            <div class="col-sm-6">
                <!-- Feed Style Block -->
                <div class="block">
                    <!-- Feed Style Title -->
                    <div class="block-title">
                        <h2><strong>@lang('schedule/sessions.session')</strong> @lang('schedule/sessions.of_schedule')</h2>
                    </div>
                    <!-- END Feed Style Title -->

                    <!-- Feed Style Content -->
                    <form action="/store" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">
                    <div class="block-content-full">



                        <!-- You can remove the class .media-feed-hover if you don't want each event to be highlighted on mouse hover -->
                        <ul class="media-list media-feed">
                            <!-- Check in -->
                            <li class="media">
                                <div class="media-body">

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="session_title">@lang('schedule/sessions.session_title')</label>
                                            <div class="col-md-9">
                                                <input type="text" id="session_title" name="session_title" class="form-control" placeholder="@lang('schedule/sessions.session_title_desc')">
                                                <span class="help-block">@lang('schedule/sessions.session_title_help')</span>
                                            </div>
                                        </div>

                                </div>
                            </li>
                            <!-- END Check in -->

                            <!-- Story Published -->
                            <li style="padding: 20px 20px 0px">
                                <fieldset>
                                    <legend><i class="fa fa-angle-right"></i> @lang('schedule/sessions.session_duration')</legend>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="session_starts">@lang('schedule/sessions.session_starts')</label>
                                        <div class="col-md-6">
                                            <div class="input-group bootstrap-timepicker">
                                                <input type="text" id="session_starts" name="session_starts" class="form-control input-timepicker24">
                                                                  <span class="input-group-btn">
                                                                      <a href="javascript:void(0)" class="btn btn-primary"><i class="fa fa-clock-o"></i></a>
                                                                  </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="session_ends">@lang('schedule/sessions.session_ends')</label>
                                        <div class="col-md-6">
                                            <div class="input-group bootstrap-timepicker">
                                                <input type="text" id="session_ends" name="session_ends" class="form-control input-timepicker24">
                                                                  <span class="input-group-btn">
                                                                      <a href="javascript:void(0)" class="btn btn-primary"><i class="fa fa-clock-o"></i></a>
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
                                    <legend><i class="fa fa-angle-right"></i> @lang('schedule/sessions.session_date')</legend>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="session_date">@lang('schedule/sessions.date')</label>
                                        <div class="col-md-6 col-md-offset-4">
                                            <input type="text" id="session_date" name="session_date" class="form-control input-datepicker" data-date-format="dd/mm/yyyy" placeholder="@lang('schedule/sessions.session_date_placeholder')">
                                        </div>
                                    </div>
                                </fieldset>
                                <!-- </div> -->
                            </li>
                            <!-- END Photos Uploaded -->

                            <li style="padding: 20px 20px 0px">
                                <!-- <div class="media-body"> -->
                                <!-- Chosen plugin (class is initialized in js/app.js -> uiInit()), for extra usage examples you can check out http://harvesthq.github.io/chosen/ -->
                                <fieldset>
                                    <legend><i class="fa fa-angle-right"></i> @lang('schedule/sessions.speakers')</legend>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="example-chosen-multiple">@lang('schedule/sessions.session_speakers')</label>
                                        <div class="col-md-6">
                                            <select id="session_speakers" name="session_speakers" class="select-chosen" data-placeholder="@lang('schedule/sessions.session_speakers_desc')" style="width: 250px;" multiple>
                                                {{--<option value="United States">United States</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Aland Islands">Aland Islands</option>
                                                <option value="Albania">Albania</option>--}}
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
                                        <legend><i class="fa fa-angle-right"></i> @lang('schedule/sessions.session_description')</legend>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <textarea id="session_description" name="session_description" class="ckeditor"></textarea>
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
                                    <button type="submit" class="btn btn-sm btn-success send-btn">.:: @lang('schedule/sessions.session_store') ::.</button>
                                    {{--{!! Form::button('Login', array('class'=>'send-btn')) !!}--}}
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

//        $('.session_speakers input').autocomplete({
//            source: function( request, response ) {
//                $.ajax({
//                    url: "/backend/schedule/sessions/speakers",
//                    beforeSend: function(){$('ul.session_speakers').empty();},
//                    success: function( data ) {
//                        $("#session_speakers").append(data);
//                    }
//                });
//            }
//        });

//        jQuery.ajax({
//            url: "/backend/schedule/sessions/speakers",
//            type: "GET",
//            success:function(data){
////                $("#session_speakers").empty();
////                $("#session_speakers").append(data);
//                $("#session_speakers").append(data);
//            }
//        });

            $("#session_speakers").ajaxChosen({
                type: 'GET',
                url: '/backend/schedule/sessions/speakers',
                dataType: 'json'
            }, function (data) {
                var results = [];

                $.each(data, function (i, val) {
                    results.push({ value: val.value, text: val.text });
                });

                return results;
            });


        jQuery(document).ready(function(){





            $('#sessions').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>');
            jQuery.ajax({
                url: "/backend/schedule/sessions/show",
//                data: session_title,
                type: "GET",
                success:function(data){
                    $('#sessions').html(data);
                }
            });

//            $("session_edit").click(function(event) {
//                alert("lalala");
//                event.preventDefault();
//                // this.append wouldn't work
////                $(this).append(" Clicked");
//            });

//            $('#session').on('click','.session_edit',function(){
//                event.preventDefault();
//                alert(data);
//            });

            $(document).on("click", '.session_edit', function(event) {
                event.preventDefault();
                var id = event.target.id;
                $('#session_title').val($('#title_'+id).html());
                $('#session_starts').val($('#start_time_'+id).html());
                $('#session_ends').val($('#end_time_'+id).html());
                $('#session_date').val($('#date_'+id).html());
                $('#session_description').textContent($('#description_'+id).html());
            });

            $(document).on("click", '.session_delete', function(event) {
                event.preventDefault();
                alert("new link clicked!");
            });

//            $('a').click(function (event)
//            {
//                event.preventDefault();
//            alert('lalala');
            //                var url = $(this).attr('href');
            //                $.get(url, function(data) {
            //                    alert(data);
            //                });

//            });

//            alert("The paragraph was clicked.");
//            $(".send-btn").click(function(){
//                alert("The paragraph was clicked.");
//            });

                $('#btn1').click(function()
                {
                    $('#field2').val($('#field1').val());
                });

            $('.send-btn').click(function(){
                $.ajax({
                    url: 'store',
                    type: "post",
                    data: { 'session_title':$('input[name=session_title]').val(),
                            'session_starts':$('input[name=session_starts]').val(),
                            'session_ends':$('input[name=session_ends]').val(),
                            'session_date':$('input[name=session_date]').val(),
                            'session_description':CKEDITOR.instances.session_description.getData(),
                            '_token': $('input[name=_token]').val()},
//                    success: function(data){
//                        alert(data);
//                    }

                    success: function getcontent(session_title) {
                    $('#2016-06-20').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>');
                        jQuery.ajax({
                            url: "data",
                            data: session_title,
                            type: "POST",
                            success:function(data){$('#2016-06-20').html(data);}
                        });
                    }

                });
            });




//                $('#output').html('<img src="LoaderIcon.gif" />');
//                jQuery.ajax({
//                    url: "data",
//                    data:'id='+id,
//                    type: "GET",
//                    success:function(data){$('#output').html(data);}
//                });


        });
    </script>
@stop