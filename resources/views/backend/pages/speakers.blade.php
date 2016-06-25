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
                <i class="gi gi-parents"></i>Contacts<br><small>Manage all your contacts!</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Pages</li>
        <li><a href="">Contacts</a></li>
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
                        <div class="col-xs-9 col-xs-offset-3">
                            <button type="submit" class="btn btn-sm btn-primary send-btn"><i class="fa fa-plus"></i> Add Contact</button>
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

        jQuery(document).ready(function(){

            $('#contact-list').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>');
            jQuery.ajax({
                url: "/backend/schedule/speakers/show",
//                data: session_title,
                type: "GET",
                success:function(data){
                    $('#speaker-list').html(data);
                }
            });

            $('.send-btn').click(function(){
                $.ajax({
                    url: '/backend/schedule/speakers/store',
                    type: "post",
                    data: { 'speaker_firstname':$('input[name=speaker_firstname]').val(),
                        'speaker_lastname':$('input[name=speaker_lastname]').val(),
                        'speaker_email':$('input[name=speaker_email]').val(),
                        'speaker_description':CKEDITOR.instances.speaker_description.getData(),
                        '_token': $('input[name=_token]').val()},

                    success: function getcontent(data) {
                        $('#contact-list').html('<div class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>');
                        jQuery.ajax({
                            url: "/backend/schedule/speakers/data",
//                            data: session_title,
                            type: "GET",
                            success:function(data){$('#speaker-list').html(data);}
                        });
                    }

                });
            });


        });
    </script>
@stop