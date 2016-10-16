<div id="ingroup_manage_block" class="block">
    <!-- Add Contact Title -->
    <div class="block-title">
        <h2><strong>@lang('backend/modules/catering/ingroups.ingroup')</strong> @lang('backend/modules/catering/ingroups.of_ingredient')</h2>
    </div>
    <!-- END Add Contact Title -->

    <!-- Add Contact Content -->
    <form id="form_ingroups_manage" enctype="multipart/form-data" method="post" class="form-horizontal form-bordered" onsubmit="return false;">

        <div class="form-group">

        <div class="col-md-6">
            <div class="form-group">
                <label class="col-xs-3 control-label" for="ingroup_title">@lang('backend/modules/catering/ingroups.title')
                    <span class="text-danger">*</span>
                </label>
                <div class="col-xs-9">
                    <input type="text" id="ingroup_title" name="ingroup_title" class="form-control" placeholder="@lang('backend/modules/catering/ingroups.title_desc')">
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-3 control-label" for="ingroup_selection">@lang('backend/modules/catering/ingroups.type') <span class="text-danger">*</span></label>
                <div class="col-xs-9">
                    <select id="ingroup_selection" name="ingroup_selection" class="form-control">
                        <option value="single">@lang('backend/modules/catering/ingroups.type_single')</option>
                        <option value="multiple" selected>@lang('backend/modules/catering/ingroups.type_multiple')</option>
                    </select>
                </div>
            </div>


        </div>


        <div class="col-md-6">

            <div class="form-group">
                <label class="col-xs-3 control-label" for="ingroup_status">@lang('backend/modules/catering/ingroups.status') <span class="text-danger">*</span></label>
                <div class="col-xs-9">
                    <select id="ingroup_status" name="ingroup_status" class="form-control">
                        <option value="0">@lang('backend/modules/catering/ingroups.status_unavailable')</option>
                        <option value="1" selected>@lang('backend/modules/catering/ingroups.status_new')</option>
                        <option value="2">@lang('backend/modules/catering/ingroups.status_old')</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-3 control-label">@lang('backend/modules/catering/ingroups.state') <span class="text-danger">*</span></label>
                <div class="col-xs-9">
                    <select id="ingroup_state" name="ingroup_state" class="form-control">
                        <option value="0">@lang('backend/modules/catering/ingroups.state_disabled')</option>
                        <option value="1" selected>@lang('backend/modules/catering/ingroups.state_enabled')</option>
                    </select>
                </div>
            </div>
        </div>

        </div>

        <div class="form-group form-actions">
            <div id="ingroup_actions" class="col-xs-9 col-xs-offset-3">
                <input type="hidden" name="ingroup_action_id" id="ingroup_action_id">
                <input type="hidden" name="ingroup_manage_btn_txt" id="ingroup_manage_btn_txt" value="<i class='fa fa-arrow-right'></i> @lang('backend/modules/catering/ingroups.ingroup_new_save')">
                <input type="hidden" name="ingroup_manage_btn_txt_alt" id="ingroup_manage_btn_txt_alt" value="<i class='fa fa-arrow-right'></i> @lang('backend/modules/catering/ingroups.ingroup_change_save')">
                <input type="hidden" name="ingroup_undo_btn_txt" id="ingroup_undo_btn_txt" value="<i class='fa fa-repeat'></i> @lang('backend/modules/catering/ingroups.ingroup_action_undo')">
                <button type="submit" id="ingroup_manage_btn" class="btn btn-sm btn-primary ingroup_manage_btn">
                    <i class="fa fa-arrow-right"></i> @lang('backend/modules/catering/ingroups.ingroup_new_save')
                </button>
            </div>
        </div>
    </form>
    <!-- END Add Contact Content -->
</div>