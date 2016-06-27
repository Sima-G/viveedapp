@extends('backend.layouts.master')

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
                <i class="gi gi-parents"></i>@lang('schedule/speakers.speakers')<br><small>@lang('schedule/speakers.speaker_help')</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>@lang('schedule/speakers.speakers')</li>
        <li>@lang('schedule/speakers.speakers_list')</li>
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
                        <h2><strong>@lang('schedule/speakers.speakers_list')</strong> @lang('schedule/speakers.of_speakers')</h2>
                    </div>
                </div>
                <!-- END Contacts Title -->

                <!-- Contacts Content -->
                <div id="speaker-list" class="row style-alt">
                    <!-- Contact Widget -->
                    <div id="contact-list"></div>
                    <!-- END Contact Widget -->

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
                <form action="/backend/schedule/speakers/store" enctype="multipart/form-data" method="post" class="form-horizontal form-bordered" onsubmit="return false;">
                    <div class="form-group">
                        <label class="col-xs-3 control-label" for="speaker_firstname">@lang('schedule/speakers.speaker_firstname')</label>
                        <div class="col-xs-9">
                            <input type="text" id="speaker_firstname" name="speaker_firstname" class="form-control" placeholder="@lang('schedule/speakers.speaker_firstname_desc')">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" for="speaker_lastname">@lang('schedule/speakers.speaker_lastname')</label>
                        <div class="col-xs-9">
                            <input type="text" id="speaker_lastname" name="speaker_lastname" class="form-control" placeholder="@lang('schedule/speakers.speaker_lastname_desc')">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" for="speaker_email">@lang('schedule/speakers.speaker_email')</label>
                        <div class="col-xs-9">
                            <input type="email" id="speaker_email" name="speaker_email" class="form-control" placeholder="@lang('schedule/speakers.speaker_email_desc')">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" for="speaker_description">@lang('schedule/speakers.speaker_description')</label>
                        <div class="col-xs-9">
                            <textarea id="speaker_description" name="speaker_description" class="ckeditor"></textarea>
                        </div>
                    </div>

                    <div class="form-group form-actions">
                        <div id="speaker_actions" class="col-xs-9 col-xs-offset-3">
                            <input type="hidden" name="speaker_action_id" id="speaker_action_id">
                            <button type="submit" id="send-btn" class="btn btn-sm btn-primary send-btn">@lang('schedule/speakers.speaker_new_save')</button>
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

    <script type="text/javascript">
        CKEDITOR.replace('speaker_description', {
            customConfig:'{{ asset('assets/backend/js/pages/speakers/ckeditor-config.js') }}'
        })
    </script>

    <script type="text/javascript">

        jQuery(document).ready(function(){

            $('#contact-list').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i><br/></div>');
            jQuery.ajax({
                url: "/backend/schedule/speakers/show",
//                data: session_title,
                type: "GET",
                success:function(data){
                    $('#speaker-list').html(data);
                }
            });


//            $('#sp-list').on("click", function(event) {
//                var id = $(this).find("a").attr("id");
//                console.log('id='+id);
//                $('#sp_firstname').val($('#firstname_'+id).html());
//                $('#sp_lastname').val($('#lastname_'+id).html());
//                $('#sp_description').val($('#description_'+id).html());
//                $('#sp_email').val($('#email_'+id).html());
//            });

            $("#speaker-list").on('click', '.speaker_edit', function(event){
                event.preventDefault();
                var id =  $(this).attr('id');

                $('#speaker_action_id').val(id);
                $('#speaker_firstname').val($('#firstname_'+id).html());
                $('#speaker_lastname').val($('#lastname_'+id).html());
                CKEDITOR.instances.speaker_description.setData($('#description_'+id).html());
//                $('#speaker_description').val($('#description_'+id).html());
                $('#speaker_email').val($('#email_'+id).html());
                $('#send-btn').html("@lang("schedule/speakers.speaker_change_save")");
                if($('#undo-btn').length == 0) {
                    $('#speaker_actions').append("<button type=\"submit\" id=\"undo-btn\" class=\"btn btn-sm btn-success send-btn\">@lang("schedule/speakers.speaker_action_undo")</button>");
                }

            });


            $("#speaker-list").on('click', '.speaker_delete', function(event){
                event.preventDefault();
                $.ajax({
                    url: '/backend/schedule/speakers/delete',
                    type: "post",
                    data: { 'speaker_action_id':$(this).attr('id'),
                        '_token': $('input[name=_token]').val()},

                    success: function getcontent(data) {
                            $('#widget_'+data).remove();
                        $('#contact-list').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>');

                    }

                });

            });


            $("#speaker_actions").on('click', '#undo-btn', function(event){
                event.preventDefault();

                $('#speaker_action_id').val("");
                $('#speaker_firstname').val("");
                $('#speaker_lastname').val("");
                CKEDITOR.instances.speaker_description.setData("");
                $('#speaker_email').val("");
                $('#send-btn').html("@lang("schedule/speakers.speaker_new_save")");
                $('#undo-btn').remove();

            });

            /*$(document).on("click", '#speaker-list', function(event) {

                event.preventDefault();
                var id2 = $('a', this).attr('id');
                var id = $("#speaker-list").find("a").attr("id");
                console.log('id2='+id2);
                $('#speaker_firstname').val($('#firstname_'+id).html());
                $('#speaker_lastname').val($('#lastname_'+id).html());
                $('#speaker_description').val($('#description_'+id).html());
                $('#speaker_email').val($('#email_'+id).html());
            });*/

            $('.send-btn').click(function(){
                $.ajax({
                    url: '/backend/schedule/speakers/store',
                    type: "post",
                    data: { 'speaker_firstname':$('input[name=speaker_firstname]').val(),
                        'speaker_lastname':$('input[name=speaker_lastname]').val(),
                        'speaker_email':$('input[name=speaker_email]').val(),
                        'speaker_description':CKEDITOR.instances.speaker_description.getData(),
                        'speaker_action_id':$('input[name=speaker_action_id]').val(),
                        '_token': $('input[name=_token]').val()},

                    success: function getcontent(data) {
                        if($('#widget_'+data).length >> 0) {
                            $('#widget_'+data).remove();
                        }
                        $('#contact-list').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>');
                        jQuery.ajax({
                            url: "/backend/schedule/speakers/data",
//                            data: session_title,
//                            type: "GET",
                            type: "post",
                            widget_id: data,
                            data: { 'speaker_action_id':data,
                                '_token': $('input[name=_token]').val()},
                            success:function(data){
                                $('#speaker-list').append(data);
                            }
                        });
                    }

                });
            });




        });
    </script>
@stop