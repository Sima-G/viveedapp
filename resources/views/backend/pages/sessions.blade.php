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
                    <form action="/backend/schedule/sessions/store" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">
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
                                                <input type="text" id="session_starts" name="session_starts" class="form-control input-timepicker24" readonly="readonly">
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
                                                <input type="text" id="session_ends" name="session_ends" class="form-control input-timepicker24" readonly="readonly">
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
                                            <input type="text" id="session_date" name="session_date" class="form-control input-datepicker" data-date-format="dd/mm/yyyy" data-date-start-date="10/06/2016" readonly="readonly" placeholder="@lang('schedule/sessions.session_date_placeholder')">
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



                                            <select id="session_speakers" name="session_speakers[]" class="chosen-select chosen-select-width chosen-select-no-results" style="width: 100%;" data-placeholder="@lang('schedule/sessions.session_speakers_desc')" style="width: 250px;" multiple>
                                                {{--<option></option>--}}
                                            </select>



                                            {{--<select id="multipleSelectExample" data-placeholder="Select an option" multiple>
                                                <option value="1">Option 1</option>
                                                <option value="2">Option 2</option>
                                                <option value="3">Option 3</option>
                                                <option value="4">Option 4</option>
                                                <option value="5">Option 5</option>
                                            </select>--}}

                                            {{--<select data-placeholder="Your Favorite Types of Bear" style="width:350px;" multiple class="chosen-select chosen-select-no-results" tabindex="8">
                                                <option value=""></option>
                                                <option>American Black Bear</option>
                                                <option>Asiatic Black Bear</option>
                                                <option>Brown Bear</option>
                                                <option>Giant Panda</option>
                                                <option selected>Sloth Bear</option>
                                                <option disabled>Sun Bear</option>
                                                <option selected>Polar Bear</option>
                                                <option disabled>Spectacled Bear</option>
                                            </select>--}}

                                            {{--{!! Form::select('objects[]', $objects, null, ['id' => 'object_list', 'class' => 'form-control', 'multiple']) !!}--}}
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
                                <div id="session_actions" class="form-group form-actions text-center">
                                    <input type="hidden" name="session_action_id" id="session_action_id">
                                    <button type="submit" id="send-btn" class="btn btn-sm btn-primary send-btn">@lang('schedule/sessions.session_new_save')</button>
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

