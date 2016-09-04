@extends('backend.layouts.master')

@section('title')
    @lang('modules.modules')
@stop

@section('header')
    <meta name="_token" content="{!! csrf_token() !!}"/>
@stop

@section('content')
    <!-- Page content -->
    <div id="page-content">
        <!-- Contacts Header -->
        <div class="content-header">
            <div class="header-section">
                <h1>
                    <i class="gi gi-adjust_alt"></i>@lang('modules.modules')<br>
                    <small>@lang('modules.modules_help')</small> {{ Lang::locale() }}
                </h1>
            </div>
        </div>
        <ul class="breadcrumb breadcrumb-top">
            <li><i class="gi gi-adjust_alt sidebar-nav-icon"></i> @lang('modules.modules')</li>
        </ul>
        <!-- END Contacts Header -->

        <!-- Main Row -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Row Styles Block -->
                <div class="block">
                    <!-- Row Styles Title -->
                    <div class="block-title">
                        <h2><strong>@lang('modules.list')</strong> @lang('modules.of_modules')</h2>
                    </div>
                    <!-- END Row Styles Title -->

                    <!-- Row Styles Content -->
                    <div class="table-responsive">
                        <table class="table table-vcenter">
                            <thead>
                            <tr>
                                <th style="width: 150px;" class="text-center">@lang('modules.type')</th>
                                <th>@lang('modules.created_at')</th>
                                <th>@lang('modules.updated_at')</th>
                                <th>@lang('modules.status')</th>
                                <th style="width: 150px;" class="text-center">@lang('modules.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($modules as $module)
                                <tr class="@if($module->init == '0') active @elseif($module->init == '1') success @else info @endif">
                                    <td class="text-center">{{ trans('modules.' . $module->type) }}</td>
                                    <td>{{ Date::parse($module->created_at)->diffForHumans() }}</td>
                                    <td>{{ Date::parse($module->updated_at)->diffForHumans() }}</td>
                                    <td>
                                        @if($module->status == '1')
                                            <a href="javascript:void(0)" class="label label-success">@lang('modules.active')</a>
                                        @else
                                            <a href="javascript:void(0)" class="label label-primary">@lang('modules.inactive')</a>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <label class="switch switch-default"><input disabled="true" checked="" type="checkbox"><span></span></label>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END Row Styles Content -->
                </div>
                <!-- END Row Styles Block -->
            </div>
        </div>
        <!-- END Main Row -->
    </div>
    <!-- END Page Content -->
@stop

@section('footer')
    <script src="{{ asset('assets/backend/js/viveed/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/pages/speakers/viveed.js') }}"></script>
@stop