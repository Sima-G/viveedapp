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
        <input type="hidden" name="product_action" id="product_action" value="{{ $product_action }}">
        <!-- END Quick Stats -->

        <!-- Main Row -->
        <!-- Customer Content -->
        <div class="row">
            <div id="product_manage_blocks" class="col-lg-4">

                <!-- Customer Info Block -->
                @if($product_action == 1)
                    @include('backend.partials.modules.catering.product_create_block')
                @elseif($product_action == 2)
                    @include('backend.partials.modules.catering.product_view_block')
                @elseif($product_action == 3)
                    @include('backend.partials.modules.catering.product_manage_block')
                @endif
                <!-- END Customer Info Block -->

            </div>
            <div id="ingredient_manage_blocks" class="col-lg-8">

                <!-- Add Contact Block -->
                @if(($product_action == 2) || ($product_action == 3))
                    @include('backend.partials.modules.catering.ingredient_manage_block')
                    @include('backend.partials.modules.catering.ingredient_view_block')
                @endif
                <!-- END Add Contact Block -->

            </div>
        </div>
        <!-- END Customer Content -->
        <!-- END Main Row -->
    </div>
    <!-- END Page Content -->
@stop

@section('footer')
    @if((head($userRoles) == 'Admin') || (head($userRoles) == 'Editor') || (head($userRoles) == 'Author'))
        <script src="{{ asset('assets/backend/js/helpers/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('assets/backend/js/viveed/sweetalert.min.js') }}"></script>
    @endif
    <script src="{{ asset('assets/backend/js/pages/modules/catering/product_manage/viveed.js') }}"></script>
@stop