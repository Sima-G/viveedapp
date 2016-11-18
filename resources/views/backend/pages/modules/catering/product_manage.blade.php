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
        {{--{{ $product->first()->category }}--}}
    {{--{{ dd($product) }}--}}
        <!-- Quick Stats -->
        <div id="category-stats" class="row text-center"></div>
        <input type="hidden" name="product_action" id="product_action" value="{{ $product_action }}">
        @if($product_action == "create")
            <input type="hidden" name="manage_product_block_action_txt" id="manage_product_block_action_txt" value="@lang('backend/modules/catering/products.new_product')">
        @elseif($product_action == "edit")
            <input type="hidden" name="manage_product_block_action_txt" id="manage_product_block_action_txt" value="@lang('backend/modules/catering/products.existing_product')">
            <input type="hidden" name="managed_product_title" id="managed_product_title" value="{{ $product->title }}">
            <input type="hidden" name="managed_product_category" id="managed_product_category" value="{{ $product->category }}">
            <input type="hidden" name="managed_product_category_title" id="managed_product_category_title" value="{{ $product->ctr_categories->title }}">
            <input type="hidden" name="managed_product_status" id="managed_product_status" value="{{ $product->status }}">
            <input type="hidden" name="managed_product_state" id="managed_product_state" value="{{ $product->state }}">
            <input type="hidden" name="managed_product_description" id="managed_product_description" value="{{ $product->description }}">
            <input type="hidden" name="managed_product_id" id="managed_product_id" value="{{ $product->id }}">

        <input type="hidden" name="product_action" id="product_action" value="{{ $product_action }}">
        <input type="hidden" name="product_category_selected" id="product_category_selected" value="@if(empty($product->category)) 0 @else 1 @endif">
        <input type="hidden" name="product_quantity_selected" id="product_quantity_selected" value="@if($product->ctr_groups->count() == 0) 0 @else 1 @endif">
        <input type="hidden" name="product_group_selected" id="product_group_selected" value="@if($product->ctr_groups->count() == 0) 0 @else 1 @endif">
        <input type="hidden" name="product_ingredient_selected" id="product_ingredient_selected" value="@if($product->ctr_ingredients->count() == 0) 0 @else 1 @endif">
        @endif
        <!-- END Quick Stats -->

        <!-- Main Row -->

        {{--{{ dd($product) }}--}}
        {{--{{ $product->ctr_ingredients->count() }}--}}
        {{--@if($product->ctr_groups->count())sasa @endif--}}

        <!-- Customer Content -->
        <div class="row">
            <div id="product_manage_blocks" class="col-lg-4">
                <!-- Customer Info Block -->
                    @include('backend.partials.modules.catering.blocks.product_manage_block')
                <!-- END Customer Info Block -->
            </div>
            <div id="product_manage_tabs" class="col-lg-8">
                <!-- Block Tabs -->
                <div class="block full">
                    <!-- Block Tabs Title -->
                    <div class="block-title">

                        <ul class="nav nav-tabs" data-toggle="tabs">
                            <li class="active"><a href="#quantity_manage_blocks">@lang('backend/modules/catering/products.product_quantities') <span id="quantity_manage_tab_text"></span></a></li>
                            <li><a href="#ingroup_manage_blocks">@lang('backend/modules/catering/products.ingredient_groups') <span id="ingroup_manage_tab_text"></span></a></li>
                            <li><a href="#ingredient_manage_blocks" data-toggle="tooltip" title="" data-original-title="@lang('backend/modules/catering/products.product_ingredients')">@lang('backend/modules/catering/products.product_ingredients') <span id="ingredient_manage_tab_text"></span></a></li>
                        </ul>
                    </div>
                    <!-- END Block Tabs Title -->

                    <!-- Tabs Content -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="quantity_manage_blocks">
                            <!-- Add Quantity Block -->
                            @include('backend.partials.modules.catering.blocks.quantity_manage_block')
                            @include('backend.partials.modules.catering.blocks.quantity_view_block')
                            <!-- END Add Quantity Block -->
                        </div>
                        <div class="tab-pane" id="ingroup_manage_blocks">
                            <!-- Add Ingredient Block -->
                            @include('backend.partials.modules.catering.blocks.ingroup_manage_block')
                            @include('backend.partials.modules.catering.blocks.ingroup_view_block')
                            <!-- END Add Ingredient Block -->
                        </div>
                        <div class="tab-pane" id="ingredient_manage_blocks">
                            <!-- Add Ingredient Block -->
                            @include('backend.partials.modules.catering.blocks.ingredient_manage_block')
                            @include('backend.partials.modules.catering.blocks.ingredient_view_block')
                            <!-- END Add Ingredient Block -->
                        </div>
                    </div>
                    <!-- END Tabs Content -->
                </div>
                <!-- END Block Tabs -->
            </div>
        </div>

        <div class="row">

        </div>

        <div class="row">

        </div>
        <!-- END Customer Content -->
        <!-- END Main Row -->
    </div>
    <!-- END Page Content -->
@stop

@section('footer')
    <script src="{{ asset('assets/backend/js/helpers/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/backend/js/viveed/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/pages/modules/catering/product_manage/viveed.js') }}"></script>
@stop