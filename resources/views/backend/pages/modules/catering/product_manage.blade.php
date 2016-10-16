@extends('backend.layouts.master')

@section('title')
    @lang('backend/modules/catering/menu.manage_of_product')
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
        @if($product_action == "create")
            <input type="hidden" name="manage_product_block_action_txt" id="manage_product_block_action_txt" value="@lang('backend/modules/catering/products.new_product')">
        @elseif($product_action == "edit")
            <input type="hidden" name="manage_product_block_action_txt" id="manage_product_block_action_txt" value="@lang('backend/modules/catering/products.existing_product')">
            <input type="hidden" name="managed_product_title" id="managed_product_title" value="{{ $product->title }}">
            <input type="hidden" name="managed_product_status" id="managed_product_status" value="{{ $product->status }}">
            <input type="hidden" name="managed_product_state" id="managed_product_state" value="{{ $product->state }}">
            <input type="hidden" name="managed_product_description" id="managed_product_description" value="{{ $product->description }}">
            <input type="hidden" name="managed_product_id" id="managed_product_id" value="{{ $product->id }}">
        @endif
        <!-- END Quick Stats -->

        <!-- Main Row -->

        <!-- Customer Content -->
        <div class="row">
            <div id="product_manage_blocks" class="col-lg-4">
                <!-- Customer Info Block -->
                    @include('backend.partials.modules.catering.product_manage_block')
                <!-- END Customer Info Block -->
            </div>
            <div id="product_manage_tabs" class="col-lg-8">
                <!-- Block Tabs -->
                <div class="block full">
                    <!-- Block Tabs Title -->
                    <div class="block-title">

                        <ul class="nav nav-tabs" data-toggle="tabs">
                            <li class="active"><a href="#quantity_manage_blocks">@lang('backend/modules/catering/products.product_quantities')</a></li>
                            <li><a href="#ingroup_manage_blocks">@lang('backend/modules/catering/products.ingredient_groups')</a></li>
                            <li><a href="#ingredient_manage_blocks" data-toggle="tooltip" title="" data-original-title="Settings">@lang('backend/modules/catering/products.product_ingredients')</a></li>
                        </ul>
                    </div>
                    <!-- END Block Tabs Title -->

                    <!-- Tabs Content -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="quantity_manage_blocks">
                            <!-- Add Quantity Block -->
                            @include('backend.partials.modules.catering.quantity_manage_block')
                            @include('backend.partials.modules.catering.quantity_view_block')
                            <!-- END Add Quantity Block -->
                        </div>
                        <div class="tab-pane" id="ingroup_manage_blocks">
                            <!-- Add Ingredient Block -->
                            @include('backend.partials.modules.catering.ingroup_manage_block')
                            @include('backend.partials.modules.catering.ingroup_view_block')
                            <!-- END Add Ingredient Block -->
                        </div>
                        <div class="tab-pane" id="ingredient_manage_blocks">
                            <!-- Add Ingredient Block -->
                            @include('backend.partials.modules.catering.ingredient_manage_block')
                            @include('backend.partials.modules.catering.ingredient_view_block')
                            <!-- END Add Ingredient Block -->
                        </div>
                    </div>
                    <!-- END Tabs Content -->
                </div>
                <!-- END Block Tabs -->
            </div>
        </div>

        <div class="row">

            {{--<div id="ingroup_manage_blocks" class="col-lg-12">
            <!-- Add Ingredient Block -->
                @include('backend.partials.modules.catering.ingroup_manage_block')
                @include('backend.partials.modules.catering.ingroup_view_block')
            <!-- END Add Ingredient Block -->
            </div>--}}
        </div>

        <div class="row">
            {{--<div id="quantity_manage_blocks" class="col-lg-6">
                <!-- Add Quantity Block -->
                @include('backend.partials.modules.catering.quantity_manage_block')
                @include('backend.partials.modules.catering.quantity_view_block')
                <!-- END Add Quantity Block -->
            </div>--}}

            {{--<div id="ingredient_manage_blocks" class="col-lg-6">
                <!-- Add Ingredient Block -->
                @include('backend.partials.modules.catering.ingredient_manage_block')
                @include('backend.partials.modules.catering.ingredient_view_block')
                <!-- END Add Ingredient Block -->

            </div>--}}
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