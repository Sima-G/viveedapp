<div id="modal-user-settings" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center">
                <h2 class="modal-title"><i class="fa fa-pencil"></i> <strong>@lang('privileges.privileges'):</strong> @lang('privileges.admin')</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="index.html" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">
                    <fieldset>
                        <legend>@lang('privileges.schedule_module')</legend>
                        <div class="form-group">
                            <label class="col-md-4 control-label">@lang('privileges.sessions')</label>
                            <div class="col-md-8">
                                <ul class="form-control-static">
                                    <li>@lang('privileges.schedule_admin_add_session')</li>
                                    <li>@lang('privileges.schedule_edit_session')</li>
                                    <li>@lang('privileges.schedule_delete_session')</li>
                                    <li>@lang('privileges.schedule_view_session')</li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">@lang('privileges.speakers')</label>
                            <div class="col-md-8">
                                <ul class="form-control-static">
                                    <li>@lang('privileges.schedule_admin_add_speaker')</li>
                                    <li>@lang('privileges.schedule_edit_speaker')</li>
                                    <li>@lang('privileges.schedule_delete_speaker')</li>
                                    <li>@lang('privileges.schedule_view_speaker')</li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">@lang('privileges.settings')</label>
                            <div class="col-md-8">
                                <ul class="form-control-static">
                                    <li>@lang('privileges.schedule_edit_settings')</li>
                                    <li>@lang('privileges.schedule_view_settings')</li>
                                </ul>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">@lang('privileges.close')</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END Modal Body -->
        </div>
    </div>
</div>