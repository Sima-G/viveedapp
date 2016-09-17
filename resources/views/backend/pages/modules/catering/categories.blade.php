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
        <!-- END Quick Stats -->

        <!-- Main Row -->
        <div class="row">

            <div @if((head($userRoles) == 'Admin') || (head($userRoles) == 'Editor') || (head($userRoles) == 'Author')) class="col-lg-8" @else class="col-lg-12" @endif>
                <!-- Contacts Block -->
                <div class="block">
                    <!-- Contacts Title -->
                    <div class="block-title">
                        <div class="block-options text-center">
                            <h2>
                                <strong>@lang('backend/modules/catering/categories.list')</strong> @lang('backend/modules/catering/categories.of_categories')
                            </h2>
                        </div>
                    </div>
                    <!-- END Contacts Title -->

                    <!-- All Categories Content -->
                    <div id="category-list" class="row style-alt categories_content">
                        <!-- Category Widget -->
                        <div id="category-list-loader"></div>
                        <!-- Category Widget -->
                    </div>
                    <!-- END All Categories Content -->

                </div>
                <!-- END Contacts Block -->
            </div>

            @if((head($userRoles) == 'Admin') || (head($userRoles) == 'Editor') || (head($userRoles) == 'Author'))
                <div class="col-lg-4">
                    <!-- Add Contact Block -->
                    <div class="block">
                        <!-- Add Contact Title -->
                        <div class="block-title">
                            <h2><i class="fa fa-bookmark"></i> @lang('backend/modules/catering/categories.category')</h2>
                        </div>
                        <!-- END Add Contact Title -->

                        <!-- Add Contact Content -->
                        <form id="form_categories" action="/backend/schedule/speakers/store" enctype="multipart/form-data"
                              method="post"
                              class="form-horizontal form-bordered" onsubmit="return false;">

                            <div class="form-group">
                                <label class="col-xs-3 control-label" for="category_title">@lang('backend/modules/catering/categories.title')
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-xs-9">
                                    <input type="text" id="category_title" name="category_title" class="form-control" placeholder="@lang('backend/modules/catering/categories.title_desc')">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-3 control-label" for="category_parent">@lang('backend/modules/catering/categories.parent_category') <span class="text-danger">*</span></label>
                                <div class="col-xs-9">
                                    <select id="category_parent" name="category_parent" class="form-control">
                                        <option value="">-</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-3 control-label" for="category_status">@lang('backend/modules/catering/categories.status') <span class="text-danger">*</span></label>
                                <div class="col-xs-9">
                                    <select id="category_status" name="category_status" class="form-control">
                                        <option value="0">@lang('backend/modules/catering/categories.status_unavailable')</option>
                                        <option value="1" selected>@lang('backend/modules/catering/categories.status_new')</option>
                                        <option value="2">@lang('backend/modules/catering/categories.status_old')</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-3 control-label">@lang('backend/modules/catering/categories.state') <span class="text-danger">*</span></label>
                                <div class="col-xs-9">
                                    <select id="category_state" name="category_state" class="form-control">
                                        <option value="0">@lang('backend/modules/catering/categories.state_disabled')</option>
                                        <option value="1" selected>@lang('backend/modules/catering/categories.state_enabled')</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-3 control-label" for="category_description">@lang('backend/modules/catering/categories.description')</label>
                                <div class="col-xs-9">
                                    <textarea id="category_description" name="category_description" class="ckeditor"></textarea>
                                </div>
                            </div>

                            <div class="form-group form-actions">
                                <div id="category_actions" class="col-xs-9 col-xs-offset-3">
                                    <input type="hidden" name="category_action_id" id="category_action_id">
                                    <input type="hidden" name="send-btn-txt" id="send-btn-txt" value="<i class='fa fa-arrow-right'></i> @lang('backend/modules/catering/categories.category_new_save')">
                                    <input type="hidden" name="send-btn-txt-alt" id="send-btn-txt-alt" value="<i class='fa fa-arrow-right'></i> @lang('backend/modules/catering/categories.category_change_save')">
                                    <input type="hidden" name="alt-btn-txt-alt" id="alt-btn-txt-alt" value="@lang('backend/modules/catering/categories.category_action_undo')">
                                    @if((head($userRoles) == 'Admin') || head($userRoles) == 'Editor')
                                        <button type="submit" id="send-btn" class="btn btn-sm btn-primary send-btn">
                                            <i class="fa fa-arrow-right"></i> @lang('backend/modules/catering/categories.category_new_save')
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </form>
                        <!-- END Add Contact Content -->
                    </div>
                    <!-- END Add Contact Block -->
                </div>
            @endif
        </div>
        <!-- END Main Row -->
    </div>
    <!-- END Page Content -->
@stop

@section('footer')
    @if((head($userRoles) == 'Admin') || (head($userRoles) == 'Editor') || (head($userRoles) == 'Author'))
        <script src="{{ asset('assets/backend/js/helpers/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('assets/backend/js/viveed/sweetalert.min.js') }}"></script>
    @endif
    <script src="{{ asset('assets/backend/js/pages/modules/catering/categories/viveed.js') }}"></script>
@stop