//        $(document).ready(
//                function () {
//                    $("#multipleSelectExample").select2();
//                    $("#multipleSelectExample").select2('data', [{"id":2,"text":"Option 2"},{"id":4,"text":"Option 4"}]);
//                }
//        );

        /*$('#session_starts').timepicker({
            'onSelect': function() {
                $('#session_ends').timepicker('option', 'defaultTime', $(this).val()+1);
            }
        });*/


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




        jQuery(document).ready(function(){








//                $("#multipleSelectExample").select2();
//                $("#multipleSelectExample").select2('data', [{"id":2,"text":"Option 2"},{"id":4,"text":"Option 4"}]);




            /*function createJSON() {
                jsonObj = [];
                $("span."+id).each(function() {

                    var id = $(this).attr("title");
                    var email = $(this).val();

                    item = {}
                    item ["title"] = id;
                    item ["email"] = email;

                    jsonObj.push(item);
                });

                console.log(jsonObj);
            }*/


            /*$('#session_speakers').select2({
                placeholder: 'Enter a tag',
                ajax: {
                    dataType: 'json',
                    url: '/backend/schedule/sessions/speakers',
                    delay: 400,
                    data: function(params) {
                        return {
                            term: params.term
                        }
                    },
                    processResults: function (data, page) {
                        return {
                            results: data
                        };
                    },
                }
            });*/





            $('#sessions').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>');
            jQuery.ajax({
                url: "/backend/schedule/sessions/show",
//                data: session_title,
                type: "GET",
                success:function(data){
                    $('#sessions').html(data);
                }
            });

            /*$("#session_speakers").select2();*/


            jQuery.ajax({
                url: "/backend/schedule/sessions/speaker_list",
                type: "GET",
                success:function(data){
                    $('#session_speakers').append(data);
//                    $("#session_speakers").trigger("chosen:updated");
                    var config = {
                        '.chosen-select'           : {},
                        '.chosen-select-deselect'  : {allow_single_deselect:true},
                        '.chosen-select-no-single' : {disable_search_threshold:10},
                        '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
                        '.chosen-select-width'     : {width:"100%"}
                    }
                    for (var selector in config) {
                        $('#session_speakers').chosen(config[selector]);
                    }
//                    $('#session_speakers').chosen({width: "100%"});

                }
            });



            /*$("#session_speakers").select2({data: [{id:3,text:'Σημαντηράκης Γιάννης'},{id:8,text:'sadf fdsaf'}]});

            $("#session_speakers").select2("open");*/

            /*var data = [
                { id: 0, text: 'enhancement' },
                { id: 1, text: 'bug' },
                { id: 2, text: 'duplicate' },
                { id: 3, text: 'invalid' },
                { id: 4, text: 'wontfix' }
            ];

            $("#session_speakers").select2({
                data: data
            });

            $("#session_speakers").select2("open");*/


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
                $('#session_action_id').val(id);
                $('#session_title').val($('#title_'+id).html());
                $('#session_starts').val($('#start_time_'+id).html());
                $('#session_ends').val($('#end_time_'+id).html());
                $('#session_date').val($('#date_'+id).html());


                var speaker_data = 'speaker_'+id;
                jsonObj = [];




                $('.'+speaker_data).each(function() {




                    var id = $(this).attr('id');
                    var text = $(this).text();

//                    $('#session_speakers option[value="8"]').remove();
                    $('#session_speakers option[value="'+id+'"]').remove();
//                    $("#session_speakers").trigger("chosen:updated");
                    $('#session_speakers').append('<option value="'+id+'" selected="selected">'+text+'</option>');
                    $("#session_speakers").trigger("chosen:updated");


                    item = {}
                    item ["id"] = id;
                    item ["text"] = text;

                    jsonObj.push(item);
                });

                console.log(jsonObj);

                console.log(JSON.stringify(jsonObj));

//                $("#session_speakers").select2("open");

                var session_speaker_selected = JSON.stringify(jsonObj);
                var session_speaker_selected2 = '[{"id":9,"text":"Σημαντηράκης Εμμανουηλ"},{"id":7,"text":"Σημαντηράκης Γιάννης22"}]';

                var data = [{"id":3,"text":"\u03a3\u03b7\u03bc\u03b1\u03bd\u03c4\u03b7\u03c1\u03ac\u03ba\u03b7\u03c2 \u0393\u03b9\u03ac\u03bd\u03bd\u03b7\u03c2"},{"id":8,"text":"sadf fdsaf"},{"id":9,"text":"\u03a3\u03b7\u03bc\u03b1\u03bd\u03c4\u03b7\u03c1\u03ac\u03ba\u03b7\u03c2 \u0395\u03bc\u03bc\u03b1\u03bd\u03bf\u03c5\u03b7\u03bb"}];


//                $('#session_speakers').select2('data', session_speaker_selected2);

                var newOption = new Option(data.name, data.id, true, true);
//                $("#session_speakers").append(session_speaker_selected).trigger('change');

//                jQuery('#session_speakers').select2();
//                jQuery('#session_speakers').select2('data', session_speaker_selected);




//                $(".select2-selection__rendered ul").append('<li class="select2-selection__choice" title="Σημαντηράκης Εμμανουηλ"><span class="select2-selection__choice__remove" role="presentation">×</span>Σημαντηράκης Εμμανουηλ</li>');

                CKEDITOR.instances.session_description.setData($('#description_'+id).html());
//                $('#session_description').textContent($('#description_'+id).html());
                $('#send-btn').html("@lang("schedule/sessions.session_change_save")");
                if($('#undo-btn').length == 0) {
                    $('#session_actions').append("<button type=\"submit\" id=\"undo-btn\" class=\"btn btn-sm btn-success send-btn\">@lang("schedule/sessions.session_action_undo")</button>");
                }
            });

            $(document).on("click", '.session_delete', function(event) {
                event.preventDefault();
                $.ajax({
                    url: '/backend/schedule/sessions/delete',
                    type: "post",
                    data: { 'session_action_id':$(this).attr('id'),
                        '_token': $('input[name=_token]').val()},
                    success: function getcontent(data) {
                        alert('@lang('schedule/sessions.session_del_msg')');
                        $('#session_'+data).remove();
                    }
                });
            });

            $("#session_actions").on('click', '#undo-btn', function(event){
                event.preventDefault();

                $('#session_title').val("");
                $('#session_starts').val("");
                $('#session_ends').val("");
                $('#session_date').val("");
                $("#session_speakers").select2("val", "");
                CKEDITOR.instances.session_description.setData("");
                $('#send-btn').html("@lang("schedule/sessions.session_new_save")");
                $('#undo-btn').remove();

            });

//            $(document).on("click", '.session_delete', function(event) {
//                event.preventDefault();
//                alert("new link clicked!");
//            });

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
                    url: '/backend/schedule/sessions/store',
                    type: "post",
                    data: { 'session_title':$('input[name=session_title]').val(),
                            'session_starts':$('input[name=session_starts]').val(),
                            'session_ends':$('input[name=session_ends]').val(),
                            'session_date':$('input[name=session_date]').val(),
//                            'session_speakers':$("#session_speakers").select2("val"),
                            'session_speakers':$("#session_speakers").val(),
                            'session_description':CKEDITOR.instances.session_description.getData(),
                            'session_action_id':$('input[name=session_action_id]').val(),
                            '_token': $('input[name=_token]').val()},
//                    success: function(data){
//                        alert(data);
//                    }

                    success: function getcontent(session_title) {
                        $('#session_title').val("");
                        $('#session_starts').val("");
                        $('#session_ends').val("");
                        $('#session_date').val("");
//                        $("#session_speakers").select2("val", "");
                        $("#session_speakers").val("");
                        CKEDITOR.instances.session_description.setData("");
                        alert(session_title);

                        if(!$('input[name=session_action_id]').val()){
                            $('#sessions').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>');
                            jQuery.ajax({
                                url: "/backend/schedule/sessions/show",
                                type: "GET",
                                success:function(data){
                                    $('#sessions').html(data);
                                }
                            });
                        } else {
                                alert(session_title);
//                            $('#2016-06-20').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>');
                            jQuery.ajax({
                                url: "/backend/schedule/sessions/data",
                                data: {session_id:session_title,
                                        '_token': $('input[name=_token]').val()},
//                                data: session_title,
//                                dataType: 'JSON',
                                type: "POST",
//                                type: "GET",
                                success:function(data){
                                    $('#session_'+$('input[name=session_action_id]').val()).html(data);
                                    $('#session_action_id').val("");
                                }
                            });
                        }
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