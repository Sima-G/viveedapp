@extends('backend.layouts.master')

@section('title')
    @lang('backend/modules/catering/menu.manage_of_groups')
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
                                <strong>@lang('backend/modules/catering/groups.list')</strong> @lang('backend/modules/catering/groups.of_ingredient_groups')
                            </h2>
                        </div>
                    </div>
                    <!-- END Contacts Title -->

                    <!-- All Categories Content -->
                    <div id="group_list" class="row style-alt groups_content">
                        <!-- Category Widget -->
                        <div id="group_list_loader"></div>
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
                        <h2><i class="fa fa-bookmark"></i> @lang('backend/modules/catering/groups.group')</h2>
                    </div>
                    <!-- END Add Contact Title -->

                    <!-- Add Contact Content -->
                    <form id="form_groups" action="/backend/schedule/speakers/store" enctype="multipart/form-data" method="post" class="form-horizontal form-bordered" onsubmit="return false;">

                        <div class="form-group">
                            <label class="col-xs-3 control-label" for="group_title">@lang('backend/modules/catering/groups.title')
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-xs-9">
                                <input type="text" id="group_title" name="group_title" class="form-control group-control" placeholder="@lang('backend/modules/catering/groups.title_desc')">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-3 control-label" for="group_description">@lang('backend/modules/catering/groups.description')
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-xs-9">
                                <input type="text" id="group_description" name="group_description" class="form-control group-control" placeholder="@lang('backend/modules/catering/groups.group_desc')">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-3 control-label" for="group_selection">@lang('backend/modules/catering/groups.type') <span class="text-danger">*</span></label>
                            <div class="col-xs-9">
                                <select id="group_selection" name="group_selection" class="form-control group-control">
                                    <option value="single">@lang('backend/modules/catering/groups.type_single')</option>
                                    <option value="multiple" selected>@lang('backend/modules/catering/groups.type_multiple')</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-3 control-label" for="group_categories">@lang('backend/modules/catering/groups.categories') <span class="text-danger">*</span></label>
                            <div class="col-xs-9">
                                <select id="group_categories" name="group_categories" class="chosen-select chosen-select-width chosen-select-no-results group-control" style="width: 100%;" data-placeholder="@lang('backend/modules/catering/groups.categories_desc')" style="width: 250px;" multiple>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-3 control-label" for="group_status">@lang('backend/modules/catering/groups.status') <span class="text-danger">*</span></label>
                            <div class="col-xs-9">
                                <select id="group_status" name="group_status" class="form-control group-control">
                                    <option value="0">@lang('backend/modules/catering/groups.status_unavailable')</option>
                                    <option value="1" selected>@lang('backend/modules/catering/groups.status_new')</option>
                                    <option value="2">@lang('backend/modules/catering/groups.status_old')</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-3 control-label">@lang('backend/modules/catering/groups.state') <span class="text-danger">*</span></label>
                            <div class="col-xs-9">
                                <select id="group_state" name="group_state" class="form-control group-control">
                                    <option value="0">@lang('backend/modules/catering/groups.state_disabled')</option>
                                    <option value="1" selected>@lang('backend/modules/catering/groups.state_enabled')</option>
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
                            <div id="group_actions" class="col-xs-9 col-xs-offset-3">
                                <input type="hidden" name="group_action_id" id="group_action_id">
                                <input type="hidden" name="send_btn_txt" id="send_btn_txt" value="<i class='fa fa-arrow-right'></i> @lang('backend/modules/catering/groups.group_new_save')">
                                <input type="hidden" name="send_btn_txt_alt" id="send_btn_txt_alt" value="<i class='fa fa-arrow-right'></i> @lang('backend/modules/catering/groups.group_change_save')">
                                <input type="hidden" name="alt_btn_txt_alt" id="alt_btn_txt_alt" value="@lang('backend/modules/catering/groups.group_action_undo')">
                                <button type="submit" id="send_btn" class="btn btn-sm btn-primary send-btn">
                                    <i class="fa fa-arrow-right"></i> @lang('backend/modules/catering/groups.group_new_save')
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
    <script src="{{ asset('assets/backend/js/pages/modules/catering/groups/viveed.js') }}"></script>
@stop