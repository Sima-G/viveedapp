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
        {{--<div id="catalogue_stats" class="row text-center"></div>--}}
        <!-- END Quick Stats -->

    <!-- Main Row -->
        <div class="row">
            <div id="catalogue_manage_blocks" class="col-lg-6">
                @include('backend.partials.modules.pricing.order_product')
            </div>
            <div class="col-lg-6">
                @include('backend.partials.modules.pricing.order_list')
            </div>
        </div>
        <!-- END Main Row -->
    </div>
    <!-- END Page Content -->
@stop

@section('footer')
    <script src="{{ asset('assets/backend/js/viveed/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/pages/modules/pricing/catalogues/viveed.js') }}"></script>
@stop