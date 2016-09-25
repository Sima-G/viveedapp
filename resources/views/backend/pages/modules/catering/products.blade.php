@extends('backend.layouts.master')

@section('title')
    @lang('backend/modules/catering/menu.list_of_products')
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
        <div id="product-stats" class="row text-center"></div>
        <!-- END Quick Stats -->

        {{--<!-- Responsive Full Block -->
        <div class="block">
            <!-- Responsive Full Title -->
            <div class="block-title">
                <h2><strong>Full Table</strong> Responsive</h2>
            </div>
            <!-- END Responsive Full Title -->

            <!-- Responsive Full Content -->
            <p>The first way to make a table responsive, is to wrap it with <code>&lt;div class=&quot;table-responsive&quot;&gt;&lt;/div&gt;</code>. This way the table will be horizontally scrollable and all the data will be accessible on smaller screens (&lt; 768px). Try resizing your browser window to check it live!</p>
            <div class="table-responsive">

            </div>
            <!-- END Responsive Full Content -->
        </div>
        <!-- END Responsive Full Block -->--}}

        <!-- Main Row -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Responsive Full Block -->
                <div class="block">
                    <!-- Responsive Full Title -->
                    <div class="block-title">
                        <h2><strong>@lang('backend/modules/catering/products.list')</strong> @lang('backend/modules/catering/products.of_products')</h2>
                    </div>
                    <!-- END Responsive Full Title -->

                    <!-- Responsive Full Content -->
                    <div id="product_list" class="table-responsive">
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
    <script src="{{ asset('assets/backend/js/pages/modules/catering/products/viveed.js') }}"></script>
    <script src="{{ asset('assets/backend/js/pages/modules/catering/products/html-table-search.js') }}"></script>
@stop