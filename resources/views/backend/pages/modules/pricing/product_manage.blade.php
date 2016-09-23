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
        <!-- Catering Categories Header -->
            @include('backend.partials.modules.catering.menu')
        <!-- END Catering Categories Header -->

        <!-- Quick Stats -->
        <div id="category-stats" class="row text-center"></div>
            <input type="hidden" name="manage_product_block_action_txt" id="manage_product_block_action_txt" value="@lang('backend/modules/catering/products.existing_product')">
            <input type="hidden" name="managed_product_title" id="managed_product_title" value="{{ $master_product->title }}">
            <input type="hidden" name="managed_product_status" id="managed_product_status" value="{{ $master_product->status }}">
            <input type="hidden" name="managed_product_state" id="managed_product_state" value="{{ $master_product->state }}">
            <input type="hidden" name="managed_product_description" id="managed_product_description" value="{{ $master_product->description }}">
            <input type="hidden" name="managed_product_id" id="managed_product_id" value="{{ $master_product->id }}">
        <!-- END Quick Stats -->

        <!-- Customer Content -->
        <div class="row">
            <div id="product_manage_blocks" class="col-lg-12">
                <div class="col-md-4">
                    @include('backend.partials.modules.pricing.product_manage_block')
                 </div>
                <div class="col-md-8">
                    @include('backend.partials.modules.pricing.price_manage_block')
                </div>
                <!-- END Customer Info Block -->
            </div>
        </div>
        <!-- END Customer Content -->

        <!-- END Main Row -->
    </div>
    <!-- END Page Content -->
@stop

@section('footer')
    <script src="{{ asset('assets/backend/js/viveed/sweetalert.min.js') }}"></script>
    {{--<script src="{{ asset('assets/backend/js/pages/modules/catering/product_manage/viveed.js') }}"></script>--}}
    <script src="{{ asset('assets/backend/js/pages/modules/pricing/product_manage/viveed.js') }}"></script>
@stop