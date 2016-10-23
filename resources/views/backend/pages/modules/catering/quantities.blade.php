@extends('backend.layouts.master')

@section('title')
    @lang('backend/modules/catering/menu.manage_of_quantities')
@stop

@section('header')
    <meta name="_token" content="{!! csrf_token() !!}"/>
@stop

@section('viveed_css')
    <style>

        table .collapse.in {
            display:table-row;
        }

        tr.clickable  {
            cursor: pointer;
        }
    </style>
@stop

@section('content')
    <!-- Page content -->
    <div id="page-content" style="min-height: 1701px;">
        <!-- Catering Categories Header -->
            @include('backend.partials.modules.catering.menu')
        <!-- END Catering Categories Header -->

        <!-- Quick Stats -->
        {{--<div id="category-stats" class="row text-center"></div>--}}
        <!-- END Quick Stats -->

        <!-- Main Row -->
        <div class="row">

            <div class="col-lg-8" >
                <!-- Contacts Block -->
                <div class="block">
                    <!-- Contacts Title -->
                    <div class="block-title">
                        <div class="block-options text-center">
                            <h2>
                                <strong>@lang('backend/modules/catering/quantities.list')</strong> @lang('backend/modules/catering/quantities.of_quantity_units')
                            </h2>
                        </div>
                    </div>
                    <!-- END Contacts Title -->

                    <!-- All Categories Content -->
                    <div id="quantity_list" class="row style-alt quantities_content">
                        <!-- Category Widget -->
                        <div id="quantity_list_loader"></div>
                        <!-- Category Widget -->
                    </div>
                    <!-- END All Categories Content -->

                </div>
                <!-- END Contacts Block -->
            </div>

                <div class="col-lg-4">
                    <!-- Add Contact Block -->
                    <div class="block">
                        <!-- Add Contact Title -->
                        <div class="block-title">
                            <h2><i class="fa fa-bookmark"></i> @lang('backend/modules/catering/quantities.unit_quantity')</h2>
                        </div>
                        <!-- END Add Contact Title -->

                        <!-- Add Contact Content -->
                        <form id="form_quantities" action="/backend/schedule/speakers/store" enctype="multipart/form-data" method="post" class="form-horizontal form-bordered" onsubmit="return false;">

                            <div class="form-group">
                                <label class="col-xs-3 control-label" for="quantity_title">@lang('backend/modules/catering/quantities.unit')
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-xs-9">
                                    <input type="text" id="quantity_title" name="quantity_title" class="form-control quantity-control" placeholder="@lang('backend/modules/catering/quantities.unit_desc')">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-3 control-label" for="quantity_description">@lang('backend/modules/catering/quantities.quantity_abbreviation')
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-xs-9">
                                    <input type="text" id="quantity_description" name="quantity_description" class="form-control quantity-control" placeholder="@lang('backend/modules/catering/quantities.quantity_abbreviation_desc')">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-3 control-label" for="quantity_decimal">@lang('backend/modules/catering/quantities.quantity_decimals') <span class="text-danger">*</span></label>
                                <div class="col-xs-9">
                                    <select id="quantity_decimal" name="quantity_decimal" class="form-control quantity-control">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-3 control-label" for="quantity_categories">@lang('backend/modules/catering/quantities.categories') <span class="text-danger">*</span></label>
                                <div class="col-xs-9">
                                    <select id="quantity_categories" name="quantity_categories" class="chosen-select chosen-select-width chosen-select-no-results quantity-control" style="width: 100%;" data-placeholder="@lang('backend/modules/catering/quantities.categories_desc')" style="width: 250px;" multiple>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-3 control-label" for="quantity_status">@lang('backend/modules/catering/quantities.status') <span class="text-danger">*</span></label>
                                <div class="col-xs-9">
                                    <select id="quantity_status" name="quantity_status" class="form-control quantity-control">
                                        <option value="0">@lang('backend/modules/catering/quantities.status_unavailable')</option>
                                        <option value="1" selected>@lang('backend/modules/catering/quantities.status_new')</option>
                                        <option value="2">@lang('backend/modules/catering/quantities.status_old')</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-3 control-label">@lang('backend/modules/catering/quantities.state') <span class="text-danger">*</span></label>
                                <div class="col-xs-9">
                                    <select id="quantity_state" name="quantity_state" class="form-control quantity-control">
                                        <option value="0">@lang('backend/modules/catering/quantities.state_disabled')</option>
                                        <option value="1" selected>@lang('backend/modules/catering/quantities.state_enabled')</option>
                                    </select>
                                </div>
                            </div>

                            {{--<div class="form-group">
                                <label class="col-xs-3 control-label" for="category_description">@lang('backend/modules/catering/categories.description')</label>
                                <div class="col-xs-9">
                                    <textarea id="category_description" name="category_description" class="ckeditor"></textarea>
                                </div>
                            </div>--}}

                            <div class="form-group form-actions">
                                <div id="quantity_actions" class="col-xs-9 col-xs-offset-3">
                                    <input type="hidden" name="quantity_action_id" id="quantity_action_id">
                                    <input type="hidden" name="send_btn_txt" id="send_btn_txt" value="<i class='fa fa-arrow-right'></i> @lang('backend/modules/catering/quantities.quantity_new_save')">
                                    <input type="hidden" name="send_btn_txt_alt" id="send_btn_txt_alt" value="<i class='fa fa-arrow-right'></i> @lang('backend/modules/catering/quantities.quantity_change_save')">
                                    <input type="hidden" name="alt_btn_txt_alt" id="alt_btn_txt_alt" value="@lang('backend/modules/catering/quantities.quantity_action_undo')">
                                        <button type="submit" id="send_btn" class="btn btn-sm btn-primary send-btn">
                                            <i class="fa fa-arrow-right"></i> @lang('backend/modules/catering/quantities.quantity_new_save')
                                        </button>
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
    {{--@if((head($userRoles) == 'Admin') || (head($userRoles) == 'Editor') || (head($userRoles) == 'Author'))--}}
        {{--<script src="{{ asset('assets/backend/js/helpers/ckeditor/ckeditor.js') }}"></script>--}}
        <script src="{{ asset('assets/backend/js/viveed/sweetalert.min.js') }}"></script>
    {{--@endif--}}
    <script src="{{ asset('assets/backend/js/pages/modules/catering/quantities/viveed.js') }}"></script>
@stop