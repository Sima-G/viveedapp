@extends('backend.layouts.master')

@section('head')
    <style type="text/css">
        .panel-heading h4 {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: normal;
            width: 75%;
            padding-top: 2px;
        }
    </style>
@stop

@section('title')
    @lang('schedule/speakers.speakers')
@stop

@section('header')
    <meta name="_token" content="{!! csrf_token() !!}"/>
@stop

@section('content')
    <!-- Page content -->
    <div id="page-content">
        <!-- Catering Categories Header -->
    @include('backend.partials.modules.pricing.menu')
    <!-- END Catering Categories Header -->

    <!-- Quick Stats -->
    {{--<div class="row">
        <div id="catalogue_manage_blocks" class="col-lg-12">
            @include('backend.partials.modules.pricing.catalogue_manage_block')
        </div>
    </div>--}}
    <!-- END Quick Stats -->

        <!-- Quick Stats -->
        <div id="catalogue_stats" class="row text-center"></div>
        <!-- END Quick Stats -->

    <!-- Main Row -->
        <div class="row">
            <div id="catalogue_manage_blocks" class="col-lg-6">
                @include('backend.partials.modules.pricing.catalogue_manage_block')
            </div>
            <div class="col-lg-6">
                <!-- Responsive Full Block -->
                <div class="block">
                    <!-- Responsive Full Title -->
                    <div class="block-title">
                        <h2><strong>@lang('backend/modules/pricing/catalogues.list')</strong> @lang('backend/modules/pricing/catalogues.of_catalogues')</h2>
                    </div>
                    <!-- END Responsive Full Title -->

                    <!-- Responsive Full Content -->
                    {{--<p>The first way to make a table responsive, is to wrap it with <code>&lt;div class=&quot;table-responsive&quot;&gt;&lt;/div&gt;</code>. This way the table will be horizontally scrollable and all the data will be accessible on smaller screens (&lt; 768px). Try resizing your browser window to check it live!</p>--}}
                    <div id="catalogue_list" class="table-responsive">
                        <div id="category-list-loader"></div>
                    </div>
                    <!-- END Responsive Full Content -->
                </div>
                <!-- END Responsive Full Block -->
            </div>
        </div>
        <!-- END Main Row -->
    </div>
    <!-- END Page Content -->
@stop

@section('footer')
    <script src="{{ asset('assets/backend/js/pages/modules/pricing/catalogues/viveed.js') }}"></script>
@stop