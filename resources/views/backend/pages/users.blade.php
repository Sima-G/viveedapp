@extends('backend.layouts.master')

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
                    <i class="gi gi-user"></i>@lang('users.users')<br>
                    <small>@lang('users.users_help')</small>
                </h1>
            </div>
        </div>
        <ul class="breadcrumb breadcrumb-top">
            <li><i class="gi gi-user sidebar-nav-icon"></i> @lang('users.users')</li>
        </ul>
        <!-- END Contacts Header -->

        <!-- Main Row -->
        <div class="row">
            <div class="col-lg-8">
                <!-- Row Styles Block -->
                <div class="block">
                    <!-- Row Styles Title -->
                    <div class="block-title">
                        <h2><strong>@lang('users.list')</strong> @lang('users.of_users')</h2>
                    </div>
                    <!-- END Row Styles Title -->

                    <!-- Row Styles Content -->
                    <div class="table-responsive">
                        <table class="table table-vcenter">
                            <thead>
                            <tr>
                                <th style="width: 150px;" class="text-center">@lang('users.first_name')</th>
                                <th>@lang('users.last_name')</th>
                                <th>Email</th>
                                <th>@lang('users.type')</th>
                                <th style="width: 150px;" class="text-center">@lang('users.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="active">
                                <td class="text-center"><img src="img/placeholders/avatars/avatar6.jpg" alt="avatar" class="img-circle"></td>
                                <td><a href="page_ready_user_profile.html">client1</a></td>
                                <td>client1@example.com</td>
                                <td><a href="javascript:void(0)" class="label label-warning">Trial</a></td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-xs">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><img src="img/placeholders/avatars/avatar2.jpg" alt="avatar" class="img-circle"></td>
                                <td><a href="page_ready_user_profile.html">client2</a></td>
                                <td>client2@example.com</td>
                                <td><a href="javascript:void(0)" class="label label-success">VIP</a></td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-xs">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="success">
                                <td class="text-center"><img src="img/placeholders/avatars/avatar8.jpg" alt="avatar" class="img-circle"></td>
                                <td><a href="page_ready_user_profile.html">client3</a></td>
                                <td>client3@example.com</td>
                                <td><a href="javascript:void(0)" class="label label-info">Business</a></td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-xs">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><img src="img/placeholders/avatars/avatar1.jpg" alt="avatar" class="img-circle"></td>
                                <td><a href="page_ready_user_profile.html">client4</a></td>
                                <td>client4@example.com</td>
                                <td><a href="javascript:void(0)" class="label label-success">VIP</a></td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-xs">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="warning">
                                <td class="text-center"><img src="img/placeholders/avatars/avatar16.jpg" alt="avatar" class="img-circle"></td>
                                <td><a href="page_ready_user_profile.html">client5</a></td>
                                <td>client5@example.com</td>
                                <td><a href="javascript:void(0)" class="label label-primary">Personal</a></td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-xs">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><img src="img/placeholders/avatars/avatar11.jpg" alt="avatar" class="img-circle"></td>
                                <td><a href="page_ready_user_profile.html">client6</a></td>
                                <td>client6@example.com</td>
                                <td><a href="javascript:void(0)" class="label label-info">Business</a></td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-xs">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="danger">
                                <td class="text-center"><img src="img/placeholders/avatars/avatar4.jpg" alt="avatar" class="img-circle"></td>
                                <td><a href="page_ready_user_profile.html">client7</a></td>
                                <td>client7@example.com</td>
                                <td><a href="javascript:void(0)" class="label label-primary">Personal</a></td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-xs">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><img src="img/placeholders/avatars/avatar14.jpg" alt="avatar" class="img-circle"></td>
                                <td><a href="page_ready_user_profile.html">client8</a></td>
                                <td>client8@example.com</td>
                                <td><a href="javascript:void(0)" class="label label-success">VIP</a></td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-xs">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="info">
                                <td class="text-center"><img src="img/placeholders/avatars/avatar8.jpg" alt="avatar" class="img-circle"></td>
                                <td><a href="page_ready_user_profile.html">client9</a></td>
                                <td>client9@example.com</td>
                                <td><a href="javascript:void(0)" class="label label-primary">Personal</a></td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-xs">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- END Row Styles Content -->
                </div>
                <!-- END Row Styles Block -->
            </div>
            <div class="col-lg-4">
                <!-- Add Contact Block -->
                <div class="block">
                    <!-- Add Contact Title -->
                    <div class="block-title">
                        <h2>@lang('users.user')</h2>
                    </div>
                    <!-- END Add Contact Title -->

                    <!-- Add Contact Content -->
                    <form action="page_ready_contacts.html" method="post" class="form-horizontal form-bordered" onsubmit="return false;">
                        <div class="form-group">
                            <label class="col-xs-3 control-label" for="add-contact-name">@lang('users.first_name')</label>
                            <div class="col-xs-9">
                                <div class="input-group">
                                    <input type="text" id="add-contact-name" name="add-contact-name" class="form-control" placeholder="@lang('users.first_name')..">
                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-3 control-label" for="add-contact-name">@lang('users.last_name')</label>
                            <div class="col-xs-9">
                                <div class="input-group">
                                    <input type="text" id="add-contact-name" name="add-contact-name" class="form-control" placeholder="@lang('users.last_name')..">
                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-3 control-label" for="add-contact-email">Email</label>
                            <div class="col-xs-9">
                                <div class="input-group">
                                    <input type="email" id="add-contact-email" name="add-contact-email" class="form-control" placeholder="Enter Email..">
                                    <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-3 control-label" for="val_email">Email <span class="text-danger">*</span></label>
                            <div class="col-xs-9">
                                <div class="input-group">
                                    <input id="val_email" name="val_email" class="form-control" placeholder="test@example.com" type="text">
                                    <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-3 control-label" for="val_password">@lang('users.password') <span class="text-danger">*</span></label>
                            <div class="col-xs-9">
                                <div class="input-group">
                                    <input id="val_password" name="val_password" class="form-control" placeholder="Choose a crazy one.." type="password">
                                    <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-3 control-label" for="val_confirm_password">@lang('users.confirm') @lang('users.of_password') <span class="text-danger">*</span></label>
                            <div class="col-xs-9">
                                <div class="input-group">
                                    <input id="val_confirm_password" name="val_confirm_password" class="form-control" placeholder="..and confirm it!" type="password">
                                    <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-3 control-label" for="example-select">@lang('users.type') <span class="text-danger">*</span></label>
                            <div class="col-xs-9">
                                <select id="example-select" name="example-select" class="form-control" size="1">
                                    <option value="">@lang('users.select_type')..</option>
                                    <option value="1">Administrator</option>
                                    <option value="2">Editor</option>
                                    <option value="3">Author</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group form-actions">
                            <div class="col-xs-9 col-xs-offset-3">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Contact</button>
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
    <script src="{{ asset('assets/backend/js/viveed/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/pages/speakers/viveed.js') }}"></script>
@stop